<?php
session_start();

include('db.php');
if($db){

}
else
{
	header("Location: admin.php");
}
if(!$_SESSION['name'])
{
	header('Location:admin-login.php');
}

?>