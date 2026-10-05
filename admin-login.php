<?php
session_start();
include("db.php");
error_reporting(0);
if(isset($_POST["submit"])){
//if(isset($_post['login'])){
$name =$_POST['uname'];
$pass =$_POST['pass'];
// $_SESSION["name"] ="$name";
$data = mysqli_query($conn,"select * from adminlogin where name='$name' and pass = '$pass' ");
$row=mysqli_num_rows($data);
 // if(mysqli_fetch_array($data))
if($row == 1)
  {
   //echo $_SESSION['name'];
  $_SESSION['uname'] = $name;
   header("location: admin-dashboard.php");
  	//echo "ok";
  }
else
 {?>
 	<!-- //echo "failed"/; -->
 	<script>
  alert("username and password is invalid");
  </script>
  <?php
   // header("location:admin-login.php");
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ADMIN LOGIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="icon" type="image/png" href="photos/16.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-b-160 p-t-50">
				
				<form class="login100-form validate-form"  action="admin-login.php" method="post">
					<span class="login100-form-title p-b-43">
						Admin Login
					</span>
					
					<div class="wrap-input100 rs1 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="uname">
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass">
						<span class="label-input100">Password</span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" name="submit" class="login100-form-btn" value="Login">
							
						
					</div>
					
					<div class="text-center w-full p-t-23">
						<a href="#" class="txt1">
							Forgot password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
	

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
	<script>
    window.oncontextmenu = function(){
      console.log("Right Click Disabled");
      return false;
    }
  </script>

</body>
</html>