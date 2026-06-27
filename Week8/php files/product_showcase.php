<?php
session_start();

include 'db.php';

$result = $conn->query("SELECT * FROM games");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>GameHub Product Showcase</title>

<link rel="stylesheet" href="product_showcase.css">

</head>

<body>

<header>

<h1>🎮 GameHub Product Showcase</h1>

<p>Explore our latest gaming products.</p>

</header>

<div class="products">

<?php while($row = $result->fetch_assoc()){ ?>

<div class="card">

<img src="<?php echo htmlspecialchars($row['image']); ?>" alt="Product Image">

<div class="content">

<h2><?php echo htmlspecialchars($row['title']); ?></h2>

<p><?php echo htmlspecialchars($row['genre']); ?></p>

<h3>USD <?php echo number_format($row['price']); ?></h3>

<a href="add_to_cart.php?id=<?php echo $row['id']; ?>">

<button>🛒 Add to Cart</button>

</a>

</div>

</div>

<?php } ?>

</div>

<div class="back">

<a href="dashboard.php">← Back to Dashboard</a>

</div>

</body>

</html>