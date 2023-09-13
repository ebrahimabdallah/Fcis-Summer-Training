<?php
include('../database.php');

// Fetch the product ID from the GET parameters
$id = $_GET['id'];

$q = "SELECT * FROM products WHERE id={$id}";
$result = mysqli_query($connection, $q);
$product = mysqli_fetch_assoc($result);

// Delete the product from the database
$q = "DELETE FROM products WHERE id={$id}";
$resultQuery = mysqli_query($connection, $q);

if ($resultQuery) {
    // Delete the associated image file
    $imagePath = '../images/' . $product['image'];
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Set a success message in the session
    session_start();
    $_SESSION['delete_msg'] = '<div class="alert alert-success">The product has been deleted successfully!</div>';

    // Redirect to the products page
    header('Location: products.php');
    exit;
}