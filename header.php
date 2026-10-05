<html>
<body>
<header>
    <!--heading secsion-->
    <div class="heading1"  data-toggle="tooltip" title="THE FOOD CHAIN">
    <h1>THE FOOD CHAIN</h1>
  </div>
  <!--navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top ">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto  ">
      <li class="nav-item active pr-3">
        <a class="nav-link" href="index.php"  data-toggle="tooltip" title="Home"> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown pr-3">
        
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"   title="Statemenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Statemenu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
        include("db.php");
        $data=mysqli_query($conn,"select * from  add_statemenu ");
        $num=mysqli_num_rows($data)> 0;

        if($num)
        { 
            while($r  = mysqli_fetch_array($data))
              {
            ?>
        <a class="dropdown-item" href="food_links.php?title=<?php echo $r['title']; ?>"><?php echo $r['title'];  ?></a>
        <?php
       }
      }
    ?>
       </div>
      </li>
      <li class="nav-item pr-3">
        <a class="nav-link" href="index.php#Contact"  data-toggle="tooltip" title="Contact">Contact</a>
      </li>
      
      <li class="nav-item pr-3">
        <a class="nav-link" href="#About us"  data-toggle="tooltip" title="About Us">About Us</a>
      </li>
      <li class="nav-item pr-3">
        <a class="nav-link" href="login page.php"  data-toggle="tooltip" title="Login">Login</a>
      </li>
    </ul>
    <!-- search -->

      
    <!-- search end -->
  </div>
</nav>
</header>


    </body>
</html>
