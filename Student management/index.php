<?php
$error = '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&family=REM:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<link rel="stylesheet" href="mystyle.css">

<body dir="rtl">
    <!-- Connect to the database -->
    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'Student management';

    $connection = mysqli_connect($host, $user, $pass, $db);
    $query = "SELECT * FROM students";
    $result = mysqli_query($connection, $query);

    $id = '';
    $address = '';
    $name = '';
    $image = '';

    if(isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    
    if(isset($_POST['name'])) {
        $name = $_POST['name'];
    }

    if(isset($_POST['address'])) {
        $address = $_POST['address'];
    }

    if(isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, "images/$image");
    }
    
    $procQuery = '';

    if (isset($_POST['add'])) {
        $procQuery = "INSERT INTO students (id, name, address, image) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $procQuery);
        mysqli_stmt_bind_param($stmt, 'isss', $id, $name, $address, $image);
        mysqli_stmt_execute($stmt);
        header("location:index.php");
    }
    
    if (isset($_POST['remove'])) {
        $procQuery = "DELETE FROM students WHERE name=? AND id=?";
        $stmt = mysqli_prepare($connection, $procQuery);
        mysqli_stmt_bind_param($stmt, 'si', $name, $id);
        mysqli_stmt_execute($stmt);
        header("location:index.php");
    }
    ?>
    
    <div id="Control">
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Control Board -->
            <aside>
                <div id="div">
                    <img src="images/pngtree-school-logo-design-png-image_8873860.png" width="150px" alt="logo">
                    <br>
                    <h3>Admin</h3>
                    <br>
                    <label for="id">Student Number</label>
                    <br>
                    <input name="id" id="id" type="number">
                    <br>
                    <label for="name">Name Student</label>
                    <br>
                    <input name="name" id="name" type="text">
                    <br>
                    <label for="address">Student Address</label>
                    <br>
                    <input name="address" id="address" type="text">
                    <br>
                    <label for="image">Image</label>
                    <br>
                    <input type="file" name="image" id="image">
                    <br>
                    <button name="add">Add Student</button>
                    <button name="remove">Remove Student</button>
                </div>
            </aside>
            <!-- End Control Board -->
            
            <!-- User -->
            <main 
            <div class="table-responsive">


                <table id="table">
                    <tr>
                        <th>Address Student</th>
                        <th>Name Student</th>
                        <th>Number Student</th>
                        <th>Image Student</th>
                    </tr>
                    <?php
                    while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td><img src='images/".$row['image']."' alt='Student Image' width='120px' ></td>";      
                         echo "</tr>";
                        echo "<tr>";
                    
                    }
                    ?>
                </table>
                </div>
            </main>
            <!-- End User -->
        </form>
    </div>
</body>
</html>