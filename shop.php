<?php
session_start();

// ✅ Database connection
$conn = mysqli_connect("localhost", "root", "", "shop_db");

// ✅ Initialize cart if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// ✅ Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_cart'])) {

    $product_id = $_POST['product_id'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];

    $_SESSION['cart'][] = [
        'product_id' => $product_id,
        'qty' => $qty,
        'price' => $price
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nawa Durga Fruit Center - Shop</title>
    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="nav.css">
</head>
<body>

<?php include('nav.php'); ?>

<div class="shop-actions">
    <input type="text" placeholder="Search products..." class="search-bar">
    <a href="cart.php" class="cart-button">
        🛒View Cart
    </a>
</div>

<section class="product-grid">
    <?php
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <form method='POST' action='shop.php' class='product-card'>

            <img src='{$row["image_url"]}' alt='{$row["name"]}' class='product-img'>
            <h2>{$row["name"]}</h2>
            <p class='price'>Rs. {$row["price"]}</p>
            <p class='delivery'>Cash on Delivery</p>
            <p class='sold'>Sold</p>

            <input type='hidden' name='product_id' value='{$row["product_id"]}'>
            <input type='hidden' name='price' value='{$row["price"]}'>

            <div class='quantity-selector'>
                <button type='button' onclick='decrease(this)'>−</button>
                <input type='number' name='qty' value='1' min='1'>
                <button type='button' onclick='increase(this)'>+</button>
            </div>

            <button type='submit' name='add_cart' class='cart-btn'>
                Add to Cart
            </button>

        </form>
        ";
    }
    ?>
</section>

<script>
function increase(btn) {
    let input = btn.previousElementSibling;
    input.value = parseInt(input.value) + 1;
}

function decrease(btn) {
    let input = btn.nextElementSibling;
    if (input.value > 1) {
        input.value = parseInt(input.value) - 1;
    }
}
</script>

</body>
</html>
