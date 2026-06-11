<?php

session_start();
include 'db.php';

$username = $_SESSION['user'];

$result = $conn->query(
"SELECT SUM(games.price) AS total
 FROM cart
 JOIN games
 ON cart.product_id = games.id
 WHERE cart.username='$username'"
);

$row = $result->fetch_assoc();

$total = $row['total'];

?>

<!DOCTYPE html>
<html>

<head>

<title>Checkout</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1>Checkout 💳</h1>

<h2>

Amount To Pay:

$<?php echo $total; ?>

</h2>

<a href="payment_success.php">

<button>

Pay Now

</button>

</a>

</body>
</html>