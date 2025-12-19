<?php
session_start();
include("db.php");

$msg = "";

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);
    $confirm = md5($_POST['confirm_password']);

    // Check if admin already exists
    $check = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username'");

    if (mysqli_num_rows($check) > 0) {
        $msg = "Admin already exists!";
    } elseif ($password !== $confirm) {
        $msg = "Passwords do not match!";
    } else {
        $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
        mysqli_query($conn, $sql);
        $msg = "Admin registered successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Register</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>

<div class="login-box">
    <h2>Admin Register</h2>

    <?php if ($msg) echo "<p class='error'>$msg</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Admin Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button name="register">Register</button>
    </form>

    <p style="margin-top:10px;">
        Already admin? <a href="admin_login.php">Login</a>
    </p>
</div>

</body>
</html>
