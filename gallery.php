<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Image Gallery</title>
  <link rel="icon" type="image/png" href="photos/16.ico"/>
  
  <!-- Bootstrap & Fancybox -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/b99e675b6e.js" crossorigin="anonymous"></script>

  <style>
    body {
      background: #f8f9fa;
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
    }
    h1 {
      font-weight: 600;
      text-align: center;
      padding: 40px 0 20px;
      color: #333;
    }
    .gallery-item {
      overflow: hidden;
      border-radius: 15px;
      box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
      transition: transform 0.3s ease-in-out, box-shadow 0.3s;
    }
    .gallery-item img {
      width: 100%;
      height: 300px;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    .gallery-item:hover img {
      transform: scale(1.1);
    }
    .gallery-item:hover {
      transform: translateY(-8px);
      box-shadow: 0px 8px 25px rgba(0,0,0,0.2);
    }
    .gallery-caption {
      background: rgba(0,0,0,0.6);
      color: #fff;
      position: absolute;
      bottom: 0;
      width: 100%;
      padding: 10px;
      font-size: 14px;
      text-align: center;
      opacity: 0;
      transition: opacity 0.4s ease;
    }
    .gallery-item:hover .gallery-caption {
      opacity: 1;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1><i class="fas fa-camera-retro"></i> Image Gallery</h1>
    <div class="row">

      <?php 
        $dir = glob('upload slide/{*.jpg,*.png,*.jpeg}', GLOB_BRACE);
        foreach ($dir as $value) {
          $filename = basename($value); // file name only
          ?>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="gallery-item position-relative">
              <a href="<?php echo $value; ?>" data-fancybox="gallery" data-caption="<?php echo $filename; ?>">
                <img src="<?php echo $value; ?>" alt="<?php echo $filename; ?>">
              </a>
            </div>
          </div>
          <?php
        }
      ?>

    </div>
  </div>

  <!-- Disable Right Click -->
  <script>
    window.oncontextmenu = function(){
      console.log("Right Click Disabled");
      return false;
    }
  </script>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
