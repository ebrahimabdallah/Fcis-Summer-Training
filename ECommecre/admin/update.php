<?php
include('../template/nav.php');
include('../database.php');

if (isset($_POST["Update"])) {
    $id = $_POST['id'];
    $price = $_POST['price'] ?? '';
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';

    // Check if a new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, "../images/$image");
    } else {
        $image = $_POST['old_image'];
    }

    $query = "UPDATE products SET name='$name', price='$price', description='$description', image='$image', created_at=NOW() WHERE id=$id";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<div class=\"alert alert-success\">
                The product has been updated successfully!
              </div>";
    }
}

$id = $_GET['id'];
$queryEdit = "SELECT * FROM products WHERE id=$id";
$resultEdit = mysqli_query($connection, $queryEdit);
$product = mysqli_fetch_assoc($resultEdit);

?>
<main class="container">
    <div class="row mb-2">
        <div class="col-7 p-4">
            <a href="products.php" class="btn btn-primary">Show Products</a>

            <h4 class="title p-3">Update Product</h4>
            <hr>

            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" required id="id" value="<?= $product['id'] ?>" name="id">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" required id="name" value="<?= $product['name'] ?>" name="name" aria-describedby="Name">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" value="<?= $product['price'] ?>" required class="form-control" id="price" name="price" aria-describedby="price">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="image">Image Of Product</label>
                    <input type="file" id="image" name="image" class="form-control">
                    <input type="hidden" class="form-control" value="<?= $product['image'] ?>" id="old_image" name="old_image">
                    <img src="../images/<?= $product['image'] ?>" class="w-25">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Description</label>
                    <textarea id="description" required name="description" class="form-control"><?= $product['description'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="Update">Update</button>
            </form>
        </div>
    </div>
</main>

<?php
include('../template/footer.php');
?>