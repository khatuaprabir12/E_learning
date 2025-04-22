<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edufuture Academy Admin Dashboard</title>
  <!-- Favicon -->
  <link rel="icon" href="image/favicon.io.ico" sizes="40x40">

  <link rel="stylesheet" href="css/style.css">
  <!-- bootstrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Add this to your <head> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <!-- Cloudflare font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-2 sidebar p-3">
  <h4 class="text-white mb-4"><i class="bi bi-mortarboard-fill me-2"></i>Edufuture Admin</h4>
  <nav class="nav flex-column">
    <a class="nav-link" href="#"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
    <a class="nav-link" href="student.php"><i class="bi bi-people-fill me-2"></i>Students</a>
    <a class="nav-link" href="course.php"><i class="bi bi-journal-code me-2"></i>Courses</a>
    <a class="nav-link" href="#"><i class="bi bi-bar-chart-line-fill me-2"></i>Reports</a>
    <a class="nav-link" href="notice.php"><i class="bi bi-bell-fill me-2"></i>Notice</a>
    <a class="nav-link" href="settings.php"><i class="bi bi-gear-fill me-2"></i>Settings</a>
  </nav>
</div>


 
    <!-- Main content -->
    <div class="col-md-10">
        <div class="dashboard-header d-flex justify-content-between align-items-center mb-4 px-4 py-3 bg-info text-white rounded shadow-sm">
          <h4 class="mb-0">Welcome, Admin</h4>
     <!-- User Profile Icon with Dropdown -->
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle fa-2x text-white"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                <li><a class="dropdown-item" href="settings.php"><i class="fas fa-cog me-2"></i>Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
            </ul>
        </div>
    </div>
    
<!-- Main -->
      <div class="row g-4">
        <div class="col-md-3">
          <div class="card text-white bg-primary p-3">
            <h5>Total Users</h5>
            <h3>1,240</h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-success p-3">
            <h5>Courses</h5>
            <h3>85</h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-warning p-3">
            <h5>Instructors</h5>
            <h3>24</h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-white bg-danger p-3">
            <h5>Pending Reviews</h5>
            <h3>12</h3>
          </div>
        </div>
      </div>

      <div class="mt-5">
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
            <!-- Add more rows here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
