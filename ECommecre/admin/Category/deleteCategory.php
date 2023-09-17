<?php

include '../../connect.php';

// Fetch the category ID from the GET parameters
$id = $_GET['id'];

// Delete the products associated with the category
$deleteProductsQuery = "DELETE FROM products WHERE category_id={$id}";
$deleteProductsResult = mysqli_query($connection, $deleteProductsQuery);

// Delete the category from the database
$deleteCategoryQuery = "DELETE FROM category WHERE id={$id}";
$deleteCategoryResult = mysqli_query($connection, $deleteCategoryQuery);

if ($deleteCategoryResult) {
    // Set a success message in the session
    $_SESSION['delete_msg'] = '<div class="alert alert-success">The category and its related products have been deleted successfully!</div>';
} else {
    // Set an error message in the session
    $_SESSION['delete_msg'] = '<div class="alert alert-danger">Failed to delete the category!</div>';
}

// Redirect to the category page
header('Location: index.php');
exit;
?>