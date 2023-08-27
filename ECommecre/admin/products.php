<?php
include('../database.php');
include('../template/nav.php');

$connection = mysqli_connect($host, $user, $pass, $db);
$query = "SELECT * FROM products";
$result = mysqli_query($connection, $query);
?>

<main class="container">
    <div class="row mb-4 p-3">
        <div class="col-9 p-3">
            <a href="add.php" class="btn btn-primary">Add Products</a>
            <h3>Product Controller</h3>
            <hr>
            <?php include('csstable.php'); ?>
            <div class="table-responsive">
                <table id="table">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Description</th>
                    </tr>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['price'] ?></td>
                                <td class="w-25">
                                    <img class="w-100" src="../images/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
                                </td>
                                <td><?= $row['description'] ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr>
                                <th colspan="4">No Product Exists!</th>
                              </tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</main>

<?php
include('../template/footer.php');
?>