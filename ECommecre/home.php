<?php 
@include('database.php');
@include('template/nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<main>
    <center>
        <h2 class="title">Products Avaliable</h2>
    </center>
    <?php if (!empty($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php else : ?>
        <?php if (count($products) > 0) : ?>
            <div class="album py-5 bg-body-tertiary">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php foreach ($products as $product) : ?>
                            <div class="col">
                            <div class="card shadow-sm ">
                                
                                <div class="card-body" >
                                    <img src="images/<?php echo $product['image']; ?>" alt="Product Image" style="width:60%">
                                    <p class="card-title" ></p>name: <?php echo $product['name'];  ?></p>
                                    <p >price: <?php echo $product['price']; ?> LE</p>
                                    <p </p>description: <?php echo $product['description']; ?></p>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</main>
<?php
@include('template/footer.php');
?>
</body>
</html>