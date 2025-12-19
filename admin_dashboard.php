<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>

<div class="dashboard">
    <h1>Welcome Admin</h1>
    <p>You are logged in as <b><?php echo $_SESSION['admin']; ?></b></p>

   <div class="cards">
    <a href="manage_products.php" class="card">Manage Products</a>
    <a href="view_orders.php" class="card">View Orders</a>
    <a href="customers.php" class="card">Customers</a>
</div>


    <a href="admin_logout.php" class="logout">Logout</a>
</div>

</body>
</html>
