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
?>