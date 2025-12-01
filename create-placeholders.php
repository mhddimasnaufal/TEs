<?php
/**
 * Script untuk membuat gambar placeholder
 * Jalankan script ini sekali untuk membuat semua gambar placeholder yang diperlukan
 */

function createPlaceholderImage($width, $height, $text, $bgColor, $textColor, $filename) {
    // Create image
    $image = imagecreatetruecolor($width, $height);
    
    // Allocate colors
    list($r, $g, $b) = sscanf($bgColor, "#%02x%02x%02x");
    $bg = imagecolorallocate($image, $r, $g, $b);
    
    list($tr, $tg, $tb) = sscanf($textColor, "#%02x%02x%02x");
    $textColor = imagecolorallocate($image, $tr, $tg, $tb);
    
    // Fill background
    imagefilledrectangle($image, 0, 0, $width, $height, $bg);
    
    // Add text
    $font = 5; // Built-in font
    $textWidth = imagefontwidth($font) * strlen($text);
    $textHeight = imagefontheight($font);
    $x = ($width - $textWidth) / 2;
    $y = ($height - $textHeight) / 2;
    
    imagestring($image, $font, $x, $y, $text, $textColor);
    
    // Add border
    $borderColor = imagecolorallocate($image, 255, 255, 255);
    imagerectangle($image, 0, 0, $width-1, $height-1, $borderColor);
    
    // Save image
    imagejpeg($image, $filename, 90);
    imagedestroy($image);
    
    echo "Created: $filename\n";
}

// Create directories
$directories = [
    'assets/images/profile',
    'assets/images/gallery',
    'assets/images/thumbnails',
    'assets/images/zodiac',
    'assets/images/icons',
    'assets/images/backgrounds',
    'assets/videos',
    'assets/music',
    'assets/audio'
];

foreach ($directories as $dir) {
    if (!file_exists($dir)) {
        mkdir($dir, 0755, true);
        echo "Created directory: $dir\n";
    }
}

// Create profile images
createPlaceholderImage(400, 400, 'Naila Profile', '#6a11cb', '#ffffff', 'assets/images/profile/naila-profile.jpg');
createPlaceholderImage(200, 200, 'NA', '#2575fc', '#ffffff', 'assets/images/profile/naila-avatar.png');

// Create gallery images
$galleryImages = [
    ['birthday-1.jpg', 800, 600, 'Birthday Photo 1', '#ff6b6b'],
    ['birthday-2.jpg', 800, 600, 'Birthday Photo 2', '#4d96ff'],
    ['birthday-3.jpg', 800, 600, 'Birthday Photo 3', '#ffd166'],
    ['birthday-4.jpg', 800, 600, 'Birthday Photo 4', '#06d6a0'],
    ['birthday-5.jpg', 800, 600, 'Birthday Photo 5', '#9d4edd'],
    ['birthday-6.jpg', 800, 600, 'Birthday Photo 6', '#ff8e8e']
];

foreach ($galleryImages as $img) {
    createPlaceholderImage($img[1], $img[2], $img[3], $img[4], '#ffffff', 'assets/images/gallery/' . $img[0]);
}

// Create video thumbnails
$thumbnails = [
    ['video1.jpg', 320, 180, 'Video 1', '#6a11cb'],
    ['video2.jpg', 320, 180, 'Video 2', '#2575fc'],
    ['video3.jpg', 320, 180, 'Video 3', '#ff0080']
];

foreach ($thumbnails as $thumb) {
    createPlaceholderImage($thumb[1], $thumb[2], $thumb[3], $thumb[4], '#ffffff', 'assets/images/thumbnails/' . $thumb[0]);
}

// Create zodiac images
createPlaceholderImage(400, 400, 'Cancer ♋', '#1a237e', '#ffffff', 'assets/images/zodiac/cancer.png');
createPlaceholderImage(1920, 1080, 'Zodiac Background', '#0c2461', '#ffffff', 'assets/images/zodiac/zodiac-bg.jpg');

// Create background images
createPlaceholderImage(1920, 1080, 'Galaxy Background', '#0a0a2a', '#ffffff', 'assets/images/backgrounds/galaxy-bg.jpg');
createPlaceholderImage(1920, 1080, 'Celebration Background', '#8a2387', '#ffffff', 'assets/images/backgrounds/celebration-bg.jpg');

// Create icon placeholders (simplified versions)
$icons = [
    ['birthday-cake.png', 100, 100, '🎂', '#ffd700'],
    ['heart-icon.png', 100, 100, '❤️', '#ff6b6b'],
    ['star-icon.png', 100, 100, '⭐', '#ffd700']
];

foreach ($icons as $icon) {
    createPlaceholderImage($icon[1], $icon[2], $icon[3], $icon[4], '#ffffff', 'assets/images/icons/' . $icon[0]);
}

// Create placeholder audio files (empty MP3 files)
$audioFiles = ['message1.mp3', 'message2.mp3', 'message3.mp3'];
foreach ($audioFiles as $audio) {
    file_put_contents('assets/audio/' . $audio, base64_decode('SUQzBAAAAAABAFRDT04AAAAHAAAAQ09NUEFUSUJMRQAAABIAAAAibWFya2VycwAAAAEAAABU///5H///8H///wD///8A'));
    echo "Created placeholder audio: assets/audio/$audio\n";
}

// Create empty placeholder files for videos and music
file_put_contents('assets/videos/birthday-wish-1.mp4', '');
file_put_contents('assets/videos/birthday-wish-2.mp4', '');
file_put_contents('assets/videos/birthday-wish-3.mp4', '');
file_put_contents('assets/music/birthday-song.mp3', '');
file_put_contents('assets/music/background-music.mp3', '');

echo "\n✅ Semua placeholder telah dibuat!\n";
echo "📁 Struktur file siap digunakan.\n";
?>