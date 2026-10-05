<?php
include("db.php");
error_reporting(0);
if(isset($_POST['submit'])){
$slide = $_FILES["slide"]["name"];
$tempname = $_FILES["slide"]["tmp_name"];
$folder = "upload slide/".$slide;
move_uploaded_file($tempname, $folder);
$slide_cuisine = $_POST["slidecuisine"];
$Description = $_POST["Description"];
$query= "insert into add_slide (slide, slide_cuisine,Description)values('".$folder."','".$slide_cuisine."','".$Description."')";
 	$data = mysqli_query($conn, $query);
 	if($data=true)
 	{
 		header("location:admin-addslide.php");
 	}
 	else
 	{
 		echo "data not inserted";
 	}
 
 }
?>