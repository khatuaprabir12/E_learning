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
    <a class="nav-link" href="dashboard.php"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
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
          <h4 class="mb-0">Course Management</h4>
     <!-- User Profile Icon with Dropdown -->
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle fa-2x text-muted"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                <li><a class="dropdown-item" href="settings.php"><i class="fas fa-cog me-2"></i>Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
            </ul>
        </div>
    </div>
    
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Course Management</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                <i class="fas fa-plus"></i> Add New Course
            </button>
    </div>

    <!-- Courses Table -->
    <div class="card">
      <div class="card-body">
        <table class="table table-bordered">
          <thead class="table-light">
            <tr>
              <th>#</th>
              <th>Course Title</th>
              <th>Description</th>
              <th>Duration</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="courseTable">
            <!-- Courses will be dynamically added here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal for Adding Course -->
  <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" id="courseForm">
        <div class="modal-header">
          <h5 class="modal-title" id="addCourseModalLabel">Add Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="courseTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="courseTitle" required>
          </div>
          <div class="mb-3">
            <label for="courseDesc" class="form-label">Description</label>
            <textarea class="form-control" id="courseDesc" rows="3" required></textarea>
          </div>
          <div class="mb-3">
            <label for="courseDuration" class="form-label">Duration (e.g., 4 weeks)</label>
            <input type="text" class="form-control" id="courseDuration" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save Course</button>
        </div>
      </form>
    </div>
  </div>

      
    </div>
  </div>
</div>

<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script/js.js"></script>
</body>
</html>
