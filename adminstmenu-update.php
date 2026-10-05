<?php
include("db.php");

$id = $_POST['id'];
$title = $_POST['title'];
$imagePath = '';

if(!empty($_FILES["image"]["name"])) {
  $image = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];
  $imagePath = "upload slide/" . $image;
  move_uploaded_file($tempname, $imagePath);
} else {
  $old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image FROM add_statemenu WHERE id='$id'"));
  $imagePath = $old['image'];
}

$update = mysqli_query($conn, "UPDATE add_statemenu SET title='$title', image='$imagePath' WHERE id='$id'");

if($update) {
  $updated = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM add_statemenu WHERE id='$id'"));
  echo json_encode(['status' => 'success', 'data' => $updated]);
} else {
  echo json_encode(['status' => 'error', 'message' => 'Database update failed']);
}
?>
