<?php

$servername = "mysql";
$username = "root";
$password = "root";
$db = "onlineshop";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
