<?php
include("db.php");
session_start();
error_reporting(0);

// 🔐 LOGIN SECTION
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user_login WHERE name='$name'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row && $password === $row['password']) 
      {
        $_SESSION["name"] = $row["name"];
        header("Location: index.php");
        exit();
      } else {
        $error = "❌ Invalid username or password!";
      }
}

// 🗝 FORGOT PASSWORD VERIFICATION
if (isset($_POST['forgot_submit'])) {

$email = trim($_POST['email'] ?? '');
$mobile = trim($_POST['mobile'] ?? '');

// Check if both fields are empty
if (empty($email) && empty($mobile)) {

    echo "<script>
            alert('Please enter your registered Email or Mobile Number.');
            window.history.back();
          </script>";

    exit();
}

// If Email is entered
if (!empty($email)) {

    $email = mysqli_real_escape_string($conn, $email);

    $query = "SELECT * FROM user_login WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        // Store user ID for password reset
        $_SESSION['reset_user_id'] = $user['id'];

        header("Location: forget password.php");
        exit();
    }
}

// If Mobile is entered
if (!empty($mobile)) {

    $mobile = mysqli_real_escape_string($conn, $mobile);

    $query = "SELECT * FROM user_login WHERE mobile='$mobile' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        // Store user ID for password reset
        $_SESSION['reset_user_id'] = $user['id'];

        header("Location: forget password.php");
        exit();
    }
}

// User not found
echo "<script>
        alert('Email or Mobile Number not found!');
        window.history.back();
      </script>";

exit();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | The Food Chain</title>
    <link rel="icon" type="image/png" href="photos/16.ico"/>
  <!-- 🔹 Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- 🔹 Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background: linear-gradient(135deg, #d4cdbfff, #eca63dff);
      color: #fff;
      font-family: "Poppins", sans-serif;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .navbar, .footer {
      background-color: #302f2fff;
    }
    .card {
      border-radius: 1.5rem;
      box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    }
    .btn-login {
      background: linear-gradient(90deg, #ff8e53, #ff6b6b);
      color: #fff;
      font-weight: 600;
      transition: 0.3s ease;
    }
    .btn-login:hover {
      opacity: 0.9;
      transform: translateY(-2px);
    }
    .footer {
      text-align: center;
      padding: 10px 0;
      margin-top: auto;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <!-- 🔹 Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">🍴 The Food Chain</a>
    </div>
  </nav>

  <!-- 🔹 Login Form -->
  <div class="container d-flex align-items-center justify-content-center flex-grow-1">
    <div class="col-md-5">
      <div class="card p-4 mt-5">
        <div class="card-body">
          <h3 class="text-center mb-4 text-dark fw-bold">Welcome Back 👋</h3>
          
          <?php if(isset($error)) { ?>
            <div class="alert alert-danger text-center"><?= $error; ?></div>
          <?php } ?>

          <form method="POST" onsubmit="return validateLogin();">
            <div class="mb-3">
              <label class="form-label text-dark fw-semibold">Username</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Enter username">
            </div>
            <div class="mb-3">
              <label class="form-label text-dark fw-semibold">Password</label>
              <div class="input-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                <span class="input-group-text" onclick="togglePass()"><i class="fa fa-eye" id="eye"></i></span>
              </div>
            </div>
            <div class="d-grid mb-3">
              <button type="submit" name="submit" class="btn btn-login">Login</button>
            </div>
            <div class="text-center">
              <a href="#" class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot Password?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

 <!-- 🔹 Forgot Password Modal -->

<div class="modal fade"
     id="forgotModal"
     tabindex="-1"
     aria-labelledby="forgotModalLabel"
     aria-hidden="true">

```
<div class="modal-dialog">

    <div class="modal-content">

        <div class="modal-header bg-dark text-white">

            <h5 class="modal-title" id="forgotModalLabel">
                Forgot Password
            </h5>

            <button type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal"
                    aria-label="Close">
            </button>

        </div>

        <div class="modal-body text-dark">

            <form method="POST" action="">

                <div class="mb-3">

                    <label for="email" class="form-label">
                        Registered Email
                    </label>

                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           placeholder="Enter your email">

                </div>

                <h6 style="text-align:center; color:#868585;">
                    OR
                </h6>

                <div class="mb-3">

                    <label for="mobile" class="form-label">
                        Registered Mobile
                    </label>

                    <input type="text"
                           class="form-control"
                           id="mobile"
                           name="mobile"
                           placeholder="Enter your mobile number">

                </div>

                <!-- IMPORTANT: type must be submit -->
                <button type="submit"
                        name="forgot_submit"
                        class="btn btn-login w-100">

                    Submit

                </button>

            </form>

        </div>

    </div>

</div>
```

</div>


  <!-- 🔹 Footer -->
  <footer class="footer bg-dark text-white">
    <p class="mb-0">© 2025 The Food Chain | Develop by JM Infotech Solution Pvt. Ltd.</p>
  </footer>

  <!-- 🔹 Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function validateLogin(){
      let name = document.getElementById("name").value.trim();
      let password = document.getElementById("password").value.trim();
      if(name === "" || password === ""){
        alert("⚠️ Both fields are required!");
        return false;
      }
      return true;
    }

    function togglePass(){
      let pass = document.getElementById("password");
      let eye = document.getElementById("eye");
      if(pass.type === "password"){
        pass.type = "text";
        eye.classList.replace("fa-eye", "fa-eye-slash");
      } else {
        pass.type = "password";
        eye.classList.replace("fa-eye-slash", "fa-eye");
      }
    }
  </script>
</body>
</html>
