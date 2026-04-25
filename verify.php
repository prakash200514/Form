<?php
require_once 'functions.php';

if (!isset($_SESSION['verify_email'])) {
    header('Location: register.php');
    exit();
}

$error = '';
$success = '';
$email = $_SESSION['verify_email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $otp = implode('', $_POST['otp']); // Combine 6 input fields

    if (verifyOTP($email, $otp)) {
        // OTP Valid -> Create Account
        if (isset($_SESSION['temp_user'])) {
            $user = $_SESSION['temp_user'];
            
            try {
                $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password, is_verified) VALUES (?, ?, ?, 1)");
                $stmt->execute([$user['full_name'], $user['email'], $user['password']]);
                
                // Cleanup
                $stmt = $pdo->prepare("DELETE FROM otps WHERE email = ?");
                $stmt->execute([$email]);
                unset($_SESSION['temp_user']);
                unset($_SESSION['verify_email']);
                
                $success = "Account verified successfully! You can now login.";
                header("refresh:3;url=login.php");
            } catch (PDOException $e) {
                $error = "Account creation failed: " . $e->getMessage();
            }
        } else {
            $error = "Session expired. Please register again.";
        }
    } else {
        $error = "Invalid or expired OTP.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - Premium Auth</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Verify Email</h1>
                <p>Enter the 6-digit code sent to<br><strong><?php echo $email; ?></strong></p>
            </div>

            <?php if ($error): ?>
                <div class="alert alert-error"><?php echo $error; ?></div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php else: ?>
                <form method="POST" action="">
                    <div class="otp-inputs">
                        <input type="number" name="otp[]" class="form-control otp-input" maxlength="1" oninput="moveNext(this, 1)" required>
                        <input type="number" name="otp[]" class="form-control otp-input" maxlength="1" oninput="moveNext(this, 2)" required>
                        <input type="number" name="otp[]" class="form-control otp-input" maxlength="1" oninput="moveNext(this, 3)" required>
                        <input type="number" name="otp[]" class="form-control otp-input" maxlength="1" oninput="moveNext(this, 4)" required>
                        <input type="number" name="otp[]" class="form-control otp-input" maxlength="1" oninput="moveNext(this, 5)" required>
                        <input type="number" name="otp[]" class="form-control otp-input" maxlength="1" oninput="moveNext(this, 6)" required>
                    </div>

                    <button type="submit" class="btn">Verify & Create Account</button>
                </form>
            <?php endif; ?>

            <p class="footer-text">
                Didn't receive the code? <a href="register.php">Try again</a>
            </p>
        </div>
    </div>

    <script>
        function moveNext(current, nextIndex) {
            if (current.value.length >= 1) {
                const inputs = document.querySelectorAll('.otp-input');
                if (nextIndex < inputs.length) {
                    inputs[nextIndex].focus();
                }
            }
        }
        
        // Handle backspace
        document.querySelectorAll('.otp-input').forEach((input, index) => {
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !input.value) {
                    const inputs = document.querySelectorAll('.otp-input');
                    if (index > 0) inputs[index - 1].focus();
                }
            });
        });
    </script>
</body>
</html>
