<?php
include("db.php");
error_reporting(0);
if(isset($_POST['submit'])){
$image = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$folder = "upload slide/".$image;
move_uploaded_file($tempname, $folder);
$title = $_POST["title"];
$data=mysqli_query($conn,"insert into add_statemenu (image, title) values('".$folder."','".$title."')");
 	if($data=true)
 	{
 		header("location:admin-addstatemenu.php");
 	}
 	else
 	{
 		echo "data not inserted";
 	}
 
 }
?>