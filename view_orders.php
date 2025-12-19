<?php
session_start();
$conn = mysqli_connect("localhost","root","","shop_db");
$sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql);
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Orders</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>

<div class="dashboard">
    <h1>Orders</h1>

    <div class="table-box">
        <table>
            <tr>
                <th>Order_ID</th>
                <th>Order_Date</th>
                <th>Total_Amount</th>
                <th>Status</th>
            </tr>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <tr>
                <td><?php echo $row["order_id"] ?></td>
                <td><?php echo $row["order_date"] ?></td>
                <td><?php echo $row["total_amount"] ?></td>
                <td><?php echo $row["status"] ?></td>
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