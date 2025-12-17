<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Example: set username if not already set (for demo/testing)
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'Jasmine';
}

$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nawa Durga Fruit Center</title>
    <link rel="stylesheet" href="account.css">
    <link rel="stylesheet" href="nav.css">
    <!-- Google Fonts (optional, for professional look) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
<?php include('nav.php'); ?>

    <div class="promo-banner">
        <div class="promo-content">
            <span class="promo-tagline">🎁 Special Offer</span>
            <h2>Get 20% off on all fruit hampers!</h2>
            <p>Limited time only. Grab your fresh and juicy hamper today.</p>
            <a href="shop.php" class="btn btn-banner">Shop Hampers</a>
        </div>
        <div class="promo-image-overlay">
            <!-- Background image handled in CSS -->
        </div>
    </div>
</header>
