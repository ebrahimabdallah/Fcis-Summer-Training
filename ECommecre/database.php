<?php
include('connect.php');
$query = "SELECT * FROM products";
$result = mysqli_query($connection, $query);

if (!$result) {
    $error = 'Error executing the query: ' . mysqli_error($connection);
}

$products = [];

while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

?>

