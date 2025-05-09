<?php
session_start();
require 'db.php';

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "Your cart is empty.";
    exit;
}

$total = 0;
foreach ($_SESSION['cart'] as $product_id => $quantity) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    $item_total = $product['price'] * $quantity;
    $total += $item_total;

    echo "<div>";
    echo "<h3>{$product['name']}</h3>";
    echo "<p>Quantity: $quantity</p>";
    echo "<p>Price: \${$product['price']}</p>";
    echo "<p>Total: \${$item_total}</p>";
    echo "</div>";
}

echo "<h3>Total: \${$total}</h3>";
?>
