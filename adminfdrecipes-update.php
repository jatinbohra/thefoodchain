<?php
include("db.php");

$id = $_POST['id'];
$title = $_POST['title'];
$cuisine = $_POST['cuisine'];
$recipes = $_POST['recipes'];

if(!empty($_FILES['image']['name'])){
  $image = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];
  $folder = "upload_recipes/".$image;
  move_uploaded_file($tempname, $folder);

  $update = "UPDATE add_recipes SET title='$title', cuisine='$cuisine', recipes='$recipes', image='$folder' WHERE id='$id'";
} else {
  $update = "UPDATE add_recipes SET title='$title', cuisine='$cuisine', recipes='$recipes' WHERE id='$id'";
}

if(mysqli_query($conn, $update)){
  echo "✅ Recipe Updated Successfully!";
} else {
  echo "❌ Error: " . mysqli_error($conn);
}
?>
