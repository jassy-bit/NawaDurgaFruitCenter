<?php
session_start();

// ✅ Connect to database
$conn = mysqli_connect("localhost", "root", "", "shop_db");

// ✅ Get cart from session
$cart = $_SESSION['cart'] ?? [];

// ✅ Clean malformed items (optional but recommended)
$cart = array_filter($cart, function($item) {
    return isset($item['product_id'], $item['qty'], $item['price']);
});

// ✅ Handle checkout
if (isset($_POST['checkout'])) {
    if (empty($cart)) {
        echo "<script>alert('Your cart is empty');</script>";
    } else {
        // Insert into orders table
        $order_sql = "INSERT INTO orders (order_date, total_amount) VALUES (NOW(), 0)";
        mysqli_query($conn, $order_sql);
        $order_id = mysqli_insert_id($conn);

        $total_amount = 0;

        foreach ($cart as $item) {
            $product_id = $item['product_id'];
            $qty = $item['qty'];
            $price = $item['price'];
            $subtotal = $qty * $price;
            $total_amount += $subtotal;

            $item_sql = "INSERT INTO order_items (order_id, product_id, quantity, price)
                         VALUES ('$order_id', '$product_id', '$qty', '$price')";
            mysqli_query($conn, $item_sql);
        }

        // Update total amount
        mysqli_query($conn, "UPDATE orders SET total_amount='$total_amount' WHERE order_id='$order_id'");

        // Clear cart
        $_SESSION['cart'] = [];

        echo "<script>alert('Order placed successfully!'); window.location='shop.php';</script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="cart.css">
</head>
<body>

<header>
    <h1>Your Cart🛒</h1>
    <a href="shop.php" class="cart-btn">Back to Shop</a>
</header>

<div class="cart-container">
<?php if (empty($cart)) { ?>
    <p>Your cart is empty</p>
<?php } else { ?>
    <?php
    $total = 0;

    foreach ($cart as $item) {
        $product_id = $item['product_id'];
        $qty = $item['qty'];
        $price = $item['price'];
        $subtotal = $qty * $price;

        // ✅ Fetch product name from DB
        $p = mysqli_query($conn, "SELECT name FROM products WHERE product_id='$product_id'");
        $product = mysqli_fetch_assoc($p);
        $name = $product['name'] ?? 'Unknown Product';

        $total += $subtotal;
    ?>
    <div class="cart-item">
        <span><?= htmlspecialchars($name); ?> (x<?= $qty; ?>)</span>
        <span>Rs. <?= $subtotal; ?></span>
    </div>
    <?php } ?>
    <h3>Total: Rs. <?= $total; ?></h3>

    <form method="POST">
        <button type="submit" name="checkout" class="checkout-btn">Checkout</button>
    </form>
<?php } ?>
</div>

</body>
</html>
