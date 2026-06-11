<?php

session_start();
include 'db.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$product_id = $_GET['id'];

$username = $_SESSION['user'];

$stmt = $conn->prepare(
    "INSERT INTO cart(username, product_id, quantity)
     VALUES(?,?,1)"
);

$stmt->bind_param(
    "si",
    $username,
    $product_id
);

$stmt->execute();

header("Location: cart.php");
exit();

?>