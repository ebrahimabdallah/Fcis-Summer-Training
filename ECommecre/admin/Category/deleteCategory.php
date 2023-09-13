<?php
include '../../connect.php';

// Fetch the category ID from the GET parameters
$id = $_GET['id'];

// Delete the category from the database
$query = "DELETE FROM category WHERE id={$id}";
$result = mysqli_query($connection, $query);

if ($result) {
    // Set a success message in the session
    session_start();
    $_SESSION['delete_msg'] = '<div class="alert alert-success">The category has been deleted successfully!</div>';
} else {
    // Set an error message in the session
    session_start();
    $_SESSION['delete_msg'] = '<div class="alert alert-danger">Failed to delete the category!</div>';
}

// Redirect to the category page
header('Location: index.php');
exit;
?>