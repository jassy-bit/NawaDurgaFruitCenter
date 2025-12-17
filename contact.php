<?php
// Simple form handling (no database, just basic structure)
// You can extend this later as needed.

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = trim($_POST["name"] ?? "");
    $email   = trim($_POST["email"] ?? "");
    $subject = trim($_POST["subject"] ?? "");
    $message = trim($_POST["message"] ?? "");

    if ($name === "" || $email === "" || $message === "") {
        $error_message = "Please fill in all required fields.";
    } else {
        // Here you could send email or store in DB.
        // mail(...); or insert into database

        $success_message = "Thank you for contacting us. We will get back to you soon.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nawa Durga Fruit Center | Contact Us</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="nav.css">
</head>
<body>
    <!-- Header -->
     <?php include('nav.php') ?>

    <!-- Main contact section -->
    <main class="page-wrapper">
        <section class="contact-hero">
            <div class="contact-hero-text">
                <h2>Contact Us</h2>
                <p>
                    Have questions about our fresh, local, and seasonal fruits? 
                    Reach out to us and we’ll respond as soon as possible.
                </p>
            </div>
        </section>

        <section class="contact-section">
            <div class="contact-container">
                <div class="contact-info">
                    <h3>Get in touch</h3>
                    <p>
                        Visit our shop in person or send us a message using the form. 
                        We’re happy to help you choose the freshest fruits for your family and business.
                    </p>

                    <div class="info-item">
                        <h4>Address</h4>
                        <p>Sabji Mandi, Bharatpur, Nepal</p>
                    </div>

                    <div class="info-item">
                        <h4>Phone</h4>
                        <p>+977-9814234729</p>
                    </div>

                    <div class="info-item">
                        <h4>Email</h4>
                        <p>info@nawadurgafruitcenter.com</p>
                    </div>

                    <div class="info-item">
                        <h4>Opening Hours</h4>
                        <p>Sun – Fri: 6:00 AM – 8:00 PM</p>
                        <p>Saturday: 7:00 AM – 6:00 PM</p>
                    </div>
                </div>

                <div class="contact-form-card">
                    <h3>Send us a message</h3>

                    <?php if ($error_message !== ""): ?>
                        <div class="alert alert-error">
                            <?php echo htmlspecialchars($error_message); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($success_message !== ""): ?>
                        <div class="alert alert-success">
                            <?php echo htmlspecialchars($success_message); ?>
                        </div>
                    <?php endif; ?>

                    <form action="contact.php" method="POST" class="contact-form">
                        <div class="form-group">
                            <label for="name">Full Name<span>*</span></label>
                            <input type="text" id="name" name="name" 
                                   placeholder="Enter your full name" 
                                   value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address<span>*</span></label>
                            <input type="email" id="email" name="email" 
                                   placeholder="Enter your email address"
                                   value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" 
                                   placeholder="What is this about?"
                                   value="<?php echo isset($subject) ? htmlspecialchars($subject) : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="message">Message<span>*</span></label>
                            <textarea id="message" name="message" rows="5" 
                                      placeholder="Write your message here..."><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea>
                        </div>

                        <button type="submit" class="btn btn-filled btn-full">Send Message</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="main-footer">
        <p>&copy; <?php echo date("Y"); ?> Nawa Durga Fruit Center. All rights reserved.</p>
    </footer>
</body>
</html>
