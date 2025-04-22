<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notice Board - Edufuture Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Favicon -->
  <link rel="icon" href="image/favicon.io.ico" sizes="40x40">

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-2 sidebar bg-dark text-white p-3 min-vh-100">
      <h4 class="text-white mb-4"><i class="bi bi-mortarboard-fill me-2"></i>Edufuture Admin</h4>
      <nav class="nav flex-column">
        <a class="nav-link text-white" href="dashboard.php"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
        <a class="nav-link text-white" href="#"><i class="bi bi-people-fill me-2"></i>Students</a>
        <a class="nav-link text-white" href="course.php"><i class="bi bi-journal-code me-2"></i>Courses</a>
        <a class="nav-link text-white" href="#"><i class="bi bi-bar-chart-line-fill me-2"></i>Reports</a>
        <a class="nav-link text-white" href="notice.php"><i class="bi bi-bell-fill me-2"></i>Notice</a>
        <a class="nav-link text-white" href="settings.php"><i class="bi bi-gear-fill me-2"></i>Settings</a>
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

      <!-- Notice Management -->
      <div class="d-flex justify-content-between align-items-center mb-4 px-4">
        <h4 class="mb-0">Notice Board</h4>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNoticeModal">
          <i class="fas fa-plus me-1"></i> Add Notice
        </button>
      </div>

      <div class="px-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <table class="table table-bordered table-hover">
              <thead class="table-light">
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="noticeTable">
                <!-- Dynamic Notice Items -->
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Add Notice Modal -->
      <div class="modal fade" id="addNoticeModal" tabindex="-1" aria-labelledby="addNoticeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form class="modal-content" id="noticeForm">
            <div class="modal-header">
              <h5 class="modal-title">Add New Notice</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="noticeTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="noticeTitle" required>
              </div>
              <div class="mb-3">
                <label for="noticeDesc" class="form-label">Description</label>
                <textarea class="form-control" id="noticeDesc" rows="3" required></textarea>
              </div>
              <div class="mb-3">
                <label for="noticeDate" class="form-label">Date</label>
                <input type="date" class="form-control" id="noticeDate" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Save Notice</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- JS file for dynamic notice actions (optional) -->
<script src="script/js.js"></script>

</body>
</html>
