<?php

session_start();
include 'db.php';

$username = $_SESSION['user'];

$query = $conn->query(
"SELECT cart.id,
        games.title,
        games.price
 FROM cart
 JOIN games
 ON cart.product_id = games.id
 WHERE cart.username='$username'"
);

$total = 0;

?>

<!DOCTYPE html>
<html>

<head>

<title>Shopping Cart</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1>Your Cart 🛒</h1>

<table border="1" cellpadding="10">

<tr>

<th>Product</th>

<th>Price</th>

</tr>

<?php while($row = $query->fetch_assoc()){ ?>

<tr>

<td>
<?php echo $row['title']; ?>
</td>

<td>

$
<?php echo $row['price']; ?>

</td>

</tr>

<?php

$total += $row['price'];

} ?>

</table>

<h2>

Total: $

<?php echo $total; ?>

</h2>

<a href="checkout.php">

<button>

Proceed To Checkout

</button>

</a>

</body>
</html>