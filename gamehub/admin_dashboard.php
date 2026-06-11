<?php

session_start();

if(!isset($_SESSION['user'])){

    header("Location: login.php");

    exit();
}

if($_SESSION['role'] != 'admin'){

    header("Location: dashboard.php");

    exit();
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Dashboard</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

<div class="logo-brand">
👑 Admin Panel
</div>

<div class="nav-links">

<a href="index.php">Home</a>

<a href="add_game.php">Manage Products</a>

<a href="login.php">Logout</a>

</div>

</div>

<div class="dashboard">

<h1>

Welcome Admin <?php echo $_SESSION['user']; ?> 🔥

</h1>

<p class="subtitle">

Manage GameHub products and gaming inventory.

</p>

<div class="games-grid">

<div class="game-card">

<img src="https://images.unsplash.com/photo-1511512578047-dfb367046420?q=80&w=1971&auto=format&fit=crop">

<div class="game-info">

<h3>Add Gaming Equipment</h3>

<p>Manage store inventory</p>

<div class="price">
ADMIN
</div>

</div>

</div>

<div class="game-card">

<img src="https://images.unsplash.com/photo-1547394765-185e1e68f34e?q=80&w=1974&auto=format&fit=crop">

<div class="game-info">

<h3>Manage Users</h3>

<p>Control registered accounts</p>

<div class="price">
ADMIN
</div>

</div>

</div>

<div class="game-card">

<img src="https://images.unsplash.com/photo-1493711662062-fa541adb3fc8?q=80&w=2070&auto=format&fit=crop">

<div class="game-info">

<h3>Sales Analytics</h3>

<p>Monitor platform growth</p>

<div class="price">
ADMIN
</div>

</div>

</div>

</div>

</div>

</body>
</html>