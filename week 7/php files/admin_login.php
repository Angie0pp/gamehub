<?php
session_start();
include 'db.php';

$error = "";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows>0){

        $user=$result->fetch_assoc();

        if(password_verify($password,$user['password'])){

            if($user['role']=="admin"){

                $_SESSION['user']=$user['username'];
                $_SESSION['role']="admin";

                header("Location: admin_dashboard.php");
                exit();

            }else{

                $error="Access Denied! You are not an administrator.";

            }

        }else{

            $error="Incorrect Password.";

        }

    }else{

        $error="Account not found.";

    }

}
?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Login</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h2>Administrator Login</h2>

<?php if($error!=""){ ?>

<p style="color:red;"><?php echo $error; ?></p>

<?php } ?>

<form method="POST">

<input type="email" name="email" placeholder="Admin Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

</form>

</div>

</body>
</html>