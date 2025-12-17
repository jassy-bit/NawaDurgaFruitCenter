<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="site-header">
    <div class="logo-area">
        <img src="images/logo.png" alt="Nawa Durga Fruit Center Logo" class="logo-img">
        <div class="brand-text">
            <h1>Nawa Durga Fruit Center</h1>
          <p class="brand-tagline">Fresh • Local • Seasonal</p>
        </div>
    </div>

    <nav class="main-nav">
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </nav>

    <div class="account-buttons">
        <?php if(isset($_SESSION['username'])){ ?>
            <span>Welcome <?php echo $_SESSION['username'] ?></span>
        <?php }else{ ?>
        <a href="login.php" class="btn">Login</a>
        <a href="signup.php" class="btn">Signup</a>
        <?php } ?>
        <a href="account.php" class="btn">Account</a>
    </div>
</header>
