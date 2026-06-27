<?php

session_start();
include 'db.php';

$error = "";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE email=?"
    );

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){

            session_regenerate_id(true);

          $_SESSION['user_id'] = $user['id'];

$_SESSION['user'] = $user['username'];

$_SESSION['role'] = $user['role'];

if($user['role'] == 'admin'){

    header("Location: admin_dashboard.php");

} else {

    header("Location: dashboard.php");

}

exit();

        } else {

            $error = "Incorrect Password";

        }

    } else {

        $error = "No Account Found";

    }
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>GameHub Login</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

    <div class="logo-brand">
        🎮 GameHub
    </div>

</div>

<section class="hero">

<div class="container">

<div class="logo">
🎮
</div>

<h1>Welcome Back</h1>

<p class="subtitle">
Login into your gaming account
</p>

<?php

if($error != ""){

    echo "<div class='success-box'>$error</div>";

}

?>

<form method="POST">

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
       placeholder="Enter password"
       required>

</div>

<div style="margin-bottom:15px;">

<input type="checkbox"
       name="remember"
       style="width:auto;">

Remember Me

</div>

<button name="login">

LOGIN

</button>

</form>

<div class="link">
<a href="forgot_password.php">
Forgot Password?
</a>
</div>

<div class="link">

Don't have an account?

<a href="register.php">
Register
</a>

</div>

</div>

</section>

</body>
</html>