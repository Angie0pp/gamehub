<?php

include 'auth.php';
include 'db.php';

$games = $conn->query("SELECT * FROM games");

?>

<!DOCTYPE html>
<html>

<head>

    <title>GameHub Store</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="navbar">

        <div class="logo-brand">
            🎮 GameHub
        </div>

        <div class="nav-links">

            <a href="dashboard.php">Store</a>

            <a href="cart.php">🛒 Cart</a>

            <a href="logout.php">Logout</a>

        </div>

    </div>

    <section class="hero">

        <div class="container">

            <h1>
                Welcome,
                <?php echo $_SESSION['user']; ?>
                🎮
            </h1>

            <p class="subtitle">
                Explore the latest gaming equipment and accessories.
            </p>

        </div>

    </section>

    <div class="games-grid">

        <?php while($row = $games->fetch_assoc()) { ?>

            <div class="game-card">

                <img
                    src="<?php echo $row['image']; ?>"
                    alt="<?php echo $row['title']; ?>">

                <div class="game-info">

                    <h3>
                        <?php echo $row['title']; ?>
                    </h3>

                    <p>
                        <?php echo $row['genre']; ?>
                    </p>

                    <div class="price">

                        $
                        <?php echo $row['price']; ?>

                    </div>

                    <a href="add_to_cart.php?id=<?php echo $row['id']; ?>">

                        <button>

                            Add To Cart 🛒

                        </button>

                    </a>

                </div>

            </div>

        <?php } ?>

    </div>

</body>

</html>