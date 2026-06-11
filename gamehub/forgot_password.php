<?php

include 'db.php';

$message = "";

if(isset($_POST['reset'])){

    $email = $_POST['email'];
    $newPassword = password_hash(
        $_POST['new_password'],
        PASSWORD_DEFAULT
    );

    $stmt = $conn->prepare(
        "UPDATE users SET password=?
         WHERE email=?"
    );

    $stmt->bind_param(
        "ss",
        $newPassword,
        $email
    );

    if($stmt->execute()){

        $message = "Password Updated Successfully";

    } else {

        $message = "Error Updating Password";

    }
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Forgot Password</title>

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
🔒
</div>

<h1>Reset Password</h1>

<p class="subtitle">

Create a new password for your account.

</p>

<?php

if($message != ""){

    echo "<div class='success-box'>$message</div>";

}

?>

<form method="POST">

<div class="input-group">

<label>Email</label>

<input type="email"
       name="email"
       placeholder="Enter your email"
       required>

</div>

<div class="input-group">

<label>New Password</label>

<input type="password"
       name="new_password"
       placeholder="Enter new password"
       required>

</div>

<button name="reset">

RESET PASSWORD

</button>

</form>

<div class="link">

<a href="login.php">
Back To Login
</a>

</div>

</div>

</section>

</body>
</html>