<?php
session_start();
$error = '';

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'e_comm_native';

$connection = mysqli_connect($host, $user, $pass, $db);

if (!$connection) {
    die('Failed to connect to the database: ' . mysqli_connect_error());
}

$query = "SELECT * FROM products";
$result = mysqli_query($connection, $query);

if (!$result) {
    $error = 'Error executing the query: ' . mysqli_error($connection);
}

$products = [];

while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}


// mysqli_close($connection);

?>

