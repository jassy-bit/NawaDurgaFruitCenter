<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = 'Jasmine';
}

$username = htmlspecialchars($_SESSION['username']);
$email = "jasmine@example.com";    // Demo data – replace with DB values
$member_since = "March 2024";      // Demo data
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Account | Nawa Durga Fruit Center</title>
    <link rel="stylesheet" href="account.css">
     <link rel="stylesheet" href="nav.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body class="account-body">

<?php include 'header.php'; ?>

<main class="account-wrapper">
    <section class="account-hero">
        <div class="account-hero-content">
            <h2>My Account</h2>
            <p>Manage your profile, orders, and preferences in one place.</p>
        </div>
    </section>

    <section class="account-layout">
        <aside class="account-sidebar">
            <div class="account-profile-card">
                <div class="avatar-circle">
                    <span><?php echo strtoupper(substr($username, 0, 1)); ?></span>
                </div>
                <h3><?php echo $username; ?></h3>
                <p class="account-email"><?php echo $email; ?></p>
                <p class="member-since">Member since <?php echo $member_since; ?></p>
            </div>

            <nav class="account-menu">
                <button class="account-menu-item active">Profile Overview</button>
                <button class="account-menu-item">Orders</button>
                <button class="account-menu-item">Saved Addresses</button>
                <button class="account-menu-item">Payment Methods</button>
                <button class="account-menu-item">Security</button>
            </nav>
        </aside>

        <section class="account-main">
            <div class="account-card">
                <h3>Profile details</h3>
                <p class="account-subtitle">Update your information to keep your account secure and up to date.</p>

                <form class="account-form" action="#" method="post">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="full_name">Full name</label>
                            <input type="text" id="full_name" name="full_name"
                                   value="<?php echo $username; ?>" placeholder="Enter your full name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email"
                                   value="<?php echo $email; ?>" placeholder="Enter your email">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="text" id="phone" name="phone" placeholder="Enter your phone number">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" placeholder="Enter your city">
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="address">Delivery address</label>
                        <textarea id="address" name="address" rows="3"
                                  placeholder="Enter your default delivery address"></textarea>
                    </div>

                    <div class="account-actions">
                        <button type="submit" class="btn btn-filled">Save changes</button>
                        <button type="reset" class="btn btn-outline">Cancel</button>
                    </div>
                </form>
            </div>

            <div class="account-card account-card-secondary">
                <h3>Security & login</h3>
                <p class="account-subtitle">Keep your account protected with strong security settings.</p>

                <div class="security-row">
                    <div class="security-item">
                        <h4>Password</h4>
                        <p>Update your password regularly to keep your account secure.</p>
                    </div>
                    <button class="btn btn-outline small-btn">Change password</button>
                </div>

                <div class="security-row">
                    <div class="security-item">
                        <h4>Two-factor authentication</h4>
                        <p>Add an extra layer of security to your account.</p>
                    </div>
                    <button class="btn btn-outline small-btn disabled">Coming soon</button>
                </div>
            </div>
        </section>
    </section>
</main>

<footer class="main-footer">
    <p>© <?php echo date('Y'); ?> Nawa Durga Fruit Center. All rights reserved.</p>
</footer>

</body>
</html>
