<?php
include("db.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    $img = $_FILES["img"]["name"];
    $tempname = $_FILES["img"]["tmp_name"];

    // ✅ Ensure folder exists
    $folder = "upload slide/" . $img;
    if (!file_exists("upload slide")) {
        mkdir("upload slide", 0777, true);
    }

    move_uploaded_file($tempname, $folder);

    $linkname = mysqli_real_escape_string($conn, $_POST['linkname']);
    $Description = mysqli_real_escape_string($conn, $_POST['Description']);
    $cuisine = mysqli_real_escape_string($conn, $_POST['cuisine']);

    $query = "INSERT INTO add_foodlink (img, linkname, Description, cuisine)
              VALUES ('$folder', '$linkname', '$Description', '$cuisine')";
    $data = mysqli_query($conn, $query);

    if ($data) {
        header("Location: admin-addfoodlink.php");
        exit();
    } else {
        echo "❌ Data not inserted: " . mysqli_error($conn);
    }
}
?>
