<?php
// Configuration File for Naila's Birthday Website

// Database Configuration (if needed)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'naila_birthday');

// Site Configuration
define('SITE_NAME', 'Happy Birthday Naila Nazla Pohan');
define('SITE_URL', 'http://localhost/naila-birthday');
define('SITE_EMAIL', 'hello@nailabirthday.com');

// Timezone
date_default_timezone_set('Asia/Jakarta');

// Security Configuration
define('SECRET_KEY', 'naila_19_birthday_secret_2025');
define('SESSION_TIMEOUT', 3600); // 1 hour

// Feature Flags
define('ENABLE_SECRET_PAGE', true);
define('ENABLE_QUIZ', true);
define('ENABLE_MUSIC', true);
define('ENABLE_ANIMATIONS', true);

// Birthday Information
define('BIRTHDAY_NAME', 'Naila Nazla Pohan');
define('BIRTHDAY_AGE', 19);
define('BIRTHDAY_DATE', '2006-12-02');
define('BIRTHDAY_PLACE', 'Medan, Indonesia');
define('BIRTHDAY_ZODIAC', 'Sagittarius');

// Path Configuration
define('ASSETS_PATH', 'assets/');
define('UPLOADS_PATH', 'uploads/');
define('TEMPLATES_PATH', 'templates/');

// Error Reporting
if (isset($_GET['debug']) && $_GET['debug'] == 'true') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Start Session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Auto-loader for classes (if needed)
spl_autoload_register(function ($class_name) {
    $file = __DIR__ . '/classes/' . $class_name . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Common Functions
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function is_birthday_today() {
    $today = date('m-d');
    $birthday = date('m-d', strtotime(BIRTHDAY_DATE));
    return $today === $birthday;
}

function days_until_birthday() {
    $today = new DateTime();
    $birthday = new DateTime(date('Y') . '-' . date('m-d', strtotime(BIRTHDAY_DATE)));
    
    if ($today > $birthday) {
        $birthday->modify('+1 year');
    }
    
    $interval = $today->diff($birthday);
    return $interval->days;
}

function get_age() {
    $birthday = new DateTime(BIRTHDAY_DATE);
    $today = new DateTime();
    $age = $today->diff($birthday);
    return $age->y;
}

// Initialize site-wide variables
$current_page = basename($_SERVER['PHP_SELF']);
$is_home_page = ($current_page == 'index.php');
$is_secret_page = ($current_page == 'secret.php');
$current_year = date('Y');
$site_title = SITE_NAME . ' | ' . BIRTHDAY_NAME . ' Turns ' . BIRTHDAY_AGE;

// Check for maintenance mode
if (file_exists(__DIR__ . '/maintenance.lock') && !isset($_SESSION['admin'])) {
    header('HTTP/1.1 503 Service Unavailable');
    include 'maintenance.php';
    exit;
}

// Log visitor (optional)
function log_visitor() {
    $log_file = __DIR__ . '/logs/visitors.log';
    $ip = $_SERVER['REMOTE_ADDR'];
    $time = date('Y-m-d H:i:s');
    $page = basename($_SERVER['PHP_SELF']);
    $agent = $_SERVER['HTTP_USER_AGENT'];
    
    $log_entry = "$time | IP: $ip | Page: $page | Agent: $agent\n";
    
    if (!file_exists(__DIR__ . '/logs')) {
        mkdir(__DIR__ . '/logs', 0777, true);
    }
    
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
}

// Call log visitor
if (ENABLE_SECRET_PAGE) {
    log_visitor();
}
?>