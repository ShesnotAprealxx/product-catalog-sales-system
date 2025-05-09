<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$product_id = $_GET['id'];
$quantity = 1; // Default quantity

if (!isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] = $quantity;
} else {
    $_SESSION['cart'][$product_id] += $quantity;
}

header("Location: index.php");
?>
