#!/usr/bin/env python3
"""
Cloudinary SDK Performance Analysis Tool
Analyzes cachegrind files to compare v2 vs v3 performance bottlenecks
"""

import re
import os
import argparse
from collections import defaultdict
from pathlib import Path

class CachegrindAnalyzer:
    def __init__(self, cachegrind_file):
        self.file_path = cachegrind_file
        self.functions = {}
        self.total_time = 0
        self.parse_file()
    
    def parse_file(self):
        """Parse cachegrind file and extract function performance data"""
        with open(self.file_path, 'r') as f:
            current_function = None
            
            for line in f:
                line = line.strip()
                
                # Function definition line
                if line.startswith('fn='):
                    function_name = line[3:]
                    current_function = function_name
                    if current_function not in self.functions:
                        self.functions[current_function] = {
                            'calls': 0,
                            'time': 0,
                            'percentage': 0.0
                        }
                
                # Cost line (time data)
                elif line and line[0].isdigit() and current_function:
                    parts = line.split()
                    if len(parts) >= 2:
                        cost = int(parts[1])
                        self.functions[current_function]['time'] += cost
                        self.total_time += cost
                
                # Call count line
                elif line.startswith('calls=') and current_function:
                    calls = int(line.split('=')[1])
                    self.functions[current_function]['calls'] += calls
        
        # Calculate percentages
        for func_name in self.functions:
            if self.total_time > 0:
                self.functions[func_name]['percentage'] = (
                    self.functions[func_name]['time'] / self.total_time * 100
                )
    
    def get_top_functions(self, limit=20):
        """Get top functions by time consumption"""
        sorted_functions = sorted(
            self.functions.items(),
            key=lambda x: x[1]['time'],
            reverse=True
        )
        return sorted_functions[:limit]
    
    def find_configuration_issues(self):
        """Identify configuration-related performance issues"""
        config_functions = {}
        json_functions = {}
        string_functions = {}
        
        for func_name, data in self.functions.items():
            if 'Configuration' in func_name:
                config_functions[func_name] = data
            elif any(keyword in func_name.lower() for keyword in ['json', 'serialize']):
                json_functions[func_name] = data
            elif any(keyword in func_name.lower() for keyword in ['string', 'case', 'camel', 'snake']):
                string_functions[func_name] = data
        
        return {
            'configuration': config_functions,
            'json': json_functions,
            'string': string_functions
        }

def analyze_sdk_performance(v2_dir, v3_dir):
    """Compare v2 and v3 SDK performance"""
    
    print("🔍 Cloudinary SDK Performance Analysis")
    print("=" * 50)
    
    # Find cachegrind files
    v2_files = list(Path(v2_dir).glob("cachegrind.out.*"))
    v3_files = list(Path(v3_dir).glob("cachegrind.out.*"))
    
    if not v2_files:
        print(f"❌ No cachegrind files found in {v2_dir}")
        return
    
    if not v3_files:
        print(f"❌ No cachegrind files found in {v3_dir}")
        return
    
    print(f"📊 Analyzing {len(v2_files)} v2 files and {len(v3_files)} v3 files")
    print()
    
    # Analyze latest files
    v2_analyzer = CachegrindAnalyzer(sorted(v2_files)[-1])
    v3_analyzer = CachegrindAnalyzer(sorted(v3_files)[-1])
    
    print("🚀 **V2 SDK ANALYSIS**")
    print("-" * 30)
    print_performance_issues(v2_analyzer, "v2")
    
    print("\n🚀 **V3 SDK ANALYSIS**")
    print("-" * 30)
    print_performance_issues(v3_analyzer, "v3")
    
    print("\n📊 **COMPARATIVE ANALYSIS**")
    print("-" * 40)
    compare_versions(v2_analyzer, v3_analyzer)

def print_performance_issues(analyzer, version):
    """Print performance issues for a specific version"""
    issues = analyzer.find_configuration_issues()
    
    # Configuration analysis
    if issues['configuration']:
        print(f"⚠️  Configuration Issues ({version.upper()}):")
        total_config_time = sum(data['time'] for data in issues['configuration'].values())
        total_config_calls = sum(data['calls'] for data in issues['configuration'].values())
        config_percentage = (total_config_time / analyzer.total_time * 100) if analyzer.total_time > 0 else 0
        
        print(f"   Total Config Time: {config_percentage:.2f}% ({total_config_calls} calls)")
        
        for func_name, data in sorted(issues['configuration'].items(), key=lambda x: x[1]['time'], reverse=True)[:5]:
            print(f"   • {func_name}: {data['percentage']:.2f}% ({data['calls']} calls)")
    
    # JSON operations
    if issues['json']:
        print(f"\n📝 JSON Operations ({version.upper()}):")
        total_json_time = sum(data['time'] for data in issues['json'].values())
        json_percentage = (total_json_time / analyzer.total_time * 100) if analyzer.total_time > 0 else 0
        
        print(f"   Total JSON Time: {json_percentage:.2f}%")
        
        for func_name, data in sorted(issues['json'].items(), key=lambda x: x[1]['time'], reverse=True)[:3]:
            print(f"   • {func_name}: {data['percentage']:.2f}% ({data['calls']} calls)")
    
    # String operations
    if issues['string']:
        print(f"\n🔤 String Operations ({version.upper()}):")
        total_string_calls = sum(data['calls'] for data in issues['string'].values())
        
        print(f"   Total String Calls: {total_string_calls}")
        
        for func_name, data in sorted(issues['string'].items(), key=lambda x: x[1]['calls'], reverse=True)[:3]:
            print(f"   • {func_name}: {data['calls']} calls ({data['percentage']:.2f}%)")

def compare_versions(v2_analyzer, v3_analyzer):
    """Compare v2 and v3 performance"""
    
    # Configuration comparison
    v2_config = v2_analyzer.find_configuration_issues()['configuration']
    v3_config = v3_analyzer.find_configuration_issues()['configuration']
    
    v2_config_time = sum(data['time'] for data in v2_config.values())
    v3_config_time = sum(data['time'] for data in v3_config.values())
    
    v2_config_percentage = (v2_config_time / v2_analyzer.total_time * 100) if v2_analyzer.total_time > 0 else 0
    v3_config_percentage = (v3_config_time / v3_analyzer.total_time * 100) if v3_analyzer.total_time > 0 else 0
    
    print(f"🔧 Configuration Performance:")
    print(f"   v2: {v2_config_percentage:.2f}% of total time")
    print(f"   v3: {v3_config_percentage:.2f}% of total time")
    
    if v2_config_percentage > 0 and v3_config_percentage > 0:
        improvement = ((v2_config_percentage - v3_config_percentage) / v2_config_percentage) * 100
        if improvement > 0:
            print(f"   🎉 v3 improves configuration performance by {improvement:.1f}%")
        else:
            print(f"   ⚠️  v3 configuration is {abs(improvement):.1f}% slower")
    
    # Total execution comparison
    print(f"\n⏱️  Total Execution Time:")
    print(f"   v2: {v2_analyzer.total_time:,} time units")
    print(f"   v3: {v3_analyzer.total_time:,} time units")
    
    if v2_analyzer.total_time > 0 and v3_analyzer.total_time > 0:
        total_improvement = ((v2_analyzer.total_time - v3_analyzer.total_time) / v2_analyzer.total_time) * 100
        if total_improvement > 0:
            print(f"   🚀 v3 is {total_improvement:.1f}% faster overall")
        else:
            print(f"   📊 v2 is {abs(total_improvement):.1f}% faster overall")

def main():
    parser = argparse.ArgumentParser(description='Analyze Cloudinary SDK performance')
    parser.add_argument('--v2-dir', default='v2/profiler_output', help='v2 profiler output directory')
    parser.add_argument('--v3-dir', default='v3/profiler_output', help='v3 profiler output directory')
    
    args = parser.parse_args()
    
    analyze_sdk_performance(args.v2_dir, args.v3_dir)

if __name__ == '__main__':
    main()