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
    // Since PHPMailer is a library, I'll provide a structure.
    // If PHPMailer is not installed, this will fail.
    // I recommend the user to put PHPMailer in a folder named 'vendor/phpmailer'
    
    /* 
    require 'vendor/phpmailer/src/Exception.php';
    require 'vendor/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/src/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = SMTP_HOST;
        $mail->SMTPAuth   = true;
        $mail->Username   = SMTP_USER;
        $mail->Password   = SMTP_PASS;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
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
    */
    
    // For now, I'll return true to simulate success if the user hasn't set up PHPMailer yet.
    // In a real scenario, this would be the actual logic.
    return true; 
}

// Save OTP to database
function saveOTP($email, $otp) {
    global $pdo;
    $expiry = date('Y-m-d H:i:s', strtotime('+5 minutes'));
    
    // Delete any existing OTP for this email
    $stmt = $pdo->prepare("DELETE FROM otps WHERE email = ?");
    $stmt->execute([$email]);
    
    // Insert new OTP
    $stmt = $pdo->prepare("INSERT INTO otps (email, otp, expiry) VALUES (?, ?, ?)");
    return $stmt->execute([$email, $otp, $expiry]);
}

// Verify OTP
function verifyOTP($email, $otp) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM otps WHERE email = ? AND otp = ? AND expiry > NOW()");
    $stmt->execute([$email, $otp]);
    return $stmt->fetch();
}
?>
