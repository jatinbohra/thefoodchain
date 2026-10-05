<?php
session_start();
include("db.php");
error_reporting(0);

// Fetch all data for display
$data = mysqli_query($conn, "SELECT * FROM add_foodlink");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add Food Link | The Food Chain</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
    .logo { font-size: 22px; font-weight: 700; color: #e67e22; }
    .logo i { color: #d35400; margin-right: 10px; }
    .sidebar {
      position: fixed;
      top: 70px;
      left: 0;
      width: 240px;
      height: calc(100% - 70px);
      background: #fff;
      border-right: 1px solid #eee;
      padding-top: 20px;
    }
    .sidebar ul { padding-left: 0; }
    .sidebar ul li a {
      display: block;
      padding: 14px 20px;
      color: #333;
      text-decoration: none;
      border-left: 4px solid transparent;
      transition: 0.3s;
    }
    .sidebar ul li a:hover,
    .sidebar ul li a.active {
      background: #ffe9cc;
      border-left: 4px solid #e67e22;
      color: #d35400;
    }
    .main_container {
      margin-left: 250px;
      margin-top: 90px;
      padding: 20px 30px;
    }
    .card { border: none; border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); }
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
    <li><a href="admin-addfoodlink.php" class="active"><i class="fas fa-clipboard-list me-2"></i>Add Food Post Link</a></li>
    <li><a href="admin-addrecipes.php"><i class="fas fa-book-reader me-2"></i>Add New Recipes</a></li>
    <li><a href="admin-profile.php"><i class="fas fa-user me-2"></i>Admin Profile</a></li>
    <li><a href="admin-comment.php"><i class="far fa-comments me-2"></i>User Comments</a></li>
    <li><a href="admin-logout.php" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
  </ul>
</div>

<!-- ===== MAIN CONTENT ===== -->
<div class="main_container">
  <div class="card mb-4 p-4">
    <h4 class="mb-3 text-warning"><i class="fas fa-plus-circle me-2"></i>Add New Food Link</h4>
    <form method="post" action="adminfdlink-add.php" enctype="multipart/form-data">
      <div class="mb-3">
        <label>Food Title:</label>
        <input type="text" class="form-control" name="linkname" placeholder="Enter food title..." required>
      </div>
      <div class="mb-3">
        <label>Food Link:</label>
        <input type="text" class="form-control" name="cuisine" placeholder="Enter food page link..." required>
      </div>
      <div class="mb-3">
        <label>Food Image:</label>
        <input type="file" class="form-control" name="img" required>
      </div>
      <div class="mb-3">
        <label>Description:</label>
        <textarea name="Description" class="form-control" rows="5" placeholder="Write something..."></textarea>
      </div>
      <input type="submit" name="submit" value="📌 Add Food Link" class="btn btn-warning text-white fw-bold">
    </form>
  </div>

  <!-- Display Table -->
  <div class="card">
    <div class="card-header">📋 Display Food Link Records</div>
    <div class="card-body table-responsive">
      <table class="table table-bordered align-middle">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Link</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $count = 1;
          if(mysqli_num_rows($data) > 0) {
            while($r = mysqli_fetch_array($data)) {
        ?>
          <tr>
            <td><?= $count++; ?></td>
            <td><?= $r['linkname']; ?></td>
            <td><?= $r['Description']; ?></td>
            <td><?= $r['cuisine']; ?></td>
            <td><img src="<?= $r['img']; ?>" width="100" height="80"></td>
            <td><button class="btn btn-info btn-sm editBtn"
              data-id="<?= $r['id']; ?>"
              data-linkname="<?= $r['linkname']; ?>"
              data-description="<?= htmlspecialchars($r['Description']); ?>"
              data-cuisine="<?= $r['cuisine']; ?>"
              data-img="<?= $r['img']; ?>">Edit</button></td>
            <td><a href="adminfdlink-delete.php?id=<?= $r['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
        <?php } } else { ?>
          <tr><td colspan="7" class="text-center text-muted">No Record Found</td></tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="footer2 text-center mt-5">
    <h6 class="fw-bold text-primary">🍴 The Food Chain Admin Panel</h6>
    <p>Manage your food post links efficiently — Add, Edit, or Delete records.</p>
  </div>
</div>

<!-- ===== EDIT MODAL ===== -->
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title">Edit Food Link</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form id="updateForm" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id" id="edit_id">
          <div class="mb-3">
            <label>Food Title</label>
            <input type="text" class="form-control" name="linkname" id="edit_linkname" required>
          </div>
          <div class="mb-3">
            <label>Food Link</label>
            <input type="text" class="form-control" name="cuisine" id="edit_cuisine" required>
          </div>
          <div class="mb-3">
            <label>Description</label>
            <textarea class="form-control" name="Description" id="edit_description" rows="4"></textarea>
          </div>
          <div class="mb-3">
            <label>Food Image</label>
            <input type="file" class="form-control" name="img">
            <img id="preview_img" src="" width="120" class="mt-2 rounded">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="update" class="btn btn-warning text-white fw-bold">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
  // Show modal and fill data
  $('.editBtn').click(function() {
    $('#edit_id').val($(this).data('id'));
    $('#edit_linkname').val($(this).data('linkname'));
    $('#edit_cuisine').val($(this).data('cuisine'));
    $('#edit_description').val($(this).data('description'));
    $('#preview_img').attr('src', $(this).data('img'));
    $('#editModal').modal('show');
  });

  // AJAX update
  $('#updateForm').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      type: "POST",
      url: "adminfdlink-update.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        alert(response);
        $('#editModal').modal('hide');
        location.reload();
      }
    });
  });
});
</script>
</body>
</html>
