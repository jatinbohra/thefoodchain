<?php
include("db.php");
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $query = mysqli_query($conn, "SELECT * FROM add_recipes WHERE id='$id'");
  if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
  } else {
    echo json_encode([]);
  }
}
?>
