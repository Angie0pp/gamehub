<?php

$conn = new mysqli("localhost", "root", "", "gamehub");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>