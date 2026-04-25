<?php
require_once 'config.php';

// Generate a 6-digit OTP
function generateOTP() {
    return str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
}

// Sanitize user input
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Send OTP via Email
// NOTE: This requires PHPMailer to work properly with Gmail SMTP.
// Download PHPMailer from: https://github.com/PHPMailer/PHPMailer
function sendOTPEmail($email, $otp) {
    // If PHPMailer is not installed, we'll return true but skip sending to avoid fatal errors.
    // In a real scenario, the user should install PHPMailer in 'vendor/phpmailer'
    
    $phpmailer_path = 'vendor/phpmailer/src/PHPMailer.php';
    if (!file_exists($phpmailer_path)) {
        // Fallback for debugging: OTP is logged in otp_debug.txt
        return true; 
    }

    require 'vendor/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/src/SMTP.php';
    
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = SMTP_PORT;

        $mail->setFrom(SMTP_USER, FROM_NAME);
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your Verification OTP';
        $mail->Body    = "Your 6-digit OTP for registration is: <b>$otp</b>. It will expire in 5 minutes.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Save OTP to database
function saveOTP($email, $otp) {
    global $pdo;
    
    // Delete any existing OTP for this email
    $stmt = $pdo->prepare("DELETE FROM otps WHERE email = ?");
    $stmt->execute([$email]);
    
    // Insert new OTP using DB's NOW() for consistency
    $stmt = $pdo->prepare("INSERT INTO otps (email, otp, expiry) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 5 MINUTE))");
    $result = $stmt->execute([$email, $otp]);

    // DEBUG LOG: Write OTP to a local file so the developer can see it without email
    $log_message = date('[Y-m-d H:i:s]') . " OTP for $email: $otp" . PHP_EOL;
    file_put_contents('otp_debug.txt', $log_message, FILE_APPEND);

    return $result;
}

// Verify OTP
function verifyOTP($email, $otp) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM otps WHERE email = ? AND otp = ? AND expiry > NOW()");
    $stmt->execute([$email, $otp]);
    return $stmt->fetch();
}
?>
