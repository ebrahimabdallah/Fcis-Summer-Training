<header data-bs-theme="dark">
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
              <?php
                include('../database.php');
                $query = "SELECT * FROM category";
                $category = mysqli_query($connection, $query);
                while ($categories = mysqli_fetch_assoc($category)) {
                ?>
                  <li class="nav-item">
                    <a class="nav-link link-body-element" 
                    href="?Categ_id=<?php echo $categories['id']; ?>">
                      <?php echo $categories['name']; ?>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </nav>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>