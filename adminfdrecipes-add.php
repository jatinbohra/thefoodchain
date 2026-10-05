<?php
include("db.php");
error_reporting(0);


    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "upload slide/".$image;

    move_uploaded_file($tempname, $folder);

    $title   = $_POST['title'];
    $cuisine = $_POST['cuisine'];
    $recipes = $_POST['recipes'];

    $data = mysqli_query($conn, 
        "INSERT INTO add_recipes(image, title, cuisine, recipes) 
         VALUES('".$folder."','".$title."','".$cuisine."','".$recipes."')");

    if($data){
        header("Location: admin-addrecipes.php");
        exit;
    } else {
        echo "Recipes not inserted: " . mysqli_error($conn);
    }
}
?>


