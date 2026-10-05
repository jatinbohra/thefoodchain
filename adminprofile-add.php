<?php
include("db.php");
error_reporting(0);
if(isset($_POST['submit'])){
$name = $_POST["name"];
$pass = $_POST["pass"];
$data=mysqli_query($conn,"insert into adminlogin (name, pass) values('".$name."','".$pass."')");
 	if($data==true)
 	{
 		header("location:admin-profile.php");
 	}
 	else
 	{
 		echo "data not inserted";
 	}
 
 }
?>