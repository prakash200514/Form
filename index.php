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
    <!-- Animated Video Background -->
    <div class="video-bg">
        <video autoplay muted loop playsinline>
            <source src="https://assets.mixkit.co/videos/preview/mixkit-abstract-flowing-multi-colored-gradient-background-23136-large.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Animated Shapes Background -->
    <div class="shapes-bg">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-1" style="top:80%; left:20%; animation-delay:-2s;"></div>
        <div class="shape shape-2" style="top:20%; left:70%; animation-delay:-5s;"></div>
        <div class="shape shape-3" style="top:70%; left:80%; animation-delay:-8s;"></div>
    </div>

    <div class="welcome-container">
        <h1 class="welcome-title">WELCOME!</h1>
        <p class="welcome-subtitle">The most advanced and highly animated system.</p>
        
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
