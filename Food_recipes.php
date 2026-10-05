<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>The Food Chain | Recipes</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="photos/16.ico"/>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    body {
      background: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    header h1 {
      font-size: 2rem;
      font-weight: bold;
      color: #333;
    }
    .recipe-img {
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
      margin-bottom: 20px;
      transition: transform 0.3s ease;
      width:90%;
    }
    .recipe-img:hover {
      transform: scale(1.02);
    }
    .sidebar {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .sidebar h4 {
      border-bottom: 2px solid #eee;
      padding-bottom: 8px;
      margin-bottom: 15px;
      font-size: 1.2rem;
    }
    .sidebar ul li {
      margin: 6px 0;
    }
    .sidebar ul li a {
      text-decoration: none;
      color: #333;
      transition: color 0.2s;
    }
    .sidebar ul li a:hover {
      color: #dc3545;
    }
    .rating i {
      color: #ffc107;
      cursor: pointer;
    }
    .share-btns a {
      margin-right: 12px;
      font-size: 20px;
      color: #666;
      transition: color 0.3s;
    }
    .share-btns a:hover {
      color: #000;
    }
    footer {
      background: #212529;
      color: #ddd;
      padding: 20px 0;
      margin-top: 40px;
    }
    
  </style>
</head>
<body>
<header class="bg-light py-3 shadow-sm">
  <div class="container text-center">
    <h1><i class="fas fa-utensils text-danger"></i> THE FOOD CHAIN</h1>
  </div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">🍴 FoodChain</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <!-- Menu -->
        <ul class="navbar-nav me-auto">
          <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
          
          <!-- Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">State Menu</a>
            <ul class="dropdown-menu">
              <?php
              include("db.php");
              $data = mysqli_query($conn,"SELECT * FROM add_statemenu");
              if(mysqli_num_rows($data) > 0){
                while($r = mysqli_fetch_array($data)){
                  echo "<li><a class='dropdown-item' href='food_links.php?title={$r['title']}'>{$r['title']}</a></li>";
                }
              }
              ?>
            </ul>
          </li>

          <li class="nav-item"><a class="nav-link" href="index.php#Contact">Contact</a></li>
          <li class="nav-item"><a class="nav-link" href="#About">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="login page.php">Login</a></li>
        </ul>

        <!-- Search -->
        <form method="post" class="d-flex">
          <input class="form-control me-2" type="search" name="searchbox" placeholder="Search food..." aria-label="Search">
          <button class="btn btn-warning" type="submit" name="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<!-- Recipes Section -->
<section class="py-5">
  <div class="container">
    <div class="row">
      <?php
        if(isset($_REQUEST['id'])){
          $links = $_REQUEST['id'];
          $query = mysqli_query($conn,"SELECT * FROM add_recipes WHERE id = '$links' ");
          while($r = mysqli_fetch_array($query)){ ?>
            <div class="col-lg-9">
              <h2 class="fw-bold text-center mb-4">🍴 <?php echo $r['title']; ?></h2>
              <img src="<?php echo $r['image']; ?>" class="img-fluid recipe-img" alt="Recipe Image">
              
              <div class="mt-3">
                <h5 class="text-danger">Recipe:</h5>
                <p><?php echo nl2br($r['recipes']); ?></p>
              </div>

              <!-- Features -->
              <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">
                <div class="rating">
                  <span class="me-2">Rate this recipe: </span>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                  <i class="fa-regular fa-star"></i>
                </div>
                <div class="share-btns">
                  <span class="me-2">Share: </span>
                  <a href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode('http://yoursite.com/Food_recipes.php?id='.$r['id']); ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                  <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode('http://yoursite.com/Food_recipes.php?id='.$r['id']); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                  <a href="https://wa.me/?text=<?php echo urlencode('Check this recipe: '.$r['title'].' - http://yoursite.com/Food_recipes.php?id='.$r['id']); ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
                </div>
                <button class="btn btn-outline-danger btn-sm mt-2 mt-md-0" onclick="window.print()">
                  <i class="fa fa-print"></i> Print Recipe
                </button>
              </div>
            </div>
          <?php }
        }
      ?>

      <!-- Sidebar -->
      <div class="col-lg-3 mt-5 mt-lg-0">
        <div class="sidebar">
          <h4>🍛 Indian Food</h4>
          <ul class="list-unstyled">
            <?php
              $data = mysqli_query($conn,"SELECT * FROM add_statemenu");
              if(mysqli_num_rows($data) > 0){
                while($r = mysqli_fetch_array($data)){ ?>
                  <li><a href="food_links.php?title=<?php echo $r['title']; ?>"><?php echo $r['title']; ?></a></li>
                <?php }
              }
            ?>
          </ul>

          <h4 class="mt-4">🥘 More Recipes</h4>
          <ul class="list-unstyled">
            <?php
              $data = mysqli_query($conn,"SELECT * FROM add_foodlink");
              if(mysqli_num_rows($data) > 0){
                while($r = mysqli_fetch_array($data)){ ?>
                  <li><a href="Food_recipes.php?id=<?php echo $r['id']; ?>"><?php echo $r['linkname']; ?></a></li>
                <?php }
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer>
  <div class="container text-center">
    <p class="mb-0">&copy; <?php echo date("Y"); ?> The Food Chain | Designed with ❤️ by Jatin</p>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Disable right-click
  document.addEventListener("contextmenu", e => {
    e.preventDefault();
    console.log("Right Click Disabled");
  });
</script>

</body>
</html>
