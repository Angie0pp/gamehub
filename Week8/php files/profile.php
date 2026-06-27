<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>GameHub Profile</title>

<link rel="stylesheet" href="profile.css">

</head>

<body>

<div class="container">

<div class="profile-card">

<div class="profile-image">

<img src="https://i.pravatar.cc/300" alt="Profile Picture">

</div>

<div class="profile-info">

<h1><?php echo htmlspecialchars($username); ?></h1>

<h3>GameHub Member</h3>

<p>

Welcome to my GameHub profile. I enjoy exploring the latest gaming equipment,
video games and accessories available on the platform.

</p>

<div class="contact">

<p><strong>Email:</strong> user@gamehub.com</p>

<p><strong>Phone:</strong> +254 700 123 456</p>

<p><strong>Location:</strong> Nairobi, Kenya</p>

</div>

<a href="dashboard.php" class="btn">

← Back to Dashboard

</a>

</div>

</div>

</div>

</body>

</html>