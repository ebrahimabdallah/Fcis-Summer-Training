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
            
              <li class="nav-item">
                    <a class="nav-link link-body-element" 
                    href="home.php">
                      Products All
                    </a>
                  </li>

             
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

      <li class="nav-item">
      <a class="nav-link link-body-element" href="../Register-Login/logout.php">
        <i class="bi bi-box-arrow-right"></i> Logout
      </a>
    </li>
    
              </ul>
            </div>
          </div>
        </nav>
      </a>
    

    </div>
  </div>
</header>