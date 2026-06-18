<?php

include 'db.php';

$id = $_GET['id'];

$stmt = $conn->prepare(
"DELETE FROM games WHERE id=?"
);

$stmt->bind_param(
"i",
$id
);

$stmt->execute();

header("Location: admin_games.php");

exit();

?>