<?php
session_start();
$conn = mysqli_connect("localhost","root","","shop_db");
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Products</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>

<div class="dashboard">
    <h1>Manage Products</h1>

    <div class="table-box">
        <table>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row["product_id"] ?></td>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["price"] ?></td>
                <td><?php echo $row["product_id"] ?></td>
            </tr>
            <?php 
}
             ?>
        </table>
    </div>

    <a href="admin_dashboard.php" class="logout">Back</a>
</div>

</body>
</html>
