<?php

include ("db.php");
$query = mysql_query("select * from  add_slide");
$rowcount = mysql_num_rows($query);



?>
<html>
<head>
	 <link rel="stylesheet" type="text/css" href="css\style.css">
  <link rel="icon" type="image/png" href="photos/16.ico"/>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="http://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/fontawesome.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style type="text/css">
.carousel-inner img {
      width: 100%;
      height:80vh;
}
</style>
</head>
<body>

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>



  <?php
    for($i=1;$i<=$rowcount;$i++)
  {
     $row = mysql_fetch_array($query);
  ?>

  <?php
    if($i ==1)
    {
    ?>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo $row["slide"];   ?>" alt="" >
      <div class="carousel-caption ">
        <h3>RAJASTHANI CUISINE</h3>
        <p>Rajasthan specality Dal - Bati - Churma </p>
      </div> 
      <?php
        }
      else
      {?>
          <div class="carousel-item item">
      <img src="<?php echo $row["slide"];   ?>" alt="" >
      <div class="carousel-caption ">
        <h3>RAJASTHANI CUISINE</h3>
        <p>Rajasthan specality Dal - Bati - Churma </p>
      </div> <?php
      }
      ?> 
      

  
   <!-- <div class="carousel-item">
      <img src="photos\idli sambar.jpg" alt="">
      <div class="carousel-caption">
        <h3>SOUTH INDIAN CUISINE</h3>
        <p>South indian famous food idli-Sambar</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="photos\Gujarati-Food.jpg" alt="" >
      <div class="carousel-caption ">
        <h3>GUJRATI CUISINE</h3>
        <p>Shrikhand indian yoghurt sweet</p>
      </div>-->   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</div>
</body>
</html>


