<?php 
@include('database.php');
@include('template/navHome.php');
@include('functions.php');

$q = "SELECT * FROM products";
if (isset($_GET['Categ_id'])) {
    $q .= " WHERE category_id={$_GET['Categ_id']} ";
}
$products = mysqli_query($connection, $q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-1p1so9oJYwTF9sX+QJK5K0R5LZdS7i7C5kI0LmR4GgFQeNzqz9SFd0Pq8z2DKD4uGy6LDgR53qZbL0y8ZG8k1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<main>
  <center>
    <div>
      <h1>All Products</h1>
    </div>
  </center>

  <?php if (mysqli_num_rows($products) > 0) : ?>
    <div class="album py-5 bg-body-tertiary">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php while ($product = mysqli_fetch_assoc($products)) : ?>
            <div class="col">
              <div class="card h-100 shadow-sm">
                <img src="images/<?php echo $product['image']; ?>" alt="Product Image" class="card-img-top" style="width: 100%; object-fit: cover; height: 200px;">
                <div class="card-body d-flex flex-column justify-content-between">
                  <h5 class="card-title"><?php echo $product['name']; ?></h5>
                  <p class="card-text"><?php echo words($product['description'], 5); ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <p class="card-text mb-0">Price: <?php echo $product['price']; ?> LE</p>
                    <a href="details/details.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">View Details</a>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  <?php else : ?>
    <center>
    <div class="alert alert-success">There are no products yet!</div>
    </center>
    <?php endif; ?>
</main>

<?php
@include('template/footer.php');
?>
</body>
</html>