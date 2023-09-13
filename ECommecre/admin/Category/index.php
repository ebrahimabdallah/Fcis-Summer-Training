<?php
include '../../database.php';
include '../../template/nav.php';

$connection = mysqli_connect($host, $user, $pass, $db);
$query = "SELECT * FROM category";
$result = mysqli_query($connection, $query);
?>

<main class="container">
    <div class="row mb-4 p-3">
        <div class="col-9 p-3">
            <a href="../Category/addCategory.php" class="btn btn-primary">Add Category</a>
            <h3>Category Controller</h3>
            <hr>

            <?php include '../csstable.php'; ?>

            <?php
            if (isset($_SESSION['delete_msg'])) {
                echo $_SESSION['delete_msg'];
                unset($_SESSION['delete_msg']);
            }
            ?>
            <div class="table-responsive">
                <table id="table">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($category = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?= $category['id'] ?></td>
                                <td><?= $category['name'] ?></td>
                                <td>
                                    
                                    <a href="updateCategory.php?id=<?=$category['id']?>" class="btn btn-primary">Edit</a>
                                    <a href="deleteCategory.php?id=<?= $category['id'] ?>" class="btn btn-danger">Delete</a>
                                
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo '<tr>
                                <td colspan="3">No Category Exists!</td>
                              </tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</main>

<?php
include '../../template/footer.php';
?>