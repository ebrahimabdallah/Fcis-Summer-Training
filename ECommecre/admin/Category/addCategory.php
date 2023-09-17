<?php
include('../../template/nav.php');
include('../../database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';



    $query = "INSERT INTO category (name, created_at)
              VALUES ('$name', NOW())";

    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<div class=\"alert alert-success\">
                The product has been saved successfully!
              </div>";
    }
}

?>

<!-- HTML code for the form goes here -->
<main class="container">
    <div class="row mb-5 p-5">
        <div class="col-9 p-3">
            <h3>Add Category</h3>
            
            <a href="../Category/index.php" class="btn btn-primary">All Category</a>
            <a href="../products.php" class="btn btn-primary">All Products</a>

            <hr>
            <form method="POST" action="storeCategory.php">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>
</main>

<?php
include('../../template/footer.php');
?>