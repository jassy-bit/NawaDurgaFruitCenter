<?php
session_start();
$conn = mysqli_connect("localhost","root","","shop_db");
$sql = "SELECT * FROM customers";
$result = mysqli_query($conn, $sql);
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>

<div class="dashboard">
    <h1>Users</h1>

    <div class="table-box">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
               <td><?php echo $row["customer_id"] ?></td>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["phone"] ?></td>
                <td><?php echo $row["email"] ?></td>
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
