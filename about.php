<?php
    $shop_name = "Nawa Durga Fruit Center";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us | <?php echo $shop_name; ?></title>
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="nav.css">
</head>
<body>

    <!-- HEADER -->
<?php include('nav.php') ?>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-text">
            <small>About us</small>
            <h2>We bring <span>farm-fresh fruits</span> closer to your family.</h2>
            <p>
                Nawa Durga Fruit Center is a neighborhood fruit store dedicated to
                delivering fresh, seasonal, and handpicked fruits every single day.
            </p>
            <div class="hero-highlight">
                <div class="hero-pill">Daily-fresh apples</div>
                <div class="hero-pill">Locally sourced</div>
                <div class="hero-pill">Family-run service</div>
            </div>
        </div>

        <div class="hero-image">
            <div class="hero-card">
                <h3><?php echo $shop_name; ?></h3>
                <span>Serving your health, one fruit at a time.</span>
                <div class="hero-stats">
                    <div class="stat"><strong>3+ yrs</strong> in business</div>
                    <div class="stat"><strong>30+ items</strong> available</div>
                    <div class="stat"><strong>7 days</strong> fresh arrivals</div>
                </div>
            </div>
            <div class="hero-badge">Handpicked • Washed • Ready</div>
        </div>
    </section>

    <!-- ABOUT CONTENT -->
    <section class="about-sections">
        <div class="about-block">
            <h3>Our story</h3>
            <p>
                We began as a small corner shop and grew into a trusted fruit center.
                We focus on freshness, hygiene, and fair pricing.
            </p>
            <ul class="about-list">
                <li>Quality first</li>
                <li>Honest pricing</li>
                <li>Clean handling</li>
            </ul>
            <div class="timeline">
                <div class="timeline-item"><span>Year 1–3</span><p>Built trust locally</p></div>
                <div class="timeline-item"><span>Year 4–7</span><p>Expanded variety</p></div>
                <div class="timeline-item"><span>Today</span><p>Digital catalog & pre-orders</p></div>
            </div>
        </div>

        <div class="about-block">
            <h3>Our values</h3>
            <div class="core-values">
                <div class="value-card"><h4>Freshness</h4><p>Regular restocking</p></div>
                <div class="value-card"><h4>Trust</h4><p>Fair display & weighing</p></div>
                <div class="value-card"><h4>Care</h4><p>Handled with love</p></div>
                <div class="value-card"><h4>Community</h4><p>Support local farmers</p></div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div>
            <h3>Want to know what’s fresh today?</h3>
            <p>Visit our Shop page or create an account to save favorites.</p>
        </div>
        <div class="cta-buttons">
            <button class="btn-primary" onclick="window.location.href='shop.php'">Browse Fruits</button>
            <button class="btn-secondary" onclick="window.location.href='sign-up.php'">Create Account</button>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div>© <?php echo date("Y"); ?> <?php echo $shop_name; ?>. All rights reserved.</div>
        <div>
            <span>Quick links:</span>
            <a href="shop.php">Shop</a>
            <a href="contact.php">Contact</a>
        </div>
    </footer>

</body>
</html>
