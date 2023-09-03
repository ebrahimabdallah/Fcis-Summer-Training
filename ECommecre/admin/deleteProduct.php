<?php
include('../database.php');

$q="DELETE FROM products WHERE id={$_GET['id'] }";
$resultQuery=mysqli_query($connection,$q);

if($resultQuery)
{

    $_SESSION['delete_msg']= "<div class=\"alert alert-success\">
    The product has been Delete successfully!
</div>";
header('location : products.php');

}  

