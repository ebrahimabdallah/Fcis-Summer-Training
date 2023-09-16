<?php
@include('../database.php');
@include('../template/nav.php');
@include('../functions.php');

$connection = mysqli_connect($host, $user, $pass, $db);
// $query = "SELECT * FROM products";
$query = "SELECT `products`.`id`,`products`.`name`,`products`.`image`, `category`.`name`AS CaName FROM `products` INNER JOIN `category` ON `products`.`category_id`=`category`.`id`;";

$result = mysqli_query($connection, $query);
?>

<main class="container">
    <div class="row mb-4 p-3">
        <div class="col-9 p-3">
            <a href="add.php" class="btn btn-primary">Add Products</a>
            <a href="Category/index.php" class="btn btn-primary">Category</a>
            
            <h3>Product Controller</h3>
            <hr>

            <?php include('csstable.php');             
            ?>

            <?php
            if(isset($_SESSION['delete_msg']))
            {
                echo $_SESSION['delete_msg'];
                unset($_SESSION['delete_msg']);
            }
            ?>
            <div class="table-responsive">

            <table id="table">
                    <tr>
                    <th>#</th>

                    <th>Image</th>
                    <th>Product</th>
                     <th>category</th>
                  
                      <th>Actions</th>

                    </tr>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                            <td><?= $row['id'] ?></td>

                            <td class="w-25">
                                    <img class="w-100" src="../images/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
                                </td>   
                            <td><?= $row['name'] ?></td>
                                <td><?= $row['CaName'] ?></td>
                               
                             
                                <td>
                                    <a href="update.php?id=<?=$row['id']?>" class="btn btn-primary">Edit</a>
                                    <a href="deleteProduct.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                                
                                </td>

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