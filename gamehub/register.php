<?php

session_start();

include 'db.php';

$message = "";
$error = "";

if(isset($_POST['register'])){

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if(strlen($password) < 8){

        $error = "Password must be at least 8 characters";

    } else {

        $check = $conn->prepare(
            "SELECT id FROM users WHERE email=?"
        );

        $check->bind_param("s", $email);

        $check->execute();

        $result = $check->get_result();

        if($result->num_rows > 0){

            $error = "Email already exists";

        } else {

            $hashedPassword = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $stmt = $conn->prepare(
                "INSERT INTO users(username,email,password)
                 VALUES(?,?,?)"
            );

            $stmt->bind_param(
                "sss",
                $username,
                $email,
                $hashedPassword
            );

            if($stmt->execute()){

                session_regenerate_id(true);

                $_SESSION['user'] = $username;

                header("Location: dashboard.php");

                exit();

            } else {

                $error = "Registration Failed";

            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>GameHub Register</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

    <div class="logo-brand">
        🎮 GameHub
    </div>

    <div class="nav-links">

        <a href="index.php">Home</a>

        <a href="login.php">Login</a>

    </div>

</div>

<section class="hero">

<div class="container">

<div class="logo">
🔥
</div>

<h1>Create Account</h1>

<p class="subtitle">

Enter the next generation gaming marketplace.

</p>

<?php

if($error != ""){

    echo "<div class='success-box'>$error</div>";

}

?>

<form method="POST">

<div class="input-group">

<label>Username</label>

<input type="text"
       name="username"
       placeholder="Enter username"
       required>

</div>

<div class="input-group">

<label>Email</label>

<input type="email"
       name="email"
       placeholder="Enter email"
       required>

</div>

<div class="input-group">

<label>Password</label>

<input type="password"
       name="password"
       placeholder="Minimum 8 characters"
       required>

</div>

<button name="register">

CREATE ACCOUNT

</button>

</form>

<div class="link">

Already have an account?

<a href="login.php">
Login
</a>

</div>

</div>

</section>

</body>
</html>