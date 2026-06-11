<?php
include 'db.php';

if(isset($_POST['add'])){

    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "INSERT INTO games(title,genre,price,image)
            VALUES('$title','$genre','$price','$image')";

    if($conn->query($sql)){
        echo "Game Added";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Add New Game</h1>

<form method="POST">

<input type="text" name="title" placeholder="Game Title">

<input type="text" name="genre" placeholder="Genre">

<input type="number" name="price" placeholder="Price">

<input type="text" name="image" placeholder="Image URL">

<button name="add">Add Game</button>

</form>

</div>

</body>
</html>