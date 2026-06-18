<?php

include 'db.php';

$id = $_GET['id'];

$result = $conn->query(
"SELECT * FROM games WHERE id=$id"
);

$game = $result->fetch_assoc();

if(isset($_POST['update'])){

    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $stmt = $conn->prepare(
    "UPDATE games
     SET title=?,
         genre=?,
         price=?,
         image=?
     WHERE id=?"
    );

    $stmt->bind_param(
    "ssdsi",
    $title,
    $genre,
    $price,
    $image,
    $id
    );

    $stmt->execute();

    header("Location: admin_games.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Product</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h1>Edit Product 🎮</h1>

<form method="POST">

<input
type="text"
name="title"
value="<?php echo $game['title']; ?>"
required>

<br><br>

<input
type="text"
name="genre"
value="<?php echo $game['genre']; ?>"
required>

<br><br>

<input
type="number"
name="price"
value="<?php echo $game['price']; ?>"
required>

<br><br>

<input
type="text"
name="image"
value="<?php echo $game['image']; ?>"
required>

<br><br>

<button
type="submit"
name="update">

Update Product

</button>

</form>

</body>
</html>