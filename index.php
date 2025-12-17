<?php
session_start();
if (isset($_GET["logout"])) {
    session_unset();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nawa Durga Fruit Center</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <!-- Top Header -->
    <header>
        <div class="top_header">
            <img class="logo" src="images/logo.png" alt="Logo" height="100px" width="100px">
            <h1 class="shop_name">NAWA DURGA FRUIT CENTER</h1>
            <nav class="log_sign">
                <ul>
                    <?php if (isset($_SESSION['username'])): ?>
                        <li class="lsr">Welcome <strong><?php echo $_SESSION['username']; ?></strong></li>
                        <li><a href="index.php?logout" class="lsr">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php" class="lsr">Login</a></li>
                        <li><a href="sign-up.php" class="lsr">Signup</a></li>
                    <?php endif ?>
                    <li><a href="account.html" class="lsr2">Account</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Navigation Bar -->
    <header class="next">
        <nav class="cat">
            <ul>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
      
    </header>

    <!-- Special Offer Banner -->
    <div class="offer-banner">
        <p><i class="fa fa-gift"></i> Special Offer: Get 20% off on all fruit hampers! Limited time only.</p>
    </div>

    <!-- Image Carousel -->
    <div class="slideshow-container">
        <div class="mySlides fade"><img src="images/fruit1.png" style="width:100%" alt="Fresh Apples"></div>
        <div class="mySlides fade"><img src="images/fruit2.png" style="width:100%" alt="Bananas"></div>
        <div class="mySlides fade"><img src="images/fruit3.png" style="width:100%" alt="Oranges"></div>
        <div class="mySlides fade"><img src="images/fruit4.png" style="width:100%" alt="Seasonal Mangoes"></div>
    </div>
    <br>
    <div style="text-align:center">
        <span class="dot"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span>
    </div>

    <!-- Flip Cards -->
    <div class="flips s-12 s12">
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front"><img src="images/freshapple.png" alt="Apples" style="width:300px;height:300px;"></div>
                <div class="flip-card-back"><a class="page-link" href="#Apples">Crunchy apples at the best price. Free delivery on bulk orders!</a></div>
            </div>
        </div>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front"><img src="images/banana.png" alt="Bananas" style="width:300px;height:300px;"></div>
                <div class="flip-card-back"><a class="page-link" href="#Bananas">Fresh bananas straight from the farm.</a></div>
            </div>
        </div>
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front"><img src="images/fruitbasket.png" alt="Fruit Hamper" style="width:300px;height:300px;"></div>
                <div class="flip-card-back"><a class="page-link" href="#fruithamper">Freshly packed fruit hamper to nourish your body and brighten your day.</a></div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="foot-logo">
            <img src="images/logo.png" alt="Footer Logo" height="50px" width="50px">
            <h3>Nawa Durga Fruit Center</h3>
        </div>
        <article class="link-list">
            <ul>
                <li><a href="about.html" class="divi">About</a></li>
                <li><a href="contact.html" class="divi">Contact Us</a></li>
                <li><a href="privacy.html" class="no-divi">Privacy Policy</a></li>
            </ul>
        </article>
        <article class="copyr">&copy; 2025 Nawa Durga Fruit Center</article>
    </footer>

    <!-- Carousel Script -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        var slideIndex = 0;
        showSlides();
        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) { slides[i].style.display = "none"; }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 2500);
        }
    </script>
</body>
</html>
