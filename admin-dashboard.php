<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Dashboard | The Food Chain</title>
<?php include("links.php"); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="icon" type="image/png" href="photos/16.ico"/>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
body {
  background: #fffaf2;
  font-family: 'Poppins', sans-serif;
}
.wrapper {
  margin: 0;
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
.sidebar ul li a:hover {
  background: #ffe9cc;
  border-left: 4px solid #e67e22;
  color: #d35400;
}
.main_container {
  margin-left: 250px;
  margin-top: 80px;
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
.footer2 {
  background: #fff;
  border-top: 1px solid #eee;
  padding: 25px;
  margin-top: 50px;
  color: #666;
  font-size: 15px;
}
.toast-container {
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 20;
}
</style>
</head>
<body>

<div class="wrapper">

  <!-- ========== HEADER ========== -->
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

  <!-- ========== SIDEBAR ========== -->
  <div class="sidebar">
    <ul>
      <li><a href="admin-dashboard.php"><i class="fas fa-chart-line me-2"></i>Dashboard</a></li>
    <li><a href="admin-addslide.php"><i class="fas fa-images me-2"></i>Add Slide</a></li>
    <li><a href="admin-addstatemenu.php"><i class="fas fa-th me-2"></i>Add New Statemenu</a></li>
    <li><a href="admin-addfoodlink.php"><i class="fas fa-clipboard-list me-2"></i>Add Food Post Link</a></li>
    <li><a href="admin-addrecipes.php"><i class="fas fa-book-reader me-2"></i>Add New Recipes</a></li>
    <li><a href="admin-profile.php"><i class="fas fa-user me-2"></i>Admin Profile</a></li>
    <li><a href="admin-comment.php"><i class="far fa-comments me-2"></i>User Comments</a></li>
    <li><a href="admin-logout.php" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
  </ul>
  </div>

  <!-- ========== MAIN CONTENT ========== -->
  <div class="main_container">
    <h3 class="mb-4"><b>📊 Dashboard Overview</b></h3>

    <!-- Summary Cards -->
    <div class="row g-3 mb-4">
      <div class="col-md-2">
        <div class="card bg-warning text-white text-center p-3">
          <i class="far fa-images fs-2"></i>
          <p class="mb-0">Slides</p>
          <h4>4</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card bg-info text-white text-center p-3">
          <i class="fab fa-buromobelexperte fs-2"></i>
          <p class="mb-0">Statemenus</p>
          <h4>4</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card bg-success text-white text-center p-3">
          <i class="fas fa-clipboard-list fs-2"></i>
          <p class="mb-0">Posts</p>
          <h4>4</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card bg-danger text-white text-center p-3">
          <i class="fas fa-book-reader fs-2"></i>
          <p class="mb-0">Recipes</p>
          <h4>4</h4>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card bg-dark text-white text-center p-3">
          <i class="fas fa-users fs-2"></i>
          <p class="mb-0">Visitors</p>
          <h4>100</h4>
        </div>
      </div>
    </div>

    <!-- Row: Map + Table -->
    <div class="row">
      <div class="col-md-5 mb-3">
        <div class="card">
          <div class="card-header">📍 India Map</div>
          <div class="card-body">
            
		<div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3" width="100%" height="250" style="border:0">
			<div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
        		var setting = {"query":"India","width":800,"height":345,"satellite":true,"zoom":3,"placeId":"ChIJkbeSa_BfYzARphNChaFPjNc","cid":"0xd78c4fa1854213a6","coords":[20.593684,78.96288],"cityUrl":"/india/jamb-323010","cityAnchorText":"Map of Jāmb, Maharashtra, India","lang":"en","queryString":"India","centerCoord":[20.593684,78.96288],"id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"1306092"};
        		var d = document;
        		var s = d.createElement('script');
        		s.src = 'https://1map.com/js/script-for-user.js?embed_id=1306092';
        		s.async = true;
        		s.onload = function (e) {
        		window.OneMap.initMap(setting)
        		};
        		var to = d.getElementsByTagName('script')[0];
        		to.parentNode.insertBefore(s, to);
      			})();</script>
			</div>
          </div>
        </div>
      </div>

      <div class="col-md-7 mb-3">
        <div class="card">
          <div class="card-header">📋 Database Tables</div>
          <div class="card-body table-responsive">
            <table class="table table-bordered table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th>ID</th>
                  <th>Table</th>
                  <th>Rows</th>
                  <th>Panel</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>1</td><td>add_foodlink</td><td>4</td><td>User</td></tr>
                <tr><td>2</td><td>add_recipes</td><td>4</td><td>User</td></tr>
                <tr><td>3</td><td>add_slide</td><td>4</td><td>User</td></tr>
                <tr><td>4</td><td>add_statemenu</td><td>5</td><td>User</td></tr>
                <tr><td>5</td><td>adminlogin</td><td>1</td><td>Admin</td></tr>
                <tr><td>6</td><td>contact</td><td>7</td><td>User</td></tr>
                <tr><td>7</td><td>user_login</td><td>3</td><td>User</td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Row: Chart + Quick Actions -->
    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card p-3">
          <h6 class="card-title">📈 Weekly Orders Chart</h6>
          <canvas id="ordersChart" height="200"></canvas>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card p-3">
          <h6 class="card-title">⚙️ Quick Actions</h6>
          <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-outline-warning" onclick="showToast()">+ Add Recipe</button>
            <button class="btn btn-outline-success" onclick="showToast()">+ Add Post</button>
            <button class="btn btn-outline-info" onclick="showToast()">Update Slide</button>
            <button class="btn btn-outline-danger" onclick="showToast()">Delete Menu</button>
          </div>
        </div>
      </div>
    </div>

    <div class="footer2 text-center mt-5">
      <h5 class="fw-bold text-warning">🍴 Welcome to The Food Chain Admin Panel</h5>
      <p>Manage your site content — Add, Update, or Delete Slides, Menus, Recipes, and more!</p>
    </div>

  </div>
</div>

<!-- Toast Notification -->
<div class="toast-container">
  <div id="actionToast" class="toast align-items-center text-bg-success border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body">✅ Action completed successfully!</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Chart.js Example
const ctx = document.getElementById('ordersChart');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
    datasets: [{
      label: 'Orders',
      data: [12, 19, 8, 15, 22, 30, 25],
      borderColor: '#e67e22',
      backgroundColor: '#fdebd0',
      tension: 0.4
    }]
  },
  options: { responsive: true, plugins: { legend: { display: false } } }
});

// Toast Function
function showToast() {
  const toast = new bootstrap.Toast(document.getElementById('actionToast'));
  toast.show();
}
</script>
</body>
</html>
