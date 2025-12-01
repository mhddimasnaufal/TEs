<?php
// Konfigurasi Database dan Aplikasi
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

// Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'birthday_db');

// Encryption Key
define('ENCRYPTION_KEY', 'happy_birthday_naila_2025');
define('ENCRYPTION_METHOD', 'AES-256-CBC');

// Base URL
define('BASE_URL', 'http://localhost:8000');

// Function untuk koneksi database
function getDBConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        die(json_encode([
            'status' => 'error',
            'message' => 'Database connection failed'
        ]));
    }
    
    return $conn;
}

// Function untuk generate token
function generateToken($data) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length(ENCRYPTION_METHOD));
    $encrypted = openssl_encrypt(
        json_encode($data),
        ENCRYPTION_METHOD,
        ENCRYPTION_KEY,
        0,
        $iv
    );
    
    return base64_encode($encrypted . '::' . base64_encode($iv));
}

// Function untuk validate token
function validateToken($token) {
    list($encrypted_data, $iv) = explode('::', base64_decode($token), 2);
    $iv = base64_decode($iv);
    
    $decrypted = openssl_decrypt(
        $encrypted_data,
        ENCRYPTION_METHOD,
        ENCRYPTION_KEY,
        0,
        $iv
    );
    
    return json_decode($decrypted, true);
}

// Sanitize input
function sanitizeInput($input) {
    if (is_array($input)) {
        return array_map('sanitizeInput', $input);
    }
    
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    
    return $input;
}
?>