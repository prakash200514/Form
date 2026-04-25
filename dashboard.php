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
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Dashboard</h1>
                <p>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
            </div>

            <div class="alert alert-success">
                You have successfully logged in and verified your email.
            </div>

            <a href="logout.php" class="btn" style="background: rgba(255,255,255,0.1); border: 1px solid var(--glass-border);">
                <span>Logout</span>
            </a>
        </div>
    </div>
</body>
</html>
