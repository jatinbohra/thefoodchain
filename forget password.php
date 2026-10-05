<?php
include("db.php");
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check whether the user has been verified from Forgot Password
if (!isset($_SESSION['reset_user_id'])) {
    header("Location: login page.php");
    exit();
}

$success = "";
$error = "";

// RESET PASSWORD
if (isset($_POST['submit'])) {

    $password = trim($_POST['password'] ?? '');
    $cpassword = trim($_POST['cpassword'] ?? '');

    // Check empty fields
    if (empty($password) || empty($cpassword)) {

        $error = "Please fill in both password fields.";

    }
    // Minimum password length
    elseif (strlen($password) < 6) {

        $error = "Password must contain at least 6 characters.";

    }
    // Check password match
    elseif ($password !== $cpassword) {

        $error = "Passwords do not match.";

    }
    else {

        // Get user ID from session
        $user_id = (int) $_SESSION['reset_user_id'];

        /*
        ------------------------------------------------
        CURRENT PROJECT LOGIN SYSTEM USES PLAIN PASSWORD
        ------------------------------------------------

        Your login page currently checks:

        $password === $row['password']

        Therefore, this update stores the password normally.

        For better security, later you should use password_hash()
        and password_verify().
        */

        $password = mysqli_real_escape_string($conn, $password);

        $query = "UPDATE user_login
                  SET password='$password'
                  WHERE id='$user_id'
                  LIMIT 1";

        $data = mysqli_query($conn, $query);

        if ($data) {

            // Remove reset session
            unset($_SESSION['reset_user_id']);

            $success = "Password reset successfully! Redirecting to login page...";

            header("refresh:2; url=login page.php");

        } else {

            $error = "Password could not be updated. Please try again.";

        }
    }
}
?>

<!DOCTYPE html>

<html lang="en">

<head>


<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Reset Password | The Food Chain</title>

<link rel="icon"
      type="image/png"
      href="photos/16.ico">

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

    body {
        background: linear-gradient(135deg, #d4cdbfff, #eca63dff);
        color: #fff;
        font-family: "Poppins", sans-serif;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* Navbar */

    .navbar,
    .footer {
        background-color: #302f2fff;
    }

    /* Reset Password Card */

    .reset-card {
        border: none;
        border-radius: 1.5rem;
        box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        overflow: hidden;
    }

    .card-body {
        padding: 2rem;
    }

    /* Button */

    .btn-login {
        background: linear-gradient(90deg, #ff8e53, #ff6b6b);
        color: #fff;
        font-weight: 600;
        border: none;
        transition: 0.3s ease;
        padding: 12px;
    }

    .btn-login:hover {
        color: #fff;
        opacity: 0.9;
        transform: translateY(-2px);
    }

    /* Input */

    .form-control {
        padding: 12px;
    }

    .input-group-text {
        cursor: pointer;
        background-color: #f8f9fa;
    }

    /* Footer */

    .footer {
        text-align: center;
        padding: 10px 0;
        margin-top: auto;
        font-size: 14px;
    }

    /* Password Requirements */

    .password-info {
        font-size: 13px;
        color: #777;
    }

</style>


</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg navbar-dark">


<div class="container">

    <a class="navbar-brand fw-bold"
       href="index.php">

        🍴 The Food Chain

    </a>

</div>


</nav>

<!-- RESET PASSWORD SECTION -->

<div class="container d-flex align-items-center justify-content-center flex-grow-1">
<div class="col-md-5 col-lg-5">

    <div class="card reset-card mt-5 mb-5">

        <div class="card-body">

            <!-- Icon -->

            <div class="text-center mb-3">

                <div style="
                    width:70px;
                    height:70px;
                    margin:auto;
                    border-radius:50%;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    font-size:30px;
                    background:linear-gradient(90deg,#ff8e53,#ff6b6b);
                    color:white;
                ">

                    <i class="fa-solid fa-lock"></i>

                </div>

            </div>


            <h3 class="text-center mb-2 text-dark fw-bold">

                Reset Password 🔐

            </h3>


            <p class="text-center text-muted mb-4">

                Create a new secure password for your account.

            </p>


            <!-- ERROR MESSAGE -->

            <?php if (!empty($error)) { ?>

                <div class="alert alert-danger text-center">

                    <?php echo $error; ?>

                </div>

            <?php } ?>


            <!-- SUCCESS MESSAGE -->

            <?php if (!empty($success)) { ?>

                <div class="alert alert-success text-center">

                    <?php echo $success; ?>

                </div>

            <?php } ?>


            <!-- FORM -->

            <form method="POST"
                  id="resetForm"
                  onsubmit="return validatePassword();">


                <!-- NEW PASSWORD -->

                <div class="mb-3">

                    <label class="form-label text-dark fw-semibold">

                        New Password

                    </label>


                    <div class="input-group">

                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control"
                               placeholder="Enter new password"
                               required>


                        <span class="input-group-text"
                              onclick="togglePassword('password','eye1')">

                            <i class="fa-solid fa-eye"
                               id="eye1">
                            </i>

                        </span>

                    </div>


                    <div class="password-info mt-2">

                        Password must contain at least 6 characters.

                    </div>

                </div>


                <!-- CONFIRM PASSWORD -->

                <div class="mb-3">

                    <label class="form-label text-dark fw-semibold">

                        Confirm Password

                    </label>


                    <div class="input-group">

                        <input type="password"
                               id="cpassword"
                               name="cpassword"
                               class="form-control"
                               placeholder="Confirm new password"
                               required>


                        <span class="input-group-text"
                              onclick="togglePassword('cpassword','eye2')">

                            <i class="fa-solid fa-eye"
                               id="eye2">
                            </i>

                        </span>

                    </div>


                    <div id="passwordMessage"
                         class="small mt-2">
                    </div>

                </div>


                <!-- BUTTON -->

                <div class="d-grid">

                    <button type="submit"
                            name="submit"
                            class="btn btn-login">

                        <i class="fa-solid fa-key me-2"></i>

                        Reset Password

                    </button>

                </div>


                <!-- BACK LOGIN -->

                <div class="text-center mt-3">

                    <a href="login page.php"
                       class="text-decoration-none">

                        <i class="fa-solid fa-arrow-left me-1"></i>

                        Back to Login

                    </a>

                </div>


            </form>

        </div>

    </div>

</div>


</div>

<!-- FOOTER -->

<footer class="footer bg-dark text-white">
<p class="mb-0">

    © 2025 The Food Chain |
    Developed by JM Infotech Solution Pvt. Ltd.

</p>

</footer>

<!-- BOOTSTRAP -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>


/* SHOW / HIDE PASSWORD */

function togglePassword(inputId, eyeId) {

    let passwordInput = document.getElementById(inputId);

    let eyeIcon = document.getElementById(eyeId);


    if (passwordInput.type === "password") {

        passwordInput.type = "text";

        eyeIcon.classList.remove("fa-eye");

        eyeIcon.classList.add("fa-eye-slash");

    } else {

        passwordInput.type = "password";

        eyeIcon.classList.remove("fa-eye-slash");

        eyeIcon.classList.add("fa-eye");

    }

}


/* PASSWORD VALIDATION */

function validatePassword() {

    let password = document.getElementById("password").value.trim();

    let cpassword = document.getElementById("cpassword").value.trim();


    // Check minimum length

    if (password.length < 6) {

        alert("Password must contain at least 6 characters.");

        return false;

    }


    // Check password match

    if (password !== cpassword) {

        alert("Passwords do not match.");

        return false;

    }


    return true;

}


/* LIVE PASSWORD MATCH CHECK */

document.getElementById("cpassword").addEventListener("keyup", function() {

    let password = document.getElementById("password").value;

    let cpassword = this.value;

    let message = document.getElementById("passwordMessage");


    if (cpassword === "") {

        message.innerHTML = "";

    }

    else if (password === cpassword) {

        message.innerHTML = "✓ Passwords match";

        message.style.color = "green";

    }

    else {

        message.innerHTML = "✗ Passwords do not match";

        message.style.color = "red";

    }

});


</script>

</body>

</html>
