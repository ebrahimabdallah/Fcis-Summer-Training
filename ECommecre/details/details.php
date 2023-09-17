<?php
@include('../database.php');
@include('../template/nav.php');

$id = $_GET['id'];
$q = "SELECT * FROM products WHERE id={$id}";
$result = mysqli_query($connection, $q);
$product = mysqli_fetch_assoc($result);
?>
<main class="container">
    <div class="row mb-2">
        <div class="col">
            <h3>Product Details</h3>
            <hr>
            <div class="row">
                <div class="col-6">
                <img class="w-100" src="../images/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
                </div>
                <div class="col-6">
                    <h5>Product: <?= $product['name'] ?></h5>
                    <p>Price: <?= $product['price'] ?> LE</p>
                    <p>Details: <?= $product['description'] ?></p>
                    <a href="../Register-Login/home.php">Back Home</a>

                </div>
            </div>
        </div>
        
    </div>
</main>

<?php @include('../template/footer.php');?>