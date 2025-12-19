<?php
session_start();

// ✅ Database connection
$conn = mysqli_connect("localhost", "root", "", "shop_db");

// ✅ Initialize cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// ✅ Handle Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_cart'])) {
    $_SESSION['cart'][] = [
        'product_id' => $_POST['product_id'],
        'qty' => $_POST['qty'],
        'price' => $_POST['price']
    ];
}

// ✅ Search logic
$search = "";
$whereClause = "";

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $whereClause = "WHERE name LIKE '%$search%'";
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

<!-- 🔍 Search + Cart -->
<div class="shop-actions">
    <form method="GET" action="shop.php" class="search-form">
        <input 
            type="text" 
            name="search" 
            placeholder="Search products..." 
            value="<?php echo htmlspecialchars($search); ?>"
            class="search-bar"
        >
        <button type="submit" class="search-btn">Search</button>
    </form>

    <a href="cart.php" class="cart-button">🛒 View Cart</a>
</div>

<!-- 🛍 Products -->
<section class="product-grid">
<?php
$sql = "SELECT * FROM products $whereClause";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form method="POST" action="shop.php" class="product-card">
            <img src="<?php echo $row['image_url']; ?>" class="product-img">
            <h2><?php echo $row['name']; ?></h2>
            <p class="price">Rs. <?php echo $row['price']; ?></p>
            <p class="delivery">Cash on Delivery</p>
            <p class="sold">Sold</p>

            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">

            <div class="quantity-selector">
                <button type="button" onclick="decrease(this)">−</button>
                <input type="number" name="qty" value="1" min="1">
                <button type="button" onclick="increase(this)">+</button>
            </div>

            <button type="submit" name="add_cart" class="cart-btn">
                Add to Cart
            </button>
        </form>
        <?php
    }
} else {
    echo "<p class='no-result'>No products found.</p>";
}
?>
</section>

<script>
function increase(btn) {
    btn.previousElementSibling.value++;
}
function decrease(btn) {
    let input = btn.nextElementSibling;
    if (input.value > 1) input.value--;
}
</script>

</body>
</html>
