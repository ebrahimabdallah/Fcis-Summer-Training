<?php
include '../../connect.php';

$categoryName = $_POST['name'];

$connection = mysqli_connect($host, $user, $pass, $db);

$query = "INSERT INTO category (name) VALUES ('$categoryName')";

$result = mysqli_query($connection, $query);

if ($result) 
{
    echo "Category added successfully!";

} else {
    
    echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>