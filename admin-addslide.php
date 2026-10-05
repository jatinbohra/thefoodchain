<?php 
session_start();
include("test1.php");
include("db.php");

// Fetch slides
$query = mysqli_query($conn, "SELECT * FROM add_slide");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add Slide | The Food Chain</title>
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
    <li><a href="admin-addslide.php" class="active"><i class="fas fa-images me-2"></i>Add Slide</a></li>
    <li><a href="admin-addstatemenu.php"><i class="fas fa-th me-2"></i>Add Statemenu</a></li>
    <li><a href="admin-addfoodlink.php"><i class="fas fa-clipboard-list me-2"></i>Add Food Link</a></li>
    <li><a href="admin-addrecipes.php"><i class="fas fa-book-reader me-2"></i>Add Recipes</a></li>
    <li><a href="admin-profile.php"><i class="fas fa-user me-2"></i>Profile</a></li>
    <li><a href="admin-logout.php" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
  </ul>
</div>

<!-- ===== MAIN CONTAINER ===== -->
<div class="main_container">

  <!-- Add New Slide -->
  <div class="card mb-4 p-4">
    <h4 class="mb-3 text-warning"><i class="fas fa-plus-circle me-2"></i>Add New Slide</h4>
    
    <form method="POST" enctype="multipart/form-data" action="adminslide-insert.php">
      <div class="mb-3">
        <label>Slide Path:</label>
        <input type="file" class="form-control" name="slide" required>
      </div>
      <div class="mb-3">
        <label>Slide Food Cuisine Name:</label>
        <input type="text" class="form-control" name="slidecuisine" required>
      </div>
      <div class="mb-3">
        <label>Description:</label>
        <textarea name="Description" class="form-control" rows="5"></textarea>
      </div>
      <input type="submit" name="submit" value="📌 Add Slide" class="btn btn-warning text-white">
    </form>
  </div>

  <!-- Slides Table -->
  <div class="card">
    <div class="card-header bg-white fw-bold text-primary">
      📋 Current Slides
    </div>
    <div class="card-body table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Slide</th>
            <th>Cuisine</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody id="slideTable">
          <?php
          if(mysqli_num_rows($query) > 0) {
            $count = 1;
            while($row = mysqli_fetch_assoc($query)) { ?>
              <tr id="row-<?php echo $row['id']; ?>">
                <td><?php echo $count++; ?></td>
                <td><img src="<?php echo $row['slide']; ?>" width="100" height="100" class="rounded"></td>
                <td class="cuisine"><?php echo $row['slide_cuisine']; ?></td>
                <td class="desc"><?php echo $row['Description']; ?></td>
                <td>
                  <button class="btn btn-info btn-sm editBtn"
                    data-id="<?php echo $row['id']; ?>"
                    data-slide="<?php echo $row['slide']; ?>"
                    data-cuisine="<?php echo htmlspecialchars($row['slide_cuisine']); ?>"
                    data-desc="<?php echo htmlspecialchars($row['Description']); ?>">
                    Edit
                  </button>
                </td>
                <td><a href="adminslide-delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
              </tr>
          <?php } } else { ?>
            <tr><td colspan='6' class='text-center text-muted'>No Record Found</td></tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- 🔹 Bootstrap Modal -->
<div class="modal fade" id="updateModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <form id="updateForm" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title text-primary">🖊️ Update Slide</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="edit_id">
          <div class="mb-3">
            <label>Slide (Optional):</label>
            <input type="file" class="form-control" name="slide">
          </div>
          <div class="mb-3">
            <label>Cuisine:</label>
            <input type="text" class="form-control" name="slidecuisine" id="edit_cuisine" required>
          </div>
          <div class="mb-3">
            <label>Description:</label>
            <textarea class="form-control" name="Description" id="edit_desc" rows="5"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="update" value="📌 Update Slide" class="btn btn-warning text-white">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="footer2 text-center">
  <h6 class="fw-bold text-warning">🍴 The Food Chain Admin Panel</h6>
  <p>Manage your slides and content with ease.</p>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function(){
  // Open edit modal
  $('.editBtn').click(function(){
    $('#edit_id').val($(this).data('id'));
    $('#edit_cuisine').val($(this).data('cuisine'));
    $('#edit_desc').val($(this).data('desc'));
    $('#updateModal').modal('show');
  });

  // AJAX update
  $('#updateForm').submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: 'adminslide-update.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function(response){
        try {
          var res = JSON.parse(response);
          if(res.status === 'success'){
            let id = res.data.id;
            $('#row-'+id+' .cuisine').text(res.data.slide_cuisine);
            $('#row-'+id+' .desc').text(res.data.Description);
            if(res.data.slide){
              $('#row-'+id+' img').attr('src', res.data.slide);
            }
            $('#updateModal').modal('hide');
          } else {
            alert('❌ ' + res.message);
          }
        } catch {
          alert('Unexpected error: ' + response);
        }
      }
    });
  });
});
</script>
</body>
</html>
