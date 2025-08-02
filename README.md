# Cloudinary PHP SDK Performance Comparison Project

This project enables performance profiling and comparison between Cloudinary PHP SDK v2 and v3, focusing on the `Media::fromParams()` and `ImageTag::fromParams()` methods.

## Project Structure

```
.
├── v2/                          # Cloudinary SDK v2 testing environment
│   ├── Dockerfile               # PHP 8.3-cli with XDebug profiler for v2
│   ├── docker-compose.yml       # Docker Compose setup for v2
│   ├── composer.json            # Cloudinary SDK v2.12+ dependency
│   ├── src/
│   │   └── profiling_test.php   # v2 test script with 100 Cloudinary calls
│   └── profiler_output/         # XDebug .cachegrind files for v2
├── v3/                          # Cloudinary SDK v3 testing environment
│   ├── Dockerfile               # PHP 8.3-cli with XDebug profiler for v3
│   ├── docker-compose.yml       # Docker Compose setup for v3
│   ├── composer.json            # Cloudinary SDK v3.x dependency
│   ├── src/
│   │   └── profiling_test.php   # v3 test script with 100 Cloudinary calls
│   └── profiler_output/         # XDebug .cachegrind files for v3
└── README.md                    # This file
```

## Requirements

- Docker and Docker Compose
- qcachegrind (for analyzing profiling results)
  - macOS: `brew install qcachegrind`
  - Ubuntu/Debian: `sudo apt-get install kcachegrind`

## Running Tests

### Cloudinary SDK v2 Performance Test

```bash
# Navigate to v2 directory
cd v2

# Build and run v2 profiling container
docker-compose up --build

# View generated profiling files
ls -la profiler_output/
```

### Cloudinary SDK v3 Performance Test

```bash
# Navigate to v3 directory
cd v3

# Build and run v3 profiling container
docker-compose up --build

# View generated profiling files
ls -la profiler_output/
```

### Running Both Tests Independently

You can run both environments simultaneously from different terminals:

**Terminal 1 (v2):**
```bash
cd v2 && docker-compose up --build
```

**Terminal 2 (v3):**
```bash
cd v3 && docker-compose up --build
```

## Test Configuration

Both v2 and v3 environments use identical test parameters:

- **Cloudinary Configuration:** Dummy CNAME (`images.example.com`)
- **Test Calls:** 100 separate API calls per version
  - 50 calls to `Media::fromParams()`
  - 50 calls to `ImageTag::fromParams()`
- **Image Public IDs:** Realistic names (product_1, hero_banner, etc.)
- **Transformations:** width, height, quality=auto, format=auto
- **Dimensions:** Realistic values ranging from 100px to 800px
- **XDebug Profile Mode:** Captures every function call for detailed analysis

## API Compatibility Notes

Based on research, Cloudinary PHP SDK v3 maintains backward compatibility with the `fromParams` methods:

### v2 to v3 Migration
- **Configuration:** Same `Configuration::instance()` syntax
- **Media::fromParams():** Identical method signature and behavior
- **ImageTag::fromParams():** Identical method signature and behavior
- **Namespaces:** Same import statements work in both versions

The `fromParams` methods were specifically designed as migration helpers to ease the transition between SDK versions while maintaining the same URL generation patterns.

## Performance Analysis

### Analyzing Results with qcachegrind

**Compare v2 performance:**
```bash
qcachegrind v2/profiler_output/cachegrind.out.*
```

**Compare v3 performance:**
```bash
qcachegrind v3/profiler_output/cachegrind.out.*
```

**Side-by-side comparison:**
```bash
# Open both in separate qcachegrind instances
qcachegrind v2/profiler_output/cachegrind.out.* &
qcachegrind v3/profiler_output/cachegrind.out.* &
```

### Key Metrics to Compare

1. **Function Call Count:** Compare total calls for `Media::fromParams()` and `ImageTag::fromParams()`
2. **Execution Time:** Time spent in URL generation methods
3. **Memory Usage:** Memory allocation patterns between versions
4. **Performance Bottlenecks:** Identify optimization opportunities in each version
5. **Method Efficiency:** Compare performance per individual call

### Expected Output

Each test generates:
- **Media URLs:** 50 generated Cloudinary URLs from `Media::fromParams()` calls
- **Image Tags:** 50 generated HTML image tags from `ImageTag::fromParams()` calls
- **Profiling Data:** Multiple `.cachegrind` files for detailed analysis

## Independent Testing

- ✅ **Complete Isolation:** Each version runs in separate Docker containers
- ✅ **No Shared Dependencies:** Independent composer installations
- ✅ **Separate Networks:** No Docker network conflicts
- ✅ **Isolated Profiling:** Separate profiler output directories
- ✅ **Mac M1 Compatible:** Both environments support Apple Silicon

## Performance Comparison Goals

This setup enables identification of:
- Performance improvements/regressions between SDK versions
- Function call overhead differences
- Memory usage optimization in newer versions
- API efficiency comparisons
- Migration impact assessment

## Troubleshooting

### v2 Environment Issues
```bash
cd v2
docker-compose down && docker-compose up --build --force-recreate
```

### v3 Environment Issues
```bash
cd v3
docker-compose down && docker-compose up --build --force-recreate
```

### XDebug Issues
- **No .cachegrind files:** Check XDebug installation with `docker-compose exec [service] php -m | grep xdebug`
- **Permission issues:** Ensure `profiler_output/` directories have write permissions
- **Container conflicts:** Use `docker system prune` to clean up conflicting containers

### Comparing Results
- **Different file formats:** Both versions should generate identical URL structures
- **Performance variations:** Run tests multiple times for consistent measurements
- **Resource usage:** Monitor Docker resource allocation for fair comparison