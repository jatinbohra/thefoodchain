<?php
include("db.php"); // your database connection file
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Insert into DB
    $query = "INSERT INTO subscribers (name, email) VALUES ('$name', '$email')";
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('🎉 Thank you for subscribing, $name!');
                window.location.href='index.php'; 
              </script>";
    } else {
        echo "<script>
                alert('❌ Subscription failed, please try again.');
                window.location.href='index.php'; 
              </script>";
    }
}
?>
