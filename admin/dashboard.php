<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edufuture Academy Admin Dashboard</title>

  <!-- Favicon -->
  <link rel="icon" href="image/favicon.io.ico" sizes="40x40">

  <link rel="stylesheet" href="css/style.css">
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<div class="container-fluid">
  <div class="row">

    <!-- Sidebar -->
    <div class="col-md-2 bg-dark min-vh-100 p-3">
      <h4 class="text-white mb-4"><i class="bi bi-mortarboard-fill me-2"></i>Edufuture Admin</h4>
      <nav class="nav flex-column">
        <a class="nav-link text-white" href="#"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
        <a class="nav-link text-white" href="student.php"><i class="bi bi-people-fill me-2"></i>Students</a>
        <a class="nav-link text-white" href="course.php"><i class="bi bi-journal-code me-2"></i>Courses</a>
        <a class="nav-link text-white" href="#"><i class="bi bi-bar-chart-line-fill me-2"></i>Reports</a>
        <a class="nav-link text-white" href="notice.php"><i class="bi bi-bell-fill me-2"></i>Notice</a>
        <a class="nav-link text-white" href="settings.php"><i class="bi bi-gear-fill me-2"></i>Settings</a>
      </nav>
    </div>

    <!-- Main Content -->
    <div class="col-md-10 p-4">

      <?php
      session_start();
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "edufuture_academy";

      // Database connection
      $connect = new mysqli($servername, $username, $password, $dbname);
      if ($connect->connect_error) {
          die("Connection failed: " . $connect->connect_error);
      }

      // Assume admin id = 1
      $admin_id = 1;

      // Fetch admin name
      if (!isset($_SESSION['admin_name'])) {
          $sql = "SELECT username FROM admin WHERE id = ?";
          $stmt = $connect->prepare($sql);
          $stmt->bind_param("i", $admin_id);
          $stmt->execute();
          $result = $stmt->get_result();
          $admin = $result->fetch_assoc();
          $_SESSION['admin_name'] = $admin['username'];
      }

      $adminName = $_SESSION['admin_name'];
      ?>

      <!-- Top Navbar -->
      <div class="dashboard-header d-flex justify-content-between align-items-center mb-4 px-4 py-3 bg-info text-white rounded shadow-sm">
        <h4>Welcome, <?php echo htmlspecialchars($adminName); ?></h4>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle fa-2x"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
            <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user me-2"></i>Profile</a></li>
            <li><a class="dropdown-item" href="settings.php"><i class="fas fa-cog me-2"></i>Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
          </ul>
        </div>
      </div>

      <!-- Dashboard Cards -->
      <div class="row g-4 mb-4">
        <div class="col-md-3">
          <div class="card bg-primary text-white p-3">
            <h5>Total Users</h5>
            <h3>1,240</h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card bg-success text-white p-3">
            <h5>Courses</h5>
            <h3>85</h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card bg-warning text-white p-3">
            <h5>Instructors</h5>
            <h3>24</h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card bg-danger text-white p-3">
            <h5>Pending Reviews</h5>
            <h3>12</h3>
          </div>
        </div>
      </div>

      <!-- Recent Registrations -->
      <div>
        <h5>Recent Registrations</h5>
        <table class="table table-striped table-bordered mt-3">
          <thead class="table-dark">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Course</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Riya Sharma</td>
              <td>riya@example.com</td>
              <td>Web Development</td>
              <td>2025-04-20</td>
            </tr>
            <tr>
              <td>Arjun Mehta</td>
              <td>arjun@example.com</td>
              <td>Graphic Design</td>
              <td>2025-04-18</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div> <!-- End Main Content -->
  </div> <!-- End Row -->
</div> <!-- End Container -->

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
