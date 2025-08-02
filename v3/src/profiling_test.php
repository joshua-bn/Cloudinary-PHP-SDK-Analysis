<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Cloudinary\Configuration\Configuration;
use Cloudinary\Asset\Media;
use Cloudinary\Tag\ImageTag;

// Configure Cloudinary with dummy CNAME
$config = Configuration::instance([
    'cloud' => [
        'cloud_name' => 'demo-cloud',
        'cname' => 'images.example.com',
        'secure_cname' => 'images.example.com'
    ]
]);

echo "Starting Cloudinary SDK v3 Performance Profiling Test\n";
echo "====================================================\n\n";

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

echo "Testing 50 Media::fromParams() calls:\n";
echo "=====================================\n";

// 50 separate calls to Media::fromParams()
$media1 = Media::fromParams($publicIds[0], ['width' => $dimensions[0]['width'], 'height' => $dimensions[0]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "1. " . $media1->toUrl() . "\n";

$media2 = Media::fromParams($publicIds[1], ['width' => $dimensions[1]['width'], 'height' => $dimensions[1]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "2. " . $media2->toUrl() . "\n";

$media3 = Media::fromParams($publicIds[2], ['width' => $dimensions[2]['width'], 'height' => $dimensions[2]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "3. " . $media3->toUrl() . "\n";

$media4 = Media::fromParams($publicIds[3], ['width' => $dimensions[3]['width'], 'height' => $dimensions[3]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "4. " . $media4->toUrl() . "\n";

$media5 = Media::fromParams($publicIds[4], ['width' => $dimensions[4]['width'], 'height' => $dimensions[4]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "5. " . $media5->toUrl() . "\n";

$media6 = Media::fromParams($publicIds[5], ['width' => $dimensions[5]['width'], 'height' => $dimensions[5]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "6. " . $media6->toUrl() . "\n";

$media7 = Media::fromParams($publicIds[6], ['width' => $dimensions[6]['width'], 'height' => $dimensions[6]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "7. " . $media7->toUrl() . "\n";

$media8 = Media::fromParams($publicIds[7], ['width' => $dimensions[7]['width'], 'height' => $dimensions[7]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "8. " . $media8->toUrl() . "\n";

$media9 = Media::fromParams($publicIds[8], ['width' => $dimensions[8]['width'], 'height' => $dimensions[8]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "9. " . $media9->toUrl() . "\n";

$media10 = Media::fromParams($publicIds[9], ['width' => $dimensions[9]['width'], 'height' => $dimensions[9]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "10. " . $media10->toUrl() . "\n";

$media11 = Media::fromParams($publicIds[10], ['width' => $dimensions[0]['width'], 'height' => $dimensions[0]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "11. " . $media11->toUrl() . "\n";

$media12 = Media::fromParams($publicIds[11], ['width' => $dimensions[1]['width'], 'height' => $dimensions[1]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "12. " . $media12->toUrl() . "\n";

$media13 = Media::fromParams($publicIds[12], ['width' => $dimensions[2]['width'], 'height' => $dimensions[2]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "13. " . $media13->toUrl() . "\n";

$media14 = Media::fromParams($publicIds[13], ['width' => $dimensions[3]['width'], 'height' => $dimensions[3]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "14. " . $media14->toUrl() . "\n";

$media15 = Media::fromParams($publicIds[14], ['width' => $dimensions[4]['width'], 'height' => $dimensions[4]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "15. " . $media15->toUrl() . "\n";

$media16 = Media::fromParams($publicIds[15], ['width' => $dimensions[5]['width'], 'height' => $dimensions[5]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "16. " . $media16->toUrl() . "\n";

$media17 = Media::fromParams($publicIds[16], ['width' => $dimensions[6]['width'], 'height' => $dimensions[6]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "17. " . $media17->toUrl() . "\n";

$media18 = Media::fromParams($publicIds[17], ['width' => $dimensions[7]['width'], 'height' => $dimensions[7]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "18. " . $media18->toUrl() . "\n";

$media19 = Media::fromParams($publicIds[18], ['width' => $dimensions[8]['width'], 'height' => $dimensions[8]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "19. " . $media19->toUrl() . "\n";

$media20 = Media::fromParams($publicIds[19], ['width' => $dimensions[9]['width'], 'height' => $dimensions[9]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "20. " . $media20->toUrl() . "\n";

$media21 = Media::fromParams($publicIds[20], ['width' => $dimensions[0]['width'], 'height' => $dimensions[0]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "21. " . $media21->toUrl() . "\n";

$media22 = Media::fromParams($publicIds[21], ['width' => $dimensions[1]['width'], 'height' => $dimensions[1]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "22. " . $media22->toUrl() . "\n";

$media23 = Media::fromParams($publicIds[22], ['width' => $dimensions[2]['width'], 'height' => $dimensions[2]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "23. " . $media23->toUrl() . "\n";

$media24 = Media::fromParams($publicIds[23], ['width' => $dimensions[3]['width'], 'height' => $dimensions[3]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "24. " . $media24->toUrl() . "\n";

$media25 = Media::fromParams($publicIds[24], ['width' => $dimensions[4]['width'], 'height' => $dimensions[4]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "25. " . $media25->toUrl() . "\n";

$media26 = Media::fromParams($publicIds[25], ['width' => $dimensions[5]['width'], 'height' => $dimensions[5]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "26. " . $media26->toUrl() . "\n";

$media27 = Media::fromParams($publicIds[26], ['width' => $dimensions[6]['width'], 'height' => $dimensions[6]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "27. " . $media27->toUrl() . "\n";

$media28 = Media::fromParams($publicIds[27], ['width' => $dimensions[7]['width'], 'height' => $dimensions[7]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "28. " . $media28->toUrl() . "\n";

$media29 = Media::fromParams($publicIds[28], ['width' => $dimensions[8]['width'], 'height' => $dimensions[8]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "29. " . $media29->toUrl() . "\n";

$media30 = Media::fromParams($publicIds[29], ['width' => $dimensions[9]['width'], 'height' => $dimensions[9]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "30. " . $media30->toUrl() . "\n";

$media31 = Media::fromParams($publicIds[30], ['width' => $dimensions[0]['width'], 'height' => $dimensions[0]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "31. " . $media31->toUrl() . "\n";

$media32 = Media::fromParams($publicIds[31], ['width' => $dimensions[1]['width'], 'height' => $dimensions[1]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "32. " . $media32->toUrl() . "\n";

$media33 = Media::fromParams($publicIds[32], ['width' => $dimensions[2]['width'], 'height' => $dimensions[2]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "33. " . $media33->toUrl() . "\n";

$media34 = Media::fromParams($publicIds[33], ['width' => $dimensions[3]['width'], 'height' => $dimensions[3]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "34. " . $media34->toUrl() . "\n";

$media35 = Media::fromParams($publicIds[34], ['width' => $dimensions[4]['width'], 'height' => $dimensions[4]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "35. " . $media35->toUrl() . "\n";

$media36 = Media::fromParams($publicIds[35], ['width' => $dimensions[5]['width'], 'height' => $dimensions[5]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "36. " . $media36->toUrl() . "\n";

$media37 = Media::fromParams($publicIds[36], ['width' => $dimensions[6]['width'], 'height' => $dimensions[6]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "37. " . $media37->toUrl() . "\n";

$media38 = Media::fromParams($publicIds[37], ['width' => $dimensions[7]['width'], 'height' => $dimensions[7]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "38. " . $media38->toUrl() . "\n";

$media39 = Media::fromParams($publicIds[38], ['width' => $dimensions[8]['width'], 'height' => $dimensions[8]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "39. " . $media39->toUrl() . "\n";

$media40 = Media::fromParams($publicIds[39], ['width' => $dimensions[9]['width'], 'height' => $dimensions[9]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "40. " . $media40->toUrl() . "\n";

$media41 = Media::fromParams($publicIds[40], ['width' => $dimensions[0]['width'], 'height' => $dimensions[0]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "41. " . $media41->toUrl() . "\n";

$media42 = Media::fromParams($publicIds[41], ['width' => $dimensions[1]['width'], 'height' => $dimensions[1]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "42. " . $media42->toUrl() . "\n";

$media43 = Media::fromParams($publicIds[42], ['width' => $dimensions[2]['width'], 'height' => $dimensions[2]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "43. " . $media43->toUrl() . "\n";

$media44 = Media::fromParams($publicIds[43], ['width' => $dimensions[3]['width'], 'height' => $dimensions[3]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "44. " . $media44->toUrl() . "\n";

$media45 = Media::fromParams($publicIds[44], ['width' => $dimensions[4]['width'], 'height' => $dimensions[4]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "45. " . $media45->toUrl() . "\n";

$media46 = Media::fromParams($publicIds[45], ['width' => $dimensions[5]['width'], 'height' => $dimensions[5]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "46. " . $media46->toUrl() . "\n";

$media47 = Media::fromParams($publicIds[46], ['width' => $dimensions[6]['width'], 'height' => $dimensions[6]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "47. " . $media47->toUrl() . "\n";

$media48 = Media::fromParams($publicIds[47], ['width' => $dimensions[7]['width'], 'height' => $dimensions[7]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "48. " . $media48->toUrl() . "\n";

$media49 = Media::fromParams($publicIds[48], ['width' => $dimensions[8]['width'], 'height' => $dimensions[8]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "49. " . $media49->toUrl() . "\n";

$media50 = Media::fromParams($publicIds[49], ['width' => $dimensions[9]['width'], 'height' => $dimensions[9]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "50. " . $media50->toUrl() . "\n";

echo "\nTesting 50 ImageTag::fromParams() calls:\n";
echo "========================================\n";

// 50 separate calls to ImageTag::fromParams()
$tag1 = ImageTag::fromParams($publicIds[0], ['width' => $dimensions[0]['width'], 'height' => $dimensions[0]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "1. " . $tag1 . "\n";

$tag2 = ImageTag::fromParams($publicIds[1], ['width' => $dimensions[1]['width'], 'height' => $dimensions[1]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "2. " . $tag2 . "\n";

$tag3 = ImageTag::fromParams($publicIds[2], ['width' => $dimensions[2]['width'], 'height' => $dimensions[2]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "3. " . $tag3 . "\n";

$tag4 = ImageTag::fromParams($publicIds[3], ['width' => $dimensions[3]['width'], 'height' => $dimensions[3]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "4. " . $tag4 . "\n";

$tag5 = ImageTag::fromParams($publicIds[4], ['width' => $dimensions[4]['width'], 'height' => $dimensions[4]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "5. " . $tag5 . "\n";

$tag6 = ImageTag::fromParams($publicIds[5], ['width' => $dimensions[5]['width'], 'height' => $dimensions[5]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "6. " . $tag6 . "\n";

$tag7 = ImageTag::fromParams($publicIds[6], ['width' => $dimensions[6]['width'], 'height' => $dimensions[6]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "7. " . $tag7 . "\n";

$tag8 = ImageTag::fromParams($publicIds[7], ['width' => $dimensions[7]['width'], 'height' => $dimensions[7]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "8. " . $tag8 . "\n";

$tag9 = ImageTag::fromParams($publicIds[8], ['width' => $dimensions[8]['width'], 'height' => $dimensions[8]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "9. " . $tag9 . "\n";

$tag10 = ImageTag::fromParams($publicIds[9], ['width' => $dimensions[9]['width'], 'height' => $dimensions[9]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "10. " . $tag10 . "\n";

$tag11 = ImageTag::fromParams($publicIds[10], ['width' => $dimensions[0]['width'], 'height' => $dimensions[0]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "11. " . $tag11 . "\n";

$tag12 = ImageTag::fromParams($publicIds[11], ['width' => $dimensions[1]['width'], 'height' => $dimensions[1]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "12. " . $tag12 . "\n";

$tag13 = ImageTag::fromParams($publicIds[12], ['width' => $dimensions[2]['width'], 'height' => $dimensions[2]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "13. " . $tag13 . "\n";

$tag14 = ImageTag::fromParams($publicIds[13], ['width' => $dimensions[3]['width'], 'height' => $dimensions[3]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "14. " . $tag14 . "\n";

$tag15 = ImageTag::fromParams($publicIds[14], ['width' => $dimensions[4]['width'], 'height' => $dimensions[4]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "15. " . $tag15 . "\n";

$tag16 = ImageTag::fromParams($publicIds[15], ['width' => $dimensions[5]['width'], 'height' => $dimensions[5]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "16. " . $tag16 . "\n";

$tag17 = ImageTag::fromParams($publicIds[16], ['width' => $dimensions[6]['width'], 'height' => $dimensions[6]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "17. " . $tag17 . "\n";

$tag18 = ImageTag::fromParams($publicIds[17], ['width' => $dimensions[7]['width'], 'height' => $dimensions[7]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "18. " . $tag18 . "\n";

$tag19 = ImageTag::fromParams($publicIds[18], ['width' => $dimensions[8]['width'], 'height' => $dimensions[8]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "19. " . $tag19 . "\n";

$tag20 = ImageTag::fromParams($publicIds[19], ['width' => $dimensions[9]['width'], 'height' => $dimensions[9]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "20. " . $tag20 . "\n";

$tag21 = ImageTag::fromParams($publicIds[20], ['width' => $dimensions[0]['width'], 'height' => $dimensions[0]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "21. " . $tag21 . "\n";

$tag22 = ImageTag::fromParams($publicIds[21], ['width' => $dimensions[1]['width'], 'height' => $dimensions[1]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "22. " . $tag22 . "\n";

$tag23 = ImageTag::fromParams($publicIds[22], ['width' => $dimensions[2]['width'], 'height' => $dimensions[2]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "23. " . $tag23 . "\n";

$tag24 = ImageTag::fromParams($publicIds[23], ['width' => $dimensions[3]['width'], 'height' => $dimensions[3]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "24. " . $tag24 . "\n";

$tag25 = ImageTag::fromParams($publicIds[24], ['width' => $dimensions[4]['width'], 'height' => $dimensions[4]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "25. " . $tag25 . "\n";

$tag26 = ImageTag::fromParams($publicIds[25], ['width' => $dimensions[5]['width'], 'height' => $dimensions[5]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "26. " . $tag26 . "\n";

$tag27 = ImageTag::fromParams($publicIds[26], ['width' => $dimensions[6]['width'], 'height' => $dimensions[6]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "27. " . $tag27 . "\n";

$tag28 = ImageTag::fromParams($publicIds[27], ['width' => $dimensions[7]['width'], 'height' => $dimensions[7]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "28. " . $tag28 . "\n";

$tag29 = ImageTag::fromParams($publicIds[28], ['width' => $dimensions[8]['width'], 'height' => $dimensions[8]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "29. " . $tag29 . "\n";

$tag30 = ImageTag::fromParams($publicIds[29], ['width' => $dimensions[9]['width'], 'height' => $dimensions[9]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "30. " . $tag30 . "\n";

$tag31 = ImageTag::fromParams($publicIds[30], ['width' => $dimensions[0]['width'], 'height' => $dimensions[0]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "31. " . $tag31 . "\n";

$tag32 = ImageTag::fromParams($publicIds[31], ['width' => $dimensions[1]['width'], 'height' => $dimensions[1]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "32. " . $tag32 . "\n";

$tag33 = ImageTag::fromParams($publicIds[32], ['width' => $dimensions[2]['width'], 'height' => $dimensions[2]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "33. " . $tag33 . "\n";

$tag34 = ImageTag::fromParams($publicIds[33], ['width' => $dimensions[3]['width'], 'height' => $dimensions[3]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "34. " . $tag34 . "\n";

$tag35 = ImageTag::fromParams($publicIds[34], ['width' => $dimensions[4]['width'], 'height' => $dimensions[4]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "35. " . $tag35 . "\n";

$tag36 = ImageTag::fromParams($publicIds[35], ['width' => $dimensions[5]['width'], 'height' => $dimensions[5]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "36. " . $tag36 . "\n";

$tag37 = ImageTag::fromParams($publicIds[36], ['width' => $dimensions[6]['width'], 'height' => $dimensions[6]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "37. " . $tag37 . "\n";

$tag38 = ImageTag::fromParams($publicIds[37], ['width' => $dimensions[7]['width'], 'height' => $dimensions[7]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "38. " . $tag38 . "\n";

$tag39 = ImageTag::fromParams($publicIds[38], ['width' => $dimensions[8]['width'], 'height' => $dimensions[8]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "39. " . $tag39 . "\n";

$tag40 = ImageTag::fromParams($publicIds[39], ['width' => $dimensions[9]['width'], 'height' => $dimensions[9]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "40. " . $tag40 . "\n";

$tag41 = ImageTag::fromParams($publicIds[40], ['width' => $dimensions[0]['width'], 'height' => $dimensions[0]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "41. " . $tag41 . "\n";

$tag42 = ImageTag::fromParams($publicIds[41], ['width' => $dimensions[1]['width'], 'height' => $dimensions[1]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "42. " . $tag42 . "\n";

$tag43 = ImageTag::fromParams($publicIds[42], ['width' => $dimensions[2]['width'], 'height' => $dimensions[2]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "43. " . $tag43 . "\n";

$tag44 = ImageTag::fromParams($publicIds[43], ['width' => $dimensions[3]['width'], 'height' => $dimensions[3]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "44. " . $tag44 . "\n";

$tag45 = ImageTag::fromParams($publicIds[44], ['width' => $dimensions[4]['width'], 'height' => $dimensions[4]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "45. " . $tag45 . "\n";

$tag46 = ImageTag::fromParams($publicIds[45], ['width' => $dimensions[5]['width'], 'height' => $dimensions[5]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "46. " . $tag46 . "\n";

$tag47 = ImageTag::fromParams($publicIds[46], ['width' => $dimensions[6]['width'], 'height' => $dimensions[6]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "47. " . $tag47 . "\n";

$tag48 = ImageTag::fromParams($publicIds[47], ['width' => $dimensions[7]['width'], 'height' => $dimensions[7]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "48. " . $tag48 . "\n";

$tag49 = ImageTag::fromParams($publicIds[48], ['width' => $dimensions[8]['width'], 'height' => $dimensions[8]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "49. " . $tag49 . "\n";

$tag50 = ImageTag::fromParams($publicIds[49], ['width' => $dimensions[9]['width'], 'height' => $dimensions[9]['height'], 'quality' => 'auto', 'fetch_format' => 'auto']);
echo "50. " . $tag50 . "\n";

echo "\nProfiling test completed. Check profiler_output/ for .cachegrind files.\n";