<?php
session_start();
include("db.php");
error_reporting(0);

// Handle contact form
if (isset($_POST['send'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $country = $_POST['country'];
  $msg = $_POST['message'];

  $data = mysqli_query($conn, "INSERT INTO contact(name,email,country,message) VALUES('$name','$email','$country','$msg')");
  if ($data) {
    echo "<script>alert('Message sent successfully!');</script>";
  } else {
    echo "<script>alert('Failed to send message.');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>The Food Chain</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/png" href="photos/16.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>
    body { font-family: 'Poppins', sans-serif; line-height: 1.7; }
    .heading1 h1 { font-size: 3rem; text-align: center; padding: 20px; font-weight: bold; color: #2c3e50; }
    .navbar { box-shadow: 0 3px 8px rgba(248, 123, 5, 0.2); }
    .hero { background: url('photos/banner.jpg') center/cover no-repeat; color: white; height: 80vh; display: flex; align-items: center; justify-content: center; text-align: center; }
    .hero h1 { font-size: 4rem; font-weight: bold; }
    .hero p { font-size: 1.3rem; }
    .section-title { font-size: 2.5rem; font-weight: 600; margin-bottom: 30px; text-align: center; }
    .cards img { width: 100%; border-radius: 10px; transition: 0.3s; }
    .cards img:hover { transform: scale(1.05); }
    .testimonial { background: #f8f9fa; padding: 50px 0; }
    .testimonial p { font-style: italic; }
    footer { background: #2c3e50; color: white; padding: 40px 0; }
    footer a { color: #f1c40f; }
    .scrollup { position: fixed; bottom: 20px; right: 20px; background: #f39c12; color: white; padding: 10px 15px; border-radius: 50%; }
  </style>
</head>
<body id="top">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">🍴THE Food Chain</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active"><a class="nav-link" style="color:orange;" href="index.php">Home</a></li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="statemenuDropdown" data-toggle="dropdown">State Menu</a>
        <div class="dropdown-menu">
          <?php
            $data = mysqli_query($conn,"SELECT * FROM add_statemenu");
            while ($r = mysqli_fetch_array($data)) {
              echo "<a class='dropdown-item' href='food_links.php?title={$r['title']}'>{$r['title']}</a>";
            }
          ?>
        </div>
      </li>
      <li class="nav-item"><a class="nav-link" href="#Contact">Contact</a></li>
      <li class="nav-item"><a class="nav-link" href="#About">About Us</a></li>
      <li class="nav-item"><a class="nav-link" href="login page.php">Login</a></li>
    </ul>
    <form method="post" class="form-inline">
      <input class="form-control mr-2" type="search" name="searchbox" placeholder="Search food...">
      <button class="btn btn-outline-warning" name="submit">Search</button>
    </form>
    <ul style="list-style-type:none; padding-top:20px; text-align:center; display:flex;">

        <?php if(!isset($_SESSION['name'])) { ?>
          <li><a href="login page.php" class="text-light" style="margin-right:20px;text-decoration: none;">Login</a></li>
          <li><a href="create account.php" class="text-light" style="text-decoration: none;" >Join us</a></li>
        <?php } else { ?>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color:orange;" href="#" id="statemenuDropdown" data-toggle="dropdown">🙏Welcome, <?php echo $_SESSION["name"]; ?></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="user-logout.php">Logout</a>
            </div>
          </li>
        <?php } ?>
      </ul>
      
  </div>
</nav>

<!-- Hero Banner -->
<div class="hero" style="background-image: url('./photos/1.jpg'); background-size: cover; background-position: center; height: 500px;">
  <div>
    <h1>Welcome to The Food Chain</h1>
    <p>Discover delicious Indian recipes & cuisines 🍛</p>
  </div>
</div>

<!--About Indian Food-->
<div class="container py-5">
  <h2 class="section-title">Indian Food</h2>
  <div class="row" style="padding:0 10px 0 10px;">
        <center><p>The traditional food of India has been widely appreciated for its fabulous use of herbs and spices.
          Indian cuisine is known for its large assortment of dishes. The cooking style varies from region to region
          and is largely divided into South Indian North Indian cuisine. India is quite famous for its diverse multi
          cuisine available in a large number of restaurants and hotel resorts, which is reminiscent of unity in
          diversity. The staple food in India includes wheat, rice and pulses with chana (Bengal Gram) being the
          most important one. In modern times Indian pallete has undergone a lot of change. In the last decade,
          as a result of globalisation, a lot of Indians have travelled to different parts of the world and vice
          versa there has been a massive influx of people of different nationalities in India.</p></center>
  </div>
</div>
<!-- Featured Recipes -->
<div class="container py-5">
  <h2 class="section-title">Featured Recipes</h2>
  <div class="row">
    <?php
      $query = mysqli_query($conn,"SELECT * FROM add_recipes LIMIT 3");
      while($row = mysqli_fetch_assoc($query)) {
        echo "
          <div class='col-md-4'>
            <div class='card mb-4 shadow'>
              <img src='{$row['image']}' class='card-img-top'>
              <div class='card-body'>
                <h5 class='card-title'>{$row['title']}</h5>
                <p class='card-text'>".substr($row['recipes'],0,100)."...</p>
                <a href='Food_recipes.php?id={$row['id']}' class='btn btn-warning btn-block'>View Recipe</a>
              </div>
            </div>
          </div>
        ";
      }
    ?>
  </div>
</div>

<!-- State Menu Section -->
<div class="container py-5">
  <h2 class="section-title mb-4">Explore by State</h2>
  <div class="row g-4">
    <?php
      $data = mysqli_query($conn,"SELECT * FROM add_statemenu LIMIT 8");
      while($r = mysqli_fetch_array($data)) {
        echo "
          <div class='col-lg-3 col-md-4 col-sm-6 mb-3'>
            <div class='card h-100 text-center shadow-sm'>
              <a href='food_links.php?title={$r['title']}' class='text-decoration-none text-dark'>
                <img src='{$r['image']}' class='card-img-top img-fluid object-fit-cover' style='height:180px;' alt='{$r['title']}'>
                <div class='card-body'>
                  <h5 class='card-title'>{$r['title']}</h5>
                </div>
              </a>
            </div>
          </div>
        ";
      }
    ?>
  </div>
</div>


<!-- Testimonials -->
<div class="testimonial text-center">
  <h2 class="section-title">What People Say</h2>
  <div class="container">
    <p>"The Food Chain helped me learn cooking easily at home. Recipes are simple & tasty!" - Priya</p>
    <p>"Best Indian food collection online. Highly recommended!" - Ramesh</p>
  </div>
</div>

<!-- Contact -->
<div class="container py-5" id="Contact">
  <h2 class="section-title">Contact Us</h2>
  <form method="post">
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Country</label>
      <select name="country" class="form-control">
        <option>India</option><option>Australia</option><option>Canada</option><option>USA</option>
      </select>
    </div>
    <div class="form-group">
      <label>Message</label>
      <textarea name="message" rows="5" class="form-control"></textarea>
    </div>
    <button type="submit" name="send" class="btn btn-success">Send Message</button>
  </form>
</div>

<!-- ===== FOOTER ===== -->
<footer class="bg-dark text-light pt-5 pb-3" id="About">
  <div class="container">
    <div class="row">

      <!-- About -->
      <div class="col-md-4">
        <h5 class="text-uppercase mb-3">🍴 The Food Chain</h5>
        <p>Discover the best recipes from across India. From traditional to modern dishes, we bring flavors to your plate.</p>
        <!-- Subscribe Button -->
        <button class="btn btn-outline-warning btn-sm mt-2" data-toggle="modal" data-target="#subscribeModal">
          🔔 Subscribe
        </button>
      </div>

      <!-- Quick Links -->
      <div class="col-md-4">
        <h5 class="text-uppercase mb-3 light">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="Gallery.php" class="text-light">Gallery</a></li>
          <li><a href="admin-login.php" class="text-light">Admin</a></li>
        </ul>
      </div>

      <!-- Social -->
      <div class="col-md-4">
        <h5 class="text-uppercase mb-3">Follow Us</h5>
        <a href="#" class="text-light mr-3"><i class="fa fa-facebook fa-2x"></i></a>
        <a href="#" class="text-light mr-3"><i class="fa fa-instagram fa-2x"></i></a>
        <a href="#" class="text-light mr-3"><i class="fa fa-twitter fa-2x"></i></a>
        <a href="#" class="text-light"><i class="fa fa-youtube fa-2x"></i></a>
      </div>
    </div>

    <hr class="bg-light">

    <!-- Copyright -->
    <div class="text-center">
      <p class="mb-0">&copy; <?php echo date("Y"); ?> The Food Chain | Develop by JM Infotech Solution Pvt. Ltd.</p>
    </div>
  </div>
</footer>

<!-- ===== SUBSCRIBE MODAL ===== -->
<div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Subscribe to Our Newsletter</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="subscribe.php">
        <div class="modal-body">
          <div class="form-group">
            <label for="sub-name">Name</label>
            <input type="text" class="form-control" id="sub-name" name="name" placeholder="Enter your name" required>
          </div>
          <div class="form-group">
            <label for="sub-email">Email</label>
            <input type="email" class="form-control" id="sub-email" name="email" placeholder="Enter your email" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Subscribe</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- ===== FOOTER JS ===== -->
<script>
document.getElementById("sendMessage").addEventListener("click", function() {
  let name = document.getElementById("name").value.trim();
  let email = document.getElementById("email").value.trim();
  let message = document.getElementById("message").value.trim();
  let msgBox = document.getElementById("formMsg");

  if(name && email.includes("@") && message.length > 5){
    msgBox.innerText = "✅ Message sent successfully!";
    msgBox.style.color = "green";
    document.getElementById("contactForm").reset();
  } else {
    msgBox.innerText = "❌ Please fill all fields correctly!";
    msgBox.style.color = "red";
  }
});
</script>


<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
