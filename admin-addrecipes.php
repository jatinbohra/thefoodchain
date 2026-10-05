<?php
session_start();
include("db.php");
$data = mysqli_query($conn, "SELECT * FROM add_recipes ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add Recipes | The Food Chain</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/png" href="photos/16.ico"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      background: #fffaf2;
      font-family: 'Poppins', sans-serif;
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

    .logo {
      font-size: 22px;
      font-weight: 700;
      color: #e67e22;
    }

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

    .sidebar ul {
      padding-left: 0;
    }

    .sidebar ul li a {
      display: block;
      padding: 14px 20px;
      color: #333;
      font-weight: 500;
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

    input[type="submit"], .btn-warning {
      background-color: #e67e22;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 8px 20px;
      transition: 0.3s;
    }

    input[type="submit"]:hover, .btn-warning:hover {
      background-color: #d35400;
    }
  </style>
</head>
<body>

<!-- ===== HEADER ===== -->
<div class="top_navbar">
  <div class="logo"><i class="fas fa-utensils"></i> The Food Chain</div>
  <div class="top_menu">
    <ul class="list-unstyled m-0 d-flex align-items-center gap-3">
      <li><a href="admin-comment.php"><i class="far fa-bell"></i></a></li>
      <li><a href="admin-profile.php"><i class="fas fa-user-circle"></i></a></li>
      <li class="fw-semibold text-muted">
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
    <li><a href="admin-addrecipes.php" class="active"><i class="fas fa-book-reader me-2"></i>Add Recipes</a></li>
    <li><a href="admin-comment.php"><i class="far fa-comments me-2"></i>User Comments</a></li>
    <li><a href="admin-logout.php" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
  </ul>
</div>

<!-- ===== MAIN CONTAINER ===== -->
<div class="main_container">

  <!-- Add Recipe Form -->
  <div class="card p-4 mb-4">
    <h4 class="text-warning mb-3"><i class="fas fa-plus-circle me-2"></i>Add New Recipe</h4>
    <form method="post" action="adminfdrecipes-add.php" enctype="multipart/form-data">
      <div class="mb-3">
        <label>Recipe Title:</label>
        <input type="text" class="form-control" name="title" placeholder="Enter recipe title..." required>
      </div>
      <div class="mb-3">
        <label>Cuisine:</label>
        <input type="text" class="form-control" name="cuisine" placeholder="Enter cuisine name..." required>
      </div>
      <div class="mb-3">
        <label>Recipe Image:</label>
        <input type="file" class="form-control" name="image" required>
      </div>
      <div class="mb-3">
        <label>Description:</label>
        <textarea name="recipes" class="form-control" rows="4" placeholder="Write recipe details..." required></textarea>
      </div>
      <input type="submit" name="submit" value="📌 Add Recipe">
    </form>
  </div>

  <!-- Table -->
  <div class="card">
    <div class="card-header">📋 Display Recipes</div>
    <div class="card-body table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Cuisine</th>
            <th>Image</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if(mysqli_num_rows($data) > 0){
            $i=1;
            while($r=mysqli_fetch_assoc($data)){
              echo "
              <tr>
                <td>$i</td>
                <td>{$r['title']}</td>
                <td>{$r['cuisine']}</td>
                <td><img src='{$r['image']}' width='90' height='90' class='rounded'></td>
                <td>{$r['recipes']}</td>
                <td><button class='btn btn-warning btn-sm editBtn text-white' data-id='{$r['id']}'>Edit</button></td>
                <td><a href='adminfdrecipes-delete.php?id={$r['id']}' class='btn btn-danger btn-sm'>Delete</a></td>
              </tr>";
              $i++;
            }
          } else {
            echo "<tr><td colspan='7' class='text-center text-muted'>No Record Found</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editForm" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title text-warning"><i class="fas fa-edit me-2"></i>Edit Recipe</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="edit_id">
          <div class="mb-3">
            <label>Recipe Title</label>
            <input type="text" class="form-control" name="title" id="edit_title" required>
          </div>
          <div class="mb-3">
            <label>Cuisine</label>
            <input type="text" class="form-control" name="cuisine" id="edit_cuisine" required>
          </div>
          <div class="mb-3">
            <label>Description</label>
            <textarea class="form-control" name="recipes" id="edit_recipes" rows="4"></textarea>
          </div>
          <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
            <img id="previewImage" src="" width="100" class="mt-2 rounded">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning text-white">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function(){
  $(document).on('click', '.editBtn', function(){
    var id = $(this).data('id');
    $.ajax({
      url: 'fetch_recipe.php',
      type: 'POST',
      data: {id:id},
      dataType: 'json',
      success: function(res){
        if(res){
          $('#edit_id').val(res.id);
          $('#edit_title').val(res.title);
          $('#edit_cuisine').val(res.cuisine);
          $('#edit_recipes').val(res.recipes);
          $('#previewImage').attr('src', res.image);
          $('#editModal').modal('show');
        } else {
          alert('No data found.');
        }
      }
    });
  });

  $('#editForm').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url: 'adminfdrecipes-update.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function(res){
        alert(res);
        $('#editModal').modal('hide');
        location.reload();
      }
    });
  });
});
</script>
</body>
</html>
