<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Premium Auth System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Animated Shapes Background -->
    <div class="shapes-bg">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-1" style="top:80%; left:20%; animation-delay:-2s;"></div>
        <div class="shape shape-2" style="top:20%; left:70%; animation-delay:-5s;"></div>
    </div>

    <div class="welcome-container">
        <h1 class="welcome-title">READY TO START?</h1>
        <p class="welcome-subtitle">The most secure and playful authentication system awaits you.</p>
        
        <div class="welcome-actions">
            <a href="login.php" class="btn-cartoon">
                <span>LOGIN</span>
            </a>
            <a href="register.php" class="btn-cartoon pink">
                <span>REGISTER</span>
            </a>
        </div>

        <p class="footer-text" style="margin-top: 50px; opacity: 0.7;">
            Built with ❤️ for a premium experience
        </p>
    </div>

    <script>
        // Simple animation trigger on load
        document.addEventListener('DOMContentLoaded', () => {
            console.log('Premium UI Loaded');
        });
    </script>
</body>
</html>
