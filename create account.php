<?php
include("db.php");
error_reporting(0);
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $country = $_POST['country'];
  $password = $_POST['password'];

  $data = mysqli_query($conn,"INSERT INTO user_login(name,email,mobile,country,password)
  VALUES('$name','$email','$mobile','$country','$password')");
  
  if($data){
      header("Location: login page.php");
  } else {
      echo "<script>alert('Sorry, your registration was not valid');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Create Account | The Food Chain</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="photos/16.ico"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
<style>
  body {
    background: linear-gradient(135deg, #d4cdbfff, #eca63dff);
    color: #fff;
    font-family: 'Poppins', sans-serif;
  }
  .card {
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    background: #fff;
    color: #000;
  }
  .form-control {
    border-radius: 10px;
    padding: 12px;
  }
  .btn-custom {
    background: linear-gradient(90deg, #ff6b6b, #ff8e53);
    border: none;
    color: #fff;
    font-weight: 600;
    border-radius: 10px;
    transition: 0.3s;
  }
  .btn-custom:hover {
    background: linear-gradient(90deg, #ff8e53, #ff6b6b);
  }
  .footer-text {
    color: #ccc;
  }
</style>
</head>
<body>

<!-- ✅ Navbar -->
<nav class="navbar navbar-dark bg-dark navbar-expand-lg shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">
      <i class="fa-solid fa-utensils me-2"></i> The Food Chain
    </a>
  </div>
</nav>

<!-- ✅ Create Account Form -->
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card p-4">
        <h3 class="text-center mb-4"><i class="fa-solid fa-user-plus me-2"></i>Create Account</h3>
        <form method="post" onsubmit="return validation()">
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Your name...">
            <span id="usererror" class="text-danger small"></span>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Your email address...">
            <span id="emailerror" class="text-danger small"></span>
          </div>

          <div class="mb-3">
            <label class="form-label">Mobile No.</label>
            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Your mobile number...">
            <span id="mobileerror" class="text-danger small"></span>
          </div>

          <div class="mb-3">
            <label class="form-label">Country</label>
            <select id="country" name="country" class="form-select">
              <option selected disabled>-- Select Country --</option>
              <option value="India">India</option>
              <option value="Australia">Australia</option>
              <option value="Canada">Canada</option>
              <option value="USA">USA</option>
            </select>
            <span id="countryerror" class="text-danger small"></span>
          </div>

          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="New Password">
            <span id="passworderror" class="text-danger small"></span>
          </div>

          <div class="mb-3">
            <label class="form-label">Repeat Password</label>
            <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Repeat Password">
            <span id="cpassworderror" class="text-danger small"></span>
          </div>

          <input type="submit" name="submit" class="btn btn-custom w-100" value="Submit">
          <p class="mt-3 text-center">Already have an account?
            <a href="login page.php" class="text-decoration-none fw-bold">Login</a>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- ✅ Footer -->
<footer class="text-center py-4 bg-dark mt-5">
  <p class="footer-text mb-0">&copy; The Food Chain | Develop by JM Infotech Solution Pvt. Ltd.</p>
</footer>

<script>
function validation(){
  let name = document.getElementById('name').value.trim();
  let email = document.getElementById('email').value.trim();
  let mobile = document.getElementById('mobile').value.trim();
  let country = document.getElementById('country').value;
  let password = document.getElementById('password').value;
  let cpassword = document.getElementById('cpassword').value;

  let namecheck=/^[A-Za-z. ]{3,30}$/;
  let emailcheck=/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
  let mobilecheck=/^[0-9]{10}$/;
  let passwordcheck=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,16}$/;

  if(!namecheck.test(name)){
    document.getElementById('usererror').innerText="* Invalid name";
    return false;
  }
  if(!emailcheck.test(email)){
    document.getElementById('emailerror').innerText="* Invalid email address";
    return false;
  }
  if(!mobilecheck.test(mobile)){
    document.getElementById('mobileerror').innerText="* Invalid mobile number";
    return false;
  }
  if(country === "-- Select Country --"){
    document.getElementById('countryerror').innerText="* Please select a country";
    return false;
  }
  if(!passwordcheck.test(password)){
    document.getElementById('passworderror').innerText="* Password must be 8–16 chars with letters & numbers";
    return false;
  }
  if(password !== cpassword){
    document.getElementById('cpassworderror').innerText="* Passwords do not match";
    return false;
  }
  return true;
}
</script>

</body>
</html>
