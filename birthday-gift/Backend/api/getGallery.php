<?php
require_once '../config.php';
require_once 'encryption.php';

// Check token
$headers = getallheaders();
$token = isset($headers['Authorization']) ? str_replace('Bearer ', '', $headers['Authorization']) : '';

if (!SimpleEncryption::validateAPIToken($token)) {
    http_response_code(401);
    echo json_encode([
        'status' => 'error',
        'message' => 'Unauthorized access'
    ]);
    exit;
}

// Gallery data
$gallery = [
    [
        'id' => 1,
        'title' => 'Momen Spesial',
        'description' => 'Kenangan indah bersama',
        'image' => 'images/gallery1.jpg',
        'date' => '2024-06-15',
        'category' => 'special'
    ],
    [
        'id' => 2,
        'title' => 'Kebersamaan',
        'description' => 'Senyuman yang menyimpan sejuta cerita',
        'image' => 'images/gallery2.jpg',
        'date' => '2024-08-22',
        'category' => 'together'
    ],
    [
        'id' => 3,
        'title' => 'Petualangan',
        'description' => 'Melangkah bersama menuju impian',
        'image' => 'images/gallery3.jpg',
        'date' => '2024-11-10',
        'category' => 'adventure'
    ],
    [
        'id' => 4,
        'title' => 'Canda Tawa',
        'description' => 'Momen penuh kebahagiaan',
        'image' => 'images/gallery4.jpg',
        'date' => '2025-01-18',
        'category' => 'happy'
    ],
    [
        'id' => 5,
        'title' => 'Romantis',
        'description' => 'Kasih sayang yang tak ternilai',
        'image' => 'images/gallery5.jpg',
        'date' => '2025-03-25',
        'category' => 'romantic'
    ],
    [
        'id' => 6,
        'title' => 'Impian',
        'description' => 'Bersama meraih masa depan',
        'image' => 'images/gallery6.jpg',
        'date' => '2025-05-30',
        'category' => 'dream'
    ]
];

$newToken = SimpleEncryption::generateAPIToken();

echo json_encode([
    'status' => 'success',
    'token' => $newToken,
    'data' => $gallery
]);
?>