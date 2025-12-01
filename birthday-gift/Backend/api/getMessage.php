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

// Get messages from database or JSON
$messages = [
    [
        'id' => 1,
        'name' => 'Naila Nazla Pohan',
        'age' => 19,
        'birthplace' => 'Medan',
        'birthdate' => '02 Desember 2006',
        'zodiac' => 'Sagitarius',
        'message' => 'Selamat ulang tahun yang ke-19 untuk cinta hidupku. Semoga setiap detik dalam hidupmu dipenuhi kebahagiaan, cinta, dan keberhasilan. Aku selalu bersyukur memiliki kamu di hidupku.',
        'date' => '2025-12-02',
        'from' => 'Yang selalu mencintaimu'
    ],
    [
        'id' => 2,
        'name' => 'Untuk Naila',
        'age' => 19,
        'birthplace' => 'Medan',
        'birthdate' => '02 Desember 2006',
        'zodiac' => 'Sagitarius',
        'message' => 'Di hari spesialmu ini, aku berdoa agar semua impianmu menjadi kenyataan. Kamu adalah berkah terbesar dalam hidupku, dan aku tak sabar melihat semua hal menakjubkan yang akan kamu capai.',
        'date' => '2025-12-02',
        'from' => 'Seseorang yang selalu ada'
    ],
    [
        'id' => 3,
        'name' => 'Naila Nazla Pohan',
        'age' => 19,
        'birthplace' => 'Medan',
        'birthdate' => '02 Desember 2006',
        'zodiac' => 'Sagitarius',
        'message' => 'Tahun ini adalah awal dari petualangan baru. Nikmati setiap momen, tertawa sebanyak-banyaknya, dan ketahuilah bahwa kamu sangat dicintai. Selamat ulang tahun sayang!',
        'date' => '2025-12-02',
        'from' => 'Yang selalu mengagumimu'
    ]
];

// Tambah token baru untuk response berikutnya
$newToken = SimpleEncryption::generateAPIToken();

// Return JSON response
echo json_encode([
    'status' => 'success',
    'token' => $newToken,
    'data' => [
        'birthday_person' => [
            'name' => 'Naila Nazla Pohan',
            'age' => 19,
            'birthplace' => 'Medan',
            'birthdate' => '02 Desember 2006',
            'current_year' => 2025
        ],
        'messages' => $messages
    ]
]);
?>