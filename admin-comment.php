<?php
session_start();
include("db.php");
include("adminfdlink-add.php");
$data = mysqli_query($conn, "SELECT * FROM contact");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Comments | The Food Chain</title>
  <?php include("links.php"); ?>
  <link rel="icon" type="image/png" href="photos/16.ico"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background: #fffaf2;
      font-family: 'Poppins', sans-serif;
    }

    /* ===== HEADER ===== */
    .top_navbar {
      width: 100%;
      height: 70px;
      position: fixed;
      top: 0;
      left: 0;
      background: #fff;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 30px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      z-index: 10;
    }

    .logo {
      font-size: 22px;
      font-weight: 700;
      color: #e67e22;
    }

    .logo i {
      color: #d35400;
      margin-right: 10px;
    }

    .top_menu ul {
      display: flex;
      align-items: center;
      margin: 0;
      padding: 0;
    }

    .top_menu ul li {
      list-style: none;
      margin-left: 15px;
    }

    .top_menu ul li a {
      color: #555;
      text-decoration: none;
      font-size: 18px;
      transition: 0.3s;
    }

    .top_menu ul li a:hover {
      color: #d35400;
    }

    /* ===== SIDEBAR ===== */
    .sidebar {
      position: fixed;
      top: 70px;
      left: 0;
      width: 240px;
      height: calc(100% - 70px);
      background: #fff;
      border-right: 1px solid #eee;
      padding-top: 20px;
      transition: 0.3s;
    }

    .sidebar ul {
      padding-left: 0;
    }

    .sidebar ul li a {
      display: block;
      padding: 14px 20px;
      color: #333;
      font-weight: 500;
      text-decoration: none;
      transition: 0.3s;
      border-left: 4px solid transparent;
    }

    .sidebar ul li a:hover,
    .sidebar ul li a.active {
      background: #ffe9cc;
      border-left: 4px solid #e67e22;
      color: #d35400;
    }

    /* ===== MAIN CONTAINER ===== */
    .main_container {
      margin-left: 250px;
      margin-top: 90px;
      padding: 20px 30px;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .card-header {
      font-weight: 600;
      color: #d35400;
      background: #fff8e6 !important;
    }

    .table thead {
      background-color: #d35400 !important;
      color: white;
    }

    .table td,
    .table th {
      vertical-align: middle;
    }

    .btn-danger {
      background-color: #e74c3c;
      border: none;
    }

    .btn-primary {
      background-color: #e67e22;
      border: none;
    }

    .btn-primary:hover {
      background-color: #d35400;
    }

    .footer2 {
      background: #fff;
      border-top: 1px solid #eee;
      padding: 25px;
      margin-top: 50px;
      color: #666;
      font-size: 15px;
    }
  </style>
</head>

<body>
<!-- ===== HEADER ===== -->
<div class="top_navbar">
  <div class="logo"><i class="fas fa-utensils"></i> The Food Chain</div>
  <div class="top_menu">
    <ul>
      <li><a href="admin-comment.php"><i class="far fa-bell"></i></a></li>
      <li><a href="admin-profile.php"><i class="fas fa-user-circle"></i></a></li>
      <li class="ms-2 fw-semibold text-muted">
        <?php echo isset($_SESSION['uname']) ? $_SESSION['uname'] : "Admin"; ?>
      </li>
    </ul>
  </div>
</div>

<!-- ===== SIDEBAR ===== -->
<div class="sidebar">
  <ul>
    <li><a href="admin-dashboard.php"><i class="fas fa-chart-line me-2"></i>Dashboard</a></li>
    <li><a href="admin-addslide.php"><i class="fas fa-images me-2"></i>Add Slide</a></li>
    <li><a href="admin-addstatemenu.php"><i class="fas fa-th me-2"></i>Add New Statemenu</a></li>
    <li><a href="admin-addfoodlink.php"><i class="fas fa-clipboard-list me-2"></i>Add Food Post Link</a></li>
    <li><a href="admin-addrecipes.php"><i class="fas fa-book-reader me-2"></i>Add New Recipes</a></li>
    <li><a href="admin-profile.php"><i class="fas fa-user me-2"></i>Admin Profile</a></li>
    <li><a href="admin-comment.php" class="active"><i class="far fa-comments me-2"></i>User Comments</a></li>
    <li><a href="admin-logout.php" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
  </ul>
</div>

<!-- ===== MAIN CONTAINER ===== -->
<div class="main_container">
  <div class="card">
    <div class="card-header">
      <i class="far fa-comments me-2"></i> Display Users Comments
    </div>
    <div class="card-body">
      <table class="table table-bordered table-hover align-middle">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Country</th>
            <th scope="col">Message</th>
            <th scope="col">Delete</th>
            <th scope="col">Reply</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if (mysqli_num_rows($data)) {
          $count = 1;
          while ($r = mysqli_fetch_array($data)) {
            echo "<tr>
              <th>{$count}</th>
              <td>{$r['name']}</td>
              <td>{$r['email']}</td>
              <td>{$r['country']}</td>
              <td>{$r['message']}</td>
              <td>
                <a href='adminfdlink-delete.php?id={$r['id']}' class='btn btn-danger btn-sm text-white'>
                  <i class='fas fa-trash-alt'></i> Delete
                </a>
              </td>
              <td>
                <button class='btn btn-primary btn-sm'>
                  <i class='fas fa-reply'></i> Reply 📲
                </button>
              </td>
            </tr>";
            $count++;
          }
        } else {
          echo "<tr><td colspan='7' class='text-center text-muted'>No Record Found</td></tr>";
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="footer2 text-center mt-5">
    <h6 class="fw-bold text-warning">🍴 The Food Chain Admin Panel</h6>
    <p>Manage and reply to user messages directly from your dashboard.</p>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
