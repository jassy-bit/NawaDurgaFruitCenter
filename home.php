<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['msg']="You must log in";
        header('location:index.php');
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header("location:index.php");
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Responsive Page -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="home.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <title>Nawa Durga Fruit Center</title>
    </head>
    <body>
        <header>
            <!-- Top Header for logo and signup links -->
            <div class="top_header">
                <img class="logo" src="images\logo.png" alt="Nawa Durga Fruit Center Logo" height="100px" width="100px">
                <h1 class="shop_name">NAWA DURGA FRUIT CENTER</h1>
                <nav class="log_sign">
                    <ul>
                        <?php if(isset($_SESSION['username'])): ?>
                        <li class="lsr">Welcome <strong><?php echo $_SESSION['username']; ?></strong></li>
                        <li><a href="home.php?logout='1'" class="lsr">Logout</a></li>
                        <?php else: ?>
                        <li><a href="index.php" class="lsr">Login</a></li>
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
                    <li><a href="fresh.php">Fresh Fruits</a></li>
                    <li><a href="seasonal.php">Seasonal Picks</a></li>
                    <li><a href="dry.php">Fruit Hamper</a></li>
                </ul>
            </nav>
            <div class="toggle-menu"><i class="fa fa-bars" aria-hidden="true"></i></div>
        </header>
        </br>
        <!-- Image Carousel -->
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="images\fruit1.png" style="width:100%" alt="Fresh Apples">
            </div>
            <div class="mySlides fade">
                <img src="images\fruit2.png" style="width:100%" alt="Bananas">
            </div>
            <div class="mySlides fade">
                <img src="images\fruit3.png" style="width:100%" alt="Oranges">
            </div>
            <div class="mySlides fade">
                <img src="images\fruit4.png" style="width:100%" alt="Seasonal Mangoes">
            </div>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span>
        </div>
        <!-- Flip links -->
        <div class="flips s-12 s12">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="images\freshapple.png" alt="Apples" style="width:300px;height:300px;">
                    </div>
                    <div class="flip-card-back">
                        <a class="page-link" href="#Apples"></br>Crunchy apples at the best price. Free delivery on bulk orders!</a>
                    </div>
                </div>
            </div>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="images\banana.png" alt="Bananas" style="width:300px;height:300px;">
                    </div>
                    <div class="flip-card-back">
                        <a class="page-link" href="#Bananas"></br>Fresh bananas straight from the farm.</a>
                    </div>
                </div>
            </div>
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="images\fruitbasket.png" alt="Fruit Hamper" style="width:300px;height:300px;">
                    </div>
                    <div class="flip-card-back">
                        <a class="page-link" href="#fruithamper"></br>Freshly packed fruit hamper to nourish your body and brighten your day.</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer containing links -->
        <footer>
            <div class="foot-logo">
                <img src="images\logo.png" alt="Nawa Durga Fruit Center footer logo" height="50px" width="50px">
                <h3>Nawa Durga Fruit Center</h3>
            </div>
            <article class="link-list">
                <ul>
                    <li><a href="about.html" class="divi">About</a></li>
                    <li><a href="contact.html" class="divi">Contact Us</a></li>
                    <li><a href="privacy.html" class="no-divi">Privacy Policy</a></li>
                </ul>
            </article>
            <article class="copyr">
                &copy; 2025 Nawa Durga Fruit Center
            </article>
        </footer>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script>
            var slideIndex = 0;
            showSlides();
            function showSlides() {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                }
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}    
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";  
                dots[slideIndex-1].className += " active";
                setTimeout(showSlides, 2500); // Change image every 2.5 seconds
            }
        </script>
    </body>
</html>
