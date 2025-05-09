<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$total = 0;
$order_items = [];

foreach ($_SESSION['cart'] as $product_id => $quantity) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();

    $item_total = $product['price'] * $quantity;
    $total += $item_total;
    $order_items[] = [
        'product_id' => $product_id,
        'quantity' => $quantity,
        'price' => $product['price']
    ];
}

// Insert order
$stmt = $conn->prepare("INSERT INTO orders (user_id, total) VALUES (?, ?)");
$stmt->bind_param("id", $user_id, $total);

::contentReference[oaicite:0]{index=0}
 
