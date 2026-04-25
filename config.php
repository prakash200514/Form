<?php
// Database Configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'otp_verification_system');
define('DB_USER', 'root');
define('DB_PASS', 'password');

// SMTP Configuration (Gmail)
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'marimuthuprakash360@gmail.com'); // YOUR GMAIL
define('SMTP_PASS', 'bndh dfda lioc knwj');   // YOUR GMAIL APP PASSWORD
define('FROM_NAME', 'OTP System');

// Session Start
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database Connection using PDO
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
