<?php

// Run this script to create placeholder images
// Usage: php create_placeholders.php

$mediaPath = 'storage/app/public/post_media';

if (!is_dir($mediaPath)) {
    mkdir($mediaPath, 0755, true);
}

// Get all the media IDs we need from the exported data
require_once 'storage/app/media_export.php';
$mediaData = include 'storage/app/media_export.php';

echo "Creating placeholder images...\n";

foreach ($mediaData as $media) {
    $filename = "placeholder-{$media['id']}.jpg";
    $filepath = $mediaPath . '/' . $filename;
    
    // Create a simple colored rectangle as placeholder
    $width = 800;
    $height = 600;
    
    // Create image
    $image = imagecreate($width, $height);
    
    // Colors
    $background = imagecolorallocate($image, 240, 240, 240); // Light gray
    $text_color = imagecolorallocate($image, 100, 100, 100); // Dark gray
    $border = imagecolorallocate($image, 200, 200, 200); // Border
    
    // Fill background
    imagefill($image, 0, 0, $background);
    
    // Add border
    imagerectangle($image, 0, 0, $width-1, $height-1, $border);
    
    // Add text
    $text = "Placeholder Image\nID: {$media['id']}\nPost: {$media['post_id']}";
    $font_size = 5;
    $text_width = imagefontwidth($font_size) * strlen("Placeholder Image");
    $text_x = ($width - $text_width) / 2;
    $text_y = $height / 2 - 30;
    
    imagestring($image, $font_size, $text_x, $text_y, "Placeholder Image", $text_color);
    imagestring($image, 3, $text_x + 20, $text_y + 30, "ID: {$media['id']}", $text_color);
    imagestring($image, 3, $text_x + 20, $text_y + 50, "Post: {$media['post_id']}", $text_color);
    
    // Save image
    imagejpeg($image, $filepath, 90);
    imagedestroy($image);
    
    echo "Created: {$filename}\n";
}

echo "\nDone! Created " . count($mediaData) . " placeholder images.\n";
echo "Next steps:\n";
echo "1. Update BlogDataSeeder.php with your exported data\n";
echo "2. Run: php artisan migrate\n";
echo "3. Run: php artisan db:seed --class=BlogDataSeeder\n";
echo "4. Run: php artisan storage:link\n";