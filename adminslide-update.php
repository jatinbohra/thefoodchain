<?php
include("db.php");

$id = $_POST['id'];
$slide_cuisine = $_POST['slidecuisine'];
$Description = $_POST['Description'];

$folder = '';
if(!empty($_FILES["slide"]["name"])) {
  $slide = $_FILES["slide"]["name"];
  $tempname = $_FILES["slide"]["tmp_name"];
  $folder = "upload slide/" . $slide;
  move_uploaded_file($tempname, $folder);
}

if(!empty($folder)) {
  $query = "UPDATE add_slide SET slide='$folder', slide_cuisine='$slide_cuisine', Description='$Description' WHERE id='$id'";
} else {
  $query = "UPDATE add_slide SET slide_cuisine='$slide_cuisine', Description='$Description' WHERE id='$id'";
}

$data = mysqli_query($conn, $query);

if($data) {
  $updated = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM add_slide WHERE id='$id'"));
  echo json_encode(['status' => 'success', 'data' => $updated]);
} else {
  echo json_encode(['status' => 'error', 'message' => 'Database update failed']);
}
?>
