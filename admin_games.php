<?php

include 'db.php';

if(isset($_POST['add_product'])){

    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $stmt = $conn->prepare(
        "INSERT INTO games(title, genre, price, image)
         VALUES(?,?,?,?)"
    );

    $stmt->bind_param(
        "ssds",
        $title,
        $genre,
        $price,
        $image
    );

    $stmt->execute();

    echo "<script>alert('Product Added Successfully!');</script>";
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>GameHub Admin Panel</title>

    <link rel="stylesheet" href="style.css">

    <style>

        body{
            padding:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        th,td{
            border:1px solid #ccc;
            padding:10px;
            text-align:center;
        }

        input{
            width:300px;
            padding:10px;
            margin:5px;
        }

        button{
            padding:10px 20px;
            cursor:pointer;
        }

        .edit-btn{
            text-decoration:none;
            padding:8px 15px;
            background:green;
            color:white;
            border-radius:5px;
        }

        .delete-btn{
            text-decoration:none;
            padding:8px 15px;
            background:red;
            color:white;
            border-radius:5px;
        }

    </style>

</head>

<body>

<h1>🎮 GameHub Admin Panel</h1>

<h2>Add New Product</h2>

<form method="POST">

    <input
    type="text"
    name="title"
    placeholder="Product Name"
    required>

    <br>

    <input
    type="text"
    name="genre"
    placeholder="Category"
    required>

    <br>

    <input
    type="number"
    name="price"
    placeholder="Price"
    required>

    <br>

    <input
    type="text"
    name="image"
    placeholder="Image URL"
    required>

    <br><br>

    <button
    type="submit"
    name="add_product">

    Add Product

    </button>

</form>

<hr>

<h2>Current Products</h2>

<table>

<tr>

<th>ID</th>
<th>Product</th>
<th>Category</th>
<th>Price</th>
<th>Image</th>
<th>Edit</th>
<th>Delete</th>

</tr>

<?php

$result = $conn->query(
"SELECT * FROM games"
);

while($row = $result->fetch_assoc()){

?>

<tr>

<td>
<?php echo $row['id']; ?>
</td>

<td>
<?php echo $row['title']; ?>
</td>

<td>
<?php echo $row['genre']; ?>
</td>

<td>
$<?php echo $row['price']; ?>
</td>

<td>

<img
src="<?php echo $row['image']; ?>"
width="100">

</td>

<td>

<a
class="edit-btn"
href="edit_game.php?id=<?php echo $row['id']; ?>">

Edit

</a>

</td>

<td>

<a
class="delete-btn"
href="delete_game.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this product?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>