<?php
@include('database.php');
function words($text,$end=10) // defualt value start =0 && end=10
{
$words=explode(' ',$text);
return  implode(' ',array_slice($words,0,$end)).'.....'; 
}

function getAllCategories()
{
 global $connection;
$query = "SELECT * FROM category";
$categories = mysqli_query($connection, $query);
return $categories;
}
?>