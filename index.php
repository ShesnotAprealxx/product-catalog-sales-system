<?php
session_start();
require "db_batchh6_pcss.php";

$result = $conn->query("SELECT * FROM products");

while ($product = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>{$product['name']}</h3>";
    echo "<p>{$product['description']}</p>";
    echo "<p>\${$product['price']}</p>";
    echo "<p>Stock: {$product['stock']}</p>";
    echo "<a href='add_to_cart.php?id={$product['id']}'>Add to Cart</a>";
    echo "</div>";
}
?>