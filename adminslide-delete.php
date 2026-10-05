<?php
include("db.php");
error_reporting(0);
$id = $_REQUEST['id'];
//connection
$query = mysqli_query($conn,"delete from add_slide where id= '". $id ."'");
 if($query==true)
{
  header("location:admin-addslide.php");
}
else
{
	echo"not worked";
}
//after delete record then
// header("location:admin-addslide.php");

?>