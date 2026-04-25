<?php
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Premium Auth</title>
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
    </div>

    <div class="welcome-container">
        <div class="card" style="background: rgba(255,255,255,0.05); border: 4px solid #000; box-shadow: 10px 10px 0px #000; border-radius: 30px;">
            <div class="card-header">
                <h1 style="font-family: 'Fredoka', sans-serif; font-size: 3rem; text-shadow: 2px 2px 0px #000; -webkit-text-fill-color: #fff;">DASHBOARD</h1>
                <p style="font-size: 1.2rem; margin-top: 10px;">Welcome back, <strong style="color: var(--cartoon-yellow); text-shadow: 1px 1px 0px #000;"><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong>!</p>
            </div>

            <div class="alert alert-success" style="border: 2px solid #000; box-shadow: 4px 4px 0px #000; background: var(--cartoon-green); color: #fff; font-weight: 600;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                Access Granted! Your account is verified.
            </div>

            <p style="margin: 20px 0; color: var(--text-muted);">You can now manage your profile and explore the system.</p>

            <div style="margin-top: 30px;">
                <a href="logout.php" class="btn-cartoon pink" style="font-size: 1.2rem; padding: 15px 30px; min-width: 150px;">
                    <span>LOGOUT</span>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
