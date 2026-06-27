<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: admin_login.php");
    exit();
}

if($_SESSION['role'] != "admin"){
    header("Location: dashboard.php");
    exit();
}

include 'db.php';

$totalGames = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM games"));
$totalUsers = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));

$totalOrders = 0;
if(mysqli_query($conn,"SHOW TABLES LIKE 'orders'")->num_rows > 0){
    $totalOrders = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orders"));
}
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<title>GameHub Admin Dashboard</title>

<link rel="stylesheet" href="style.css">

<style>

body{
    margin:0;
    font-family:Arial, Helvetica, sans-serif;
    background:#111827;
    color:white;
}

.sidebar{

    width:250px;
    height:100vh;

    position:fixed;

    background:#1f2937;

    padding-top:30px;

}

.sidebar h2{

    text-align:center;

    color:#8b5cf6;

}

.sidebar a{

    display:block;

    color:white;

    text-decoration:none;

    padding:18px 25px;

    transition:.3s;

}

.sidebar a:hover{

    background:#8b5cf6;

}

.main{

    margin-left:250px;

    padding:40px;

}

.cards{

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));

    gap:25px;

}

.card{

    background:#1f2937;

    padding:30px;

    border-radius:15px;

    text-align:center;

}

.card h3{

    font-size:20px;

}

.number{

    font-size:40px;

    color:#8b5cf6;

    margin-top:15px;

}

.actions{

    margin-top:40px;

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));

    gap:20px;

}

.action{

    background:#1f2937;

    padding:25px;

    border-radius:15px;

    text-align:center;

}

.action a{

    text-decoration:none;

    color:white;

    background:#8b5cf6;

    padding:12px 20px;

    display:inline-block;

    border-radius:8px;

    margin-top:15px;

}

.action a:hover{

    background:#6d28d9;

}

</style>

</head>

<body>

<div class="sidebar">

<h2>🎮 GameHub</h2>

<a href="admin_dashboard.php">🏠 Dashboard</a>

<a href="admin_games.php">🎮 Manage Games</a>

<a href="users.php">👥 View Users</a>

<a href="orders.php">📦 Orders</a>

<a href="payments.php">💳 Payments</a>

<a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

<h1>

Welcome Admin,
<?php echo htmlspecialchars($_SESSION['user']); ?> 👑

</h1>

<p>

Manage your GameHub platform from one place.

</p>

<br>

<div class="cards">

<div class="card">

<h3>Total Games</h3>

<div class="number">

<?php echo $totalGames; ?>

</div>

</div>

<div class="card">

<h3>Total Users</h3>

<div class="number">

<?php echo $totalUsers; ?>

</div>

</div>

<div class="card">

<h3>Total Orders</h3>

<div class="number">

<?php echo $totalOrders; ?>

</div>

</div>

</div>

<div class="actions">

<div class="action">

<h3>🎮 Manage Games</h3>

<p>Add, edit and delete products.</p>

<a href="admin_games.php">

Open

</a>

</div>

<div class="action">

<h3>👥 Manage Users</h3>

<p>View registered customers.</p>

<a href="users.php">

Open

</a>

</div>

<div class="action">

<h3>📦 Orders</h3>

<p>Monitor customer orders.</p>

<a href="orders.php">

Open

</a>

</div>

<div class="action">

<h3>💳 Payments</h3>

<p>Track successful payments.</p>

<a href="payments.php">

Open

</a>

</div>

</div>

</div>

</body>

</html>