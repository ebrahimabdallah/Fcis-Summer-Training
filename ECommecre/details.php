<?php
@include('database.php');
@include('template/nav.php');

?>

<main class="container">

    <div class="row mb-2">

        <div class="col">
            <h3>Product Details</h3>
            <hr>

            <?php $product = $products[$_GET['psn']]; ?>

            <div class="row">
                <div class="col-6">
                    <img src="<?= $product['image'] ?>" class="w-100">
                </div>
                <div class="col-6">
                    <h5>
                       Product <?= $product['name'] ?>
                    </h5>

                    <p>
                        Price : <?= $product['price'] ?> LE
                    </p>

                    <p>
                    Details : <?=$product['details'] ?>
                    </p>
                    <p>
                    Details : <?=$product['about'] ?>
                    </p>
                    
                </div>
            </div>

        </div>

    </div>

</main>



<?php @include('template/footer.php');?>