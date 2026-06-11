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

$stmt = $conn->prepare(
"INSERT INTO orders(
 username,
 total_amount,
 payment_status
)
VALUES(
 ?, ?, 'Paid'
)"
);

$stmt->bind_param(
"sd",
$username,
$total
);

$stmt->execute();

$conn->query(
"DELETE FROM cart
 WHERE username='$username'"
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Payment Success</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1>

✅ Payment Successful

</h1>

<h2>

Thank you for shopping with GameHub

</h2>

<a href="dashboard.php">

<button>

Back To Store

</button>

</a>

</body>
</html>