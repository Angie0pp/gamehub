<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$games = $conn->query("SELECT * FROM games");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>GameHub | User Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

    <div class="logo-brand">
        🎮 GameHub
    </div>

    <div class="nav-links">

        <a href="dashboard.php">Home</a>

        <a href="cart.php">🛒 Cart</a>

        <a href="orders.php">📦 My Orders</a>

        <span style="color:white;">
            Welcome,
            <strong><?php echo htmlspecialchars($_SESSION['user']); ?></strong>
        </span>

        <a href="logout.php">Logout</a>

    </div>

</div>

<section class="hero">

    <div class="container">

        <h1>Welcome to GameHub 🎮</h1>

        <p class="subtitle">

            Browse our latest gaming products and add them to your cart.

        </p>

    </div>

</section>

<div class="games-grid">

<?php while($row = $games->fetch_assoc()){ ?>

<div class="game-card">

<img src="<?php echo htmlspecialchars($row['image']); ?>">

<div class="game-info">

<h3><?php echo htmlspecialchars($row['title']); ?></h3>

<p><?php echo htmlspecialchars($row['genre']); ?></p>

<div class="price">

KES <?php echo number_format($row['price']); ?>

</div>

<a href="add_to_cart.php?id=<?php echo $row['id']; ?>">

<button>

🛒 Add To Cart

</button>

</a>

</div>

</div>

<?php } ?>

</div>

</body>

</html>