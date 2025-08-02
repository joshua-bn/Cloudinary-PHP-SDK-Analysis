<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Cloudinary\Cloudinary;
use Cloudinary\Transformation\Resize;
use Cloudinary\Transformation\Quality;
use Cloudinary\Transformation\Format;

// Configure Cloudinary with dummy CNAME using new v3 API
$cld = new Cloudinary([
    'cloud' => [
        'cloud_name' => 'demo-cloud',
        'cname' => 'images.example.com',
        'secure_cname' => 'images.example.com'
    ]
]);

echo "Starting Cloudinary SDK v3 Fluent API Performance Profiling Test\n";
echo "=================================================================\n\n";

// Define realistic image public IDs
$publicIds = [
    'product_1', 'product_2', 'product_3', 'product_4', 'product_5',
    'hero_banner', 'category_image_1', 'category_image_2', 'user_avatar_1', 'user_avatar_2',
    'gallery_photo_1', 'gallery_photo_2', 'gallery_photo_3', 'thumbnail_1', 'thumbnail_2',
    'featured_item', 'promotional_banner', 'blog_header', 'social_media_post', 'newsletter_image',
    'landing_page_hero', 'about_us_photo', 'team_member_1', 'team_member_2', 'company_logo',
    'store_front', 'interior_shot', 'product_detail_1', 'product_detail_2', 'product_detail_3',
    'seasonal_promo', 'flash_sale_banner', 'customer_review_1', 'customer_review_2', 'testimonial_bg',
    'event_photo_1', 'event_photo_2', 'conference_speaker', 'workshop_image', 'webinar_thumbnail',
    'case_study_hero', 'success_story_1', 'success_story_2', 'partner_logo_1', 'partner_logo_2',
    'infographic_1', 'infographic_2', 'chart_visualization', 'data_presentation', 'report_cover',
    'mobile_app_screenshot', 'desktop_interface', 'ui_component_1', 'ui_component_2', 'icon_set'
];

// Define realistic width/height combinations
$dimensions = [
    ['width' => 150, 'height' => 150],
    ['width' => 200, 'height' => 300],
    ['width' => 400, 'height' => 600],
    ['width' => 300, 'height' => 200],
    ['width' => 500, 'height' => 350],
    ['width' => 800, 'height' => 400],
    ['width' => 600, 'height' => 400],
    ['width' => 250, 'height' => 250],
    ['width' => 350, 'height' => 500],
    ['width' => 100, 'height' => 100]
];

echo "Testing 50 fluent API Image URL calls:\n";
echo "=======================================\n";

// 50 separate calls using fluent v3 API for image URLs
$media1 = $cld->image($publicIds[0])
    ->resize(Resize::fill($dimensions[0]['width'], $dimensions[0]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "1. " . $media1->toUrl() . "\n";

$media2 = $cld->image($publicIds[1])
    ->resize(Resize::fill($dimensions[1]['width'], $dimensions[1]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "2. " . $media2->toUrl() . "\n";

$media3 = $cld->image($publicIds[2])
    ->resize(Resize::fill($dimensions[2]['width'], $dimensions[2]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "3. " . $media3->toUrl() . "\n";

$media4 = $cld->image($publicIds[3])
    ->resize(Resize::fill($dimensions[3]['width'], $dimensions[3]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "4. " . $media4->toUrl() . "\n";

$media5 = $cld->image($publicIds[4])
    ->resize(Resize::fill($dimensions[4]['width'], $dimensions[4]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "5. " . $media5->toUrl() . "\n";

$media6 = $cld->image($publicIds[5])
    ->resize(Resize::pad($dimensions[5]['width'], $dimensions[5]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "6. " . $media6->toUrl() . "\n";

$media7 = $cld->image($publicIds[6])
    ->resize(Resize::pad($dimensions[6]['width'], $dimensions[6]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "7. " . $media7->toUrl() . "\n";

$media8 = $cld->image($publicIds[7])
    ->resize(Resize::scale($dimensions[7]['width'], $dimensions[7]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "8. " . $media8->toUrl() . "\n";

$media9 = $cld->image($publicIds[8])
    ->resize(Resize::scale($dimensions[8]['width'], $dimensions[8]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "9. " . $media9->toUrl() . "\n";

$media10 = $cld->image($publicIds[9])
    ->resize(Resize::fit($dimensions[9]['width'], $dimensions[9]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "10. " . $media10->toUrl() . "\n";

// Continue with remaining 40 calls using various resize methods
for ($i = 10; $i < 50; $i++) {
    $publicId = $publicIds[$i];
    $dimension = $dimensions[$i % count($dimensions)];
    
    // Vary resize methods for more realistic testing
    $resizeMethod = match($i % 4) {
        0 => Resize::fill($dimension['width'], $dimension['height']),
        1 => Resize::pad($dimension['width'], $dimension['height']),
        2 => Resize::scale($dimension['width'], $dimension['height']),
        3 => Resize::fit($dimension['width'], $dimension['height'])
    };
    
    $media = $cld->image($publicId)
        ->resize($resizeMethod)
        ->quality(Quality::auto())
        ->format(Format::auto());
        
    echo ($i + 1) . ". " . $media->toUrl() . "\n";
}

echo "\nTesting 50 fluent API ImageTag calls:\n";
echo "======================================\n";

// 50 separate calls using fluent v3 API for image tags
$tag1 = $cld->imageTag($publicIds[0])
    ->resize(Resize::fill($dimensions[0]['width'], $dimensions[0]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "1. " . $tag1 . "\n";

$tag2 = $cld->imageTag($publicIds[1])
    ->resize(Resize::fill($dimensions[1]['width'], $dimensions[1]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "2. " . $tag2 . "\n";

$tag3 = $cld->imageTag($publicIds[2])
    ->resize(Resize::fill($dimensions[2]['width'], $dimensions[2]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "3. " . $tag3 . "\n";

$tag4 = $cld->imageTag($publicIds[3])
    ->resize(Resize::fill($dimensions[3]['width'], $dimensions[3]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "4. " . $tag4 . "\n";

$tag5 = $cld->imageTag($publicIds[4])
    ->resize(Resize::fill($dimensions[4]['width'], $dimensions[4]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "5. " . $tag5 . "\n";

$tag6 = $cld->imageTag($publicIds[5])
    ->resize(Resize::pad($dimensions[5]['width'], $dimensions[5]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "6. " . $tag6 . "\n";

$tag7 = $cld->imageTag($publicIds[6])
    ->resize(Resize::pad($dimensions[6]['width'], $dimensions[6]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "7. " . $tag7 . "\n";

$tag8 = $cld->imageTag($publicIds[7])
    ->resize(Resize::scale($dimensions[7]['width'], $dimensions[7]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "8. " . $tag8 . "\n";

$tag9 = $cld->imageTag($publicIds[8])
    ->resize(Resize::scale($dimensions[8]['width'], $dimensions[8]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "9. " . $tag9 . "\n";

$tag10 = $cld->imageTag($publicIds[9])
    ->resize(Resize::fit($dimensions[9]['width'], $dimensions[9]['height']))
    ->quality(Quality::auto())
    ->format(Format::auto());
echo "10. " . $tag10 . "\n";

// Continue with remaining 40 calls using various resize methods
for ($i = 10; $i < 50; $i++) {
    $publicId = $publicIds[$i];
    $dimension = $dimensions[$i % count($dimensions)];
    
    // Vary resize methods for more realistic testing
    $resizeMethod = match($i % 4) {
        0 => Resize::fill($dimension['width'], $dimension['height']),
        1 => Resize::pad($dimension['width'], $dimension['height']),
        2 => Resize::scale($dimension['width'], $dimension['height']),
        3 => Resize::fit($dimension['width'], $dimension['height'])
    };
    
    $tag = $cld->imageTag($publicId)
        ->resize($resizeMethod)
        ->quality(Quality::auto())
        ->format(Format::auto());
        
    echo ($i + 1) . ". " . $tag . "\n";
}

echo "\nFluent API profiling test completed. Check profiler_output/ for .cachegrind files.\n";