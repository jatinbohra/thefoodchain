<?php
include("db.php");
error_reporting(0);

$id = $_POST['id'];
$linkname = $_POST['linkname'];
$Description = $_POST['Description'];
$cuisine = $_POST['cuisine'];

if(!empty($_FILES['img']['name'])) {
  $img = $_FILES["img"]["name"];
  $tempname = $_FILES["img"]["tmp_name"];
  $folder = "upload slide/" . $img;
  move_uploaded_file($tempname, $folder);
  $sql = "UPDATE add_foodlink SET img='$folder', linkname='$linkname', Description='$Description', cuisine='$cuisine' WHERE id='$id'";
} else {
  $sql = "UPDATE add_foodlink SET linkname='$linkname', Description='$Description', cuisine='$cuisine' WHERE id='$id'";
}

if(mysqli_query($conn, $sql)) {
  echo "✅ Record updated successfully!";
} else {
  echo "❌ Error updating record: " . mysqli_error($conn);
}
?>
