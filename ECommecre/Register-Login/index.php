
<?php
session_start();
if(isset($_SESSION["user"]))
{
  header("Location:home.php");
}
include('../connect.php');



include('../connect.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $confirmPassword = $_POST['confirmPassword'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $errors = [];

    if (empty($name) || empty($confirmPassword) || empty($email) || empty($password)) {
        $errors[] = "All fields are required";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address";
    }

    if ($password != $confirmPassword) {
        $errors[] = "Password does not match the confirm password";
    }

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }

    // Check unique email

    $sql = "SELECT * FROM users WHERE email = '$email' ";
    $result = mysqli_query($connection, $sql);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount > 0) {
        $errors[] = "This Email Already Exists";
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {
        // Registration successful, you can add your logic here

        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$passwordHash')";

        if (mysqli_query($connection, $query)) {
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
            // header('Location:../home.php');
        } else {
            echo "Error: " . mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form action="index.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" autocomplete="off">
        </div>

        <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" autocomplete="off">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" autocomplete="off">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Your Password" autocomplete="off">
        </div>

        <div>
            <button class="btn btn-primary" type="submit" value="register" name="submit">Register</button>
        </div>
    </form>
    <div>
        <p>Already Registered? <a href="login.php">Login Here</a></p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"></script>
</body>
</html>