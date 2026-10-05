<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Food Links | The Food Chain</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="photos/16.ico"/>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons -->
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
      letter-spacing: 2px;
      color: #198754;
    }
    .navbar {
      border-bottom: 3px solid #198754;
    }
    .search-box input {
      border-radius: 30px;
      padding-left: 15px;
    }
    .card-img-top{
      width:100%;
      height:300px;
    }
    .card {
      border-radius: 15px;
      transition: 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.2);
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
    footer {
      background: #212529;
      color: #fff;
      padding: 30px 0;
      text-align: center;
      margin-top: 40px;
    }
    footer a {
      color: #0dcaf0;
      text-decoration: none;
    }
    footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body id="top">

<!-- Header -->
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
      <!-- Left Menu -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        
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

      <!-- Search (Bootstrap 5) -->
      <form method="post" class="d-flex">
        <input class="form-control me-2" type="search" name="searchbox" placeholder="Search food..." aria-label="Search">
        <button class="btn btn-warning" type="submit" name="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</header>

<!-- Main Content -->
<div class="container mt-4">
  <div class="row">

    <!-- Left Content -->
    <div class="col-lg-9">
      <?php
      include("db.php");

      // Search results
      if(isset($_POST['submit']) && $_POST['searchbox']!=""){
        $search=$_POST['searchbox'];
        $query=mysqli_query($conn,"SELECT * FROM add_recipes WHERE title LIKE '%$search%' OR cuisine LIKE '%$search%' ");
        if(mysqli_num_rows($query)>0){
          while($row=mysqli_fetch_assoc($query)){ ?>
            <div class="card mb-4">
              <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="Food Image" 
              <div class="card-body">
                <h4 class="card-title"><?php echo $row['title']; ?></h4>
                <p class="card-text"><?php echo $row['recipes']; ?></p>
              </div>
            </div>
      <?php } } else {
          echo "<div class='alert alert-warning'>No results found for '$search'</div>";
        }
      } else {
        // Cuisine info
        $according=$_REQUEST['title'];
        $query=mysqli_query($conn,"SELECT * FROM add_statemenu WHERE title = '$according'");
        if(mysqli_num_rows($query)){
          while($s=mysqli_fetch_array($query)){ ?>
            <h2 class="text-center mb-3">🍲 <?php echo $s['title']; ?></h2>
            
        <?php }
        }

        // Food links
        $data=mysqli_query($conn,"SELECT * FROM add_foodlink WHERE cuisine = '$according'");
        $count=1;
        while($r=mysqli_fetch_array($data)){ ?>
          <div class="card mb-4">
            <img src="<?php echo $r['img']; ?>" class="card-img-top" alt="Food Image">
            <div class="card-body">
              <h5 class="card-title"><?php echo $count.") ".$r['linkname']; ?></h5>
              <p class="card-text"><?php echo $r['Description']; ?></p>
              <a href="Food_recipes.php?id=<?php echo $r['id']; ?>" class="btn btn-warning">View Recipe</a>
            </div>
          </div>
        <?php $count++; }
      } ?>
    </div>

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
  <div class="container">
    <p>&copy; <?php echo date("Y"); ?> The Food Chain | Made with <i class="fa fa-heart text-danger"></i></p>
    <p>
      <a href="#top">Back to top</a> | 
      <a href="index.php#Contact">Contact</a> | 
      <a href="#About">About Us</a>
    </p>
  </div>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Disable Right Click
  window.oncontextmenu = function(){
    console.log("Right Click Disabled");
    return false;
  }
</script>

</body>
</html>
