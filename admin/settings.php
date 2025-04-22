<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Settings - Edufuture Admin</title>
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
        <a class="nav-link text-white" href="student.php"><i class="bi bi-people-fill me-2"></i>Students</a>
        <a class="nav-link text-white" href="course.php"><i class="bi bi-journal-code me-2"></i>Courses</a>
        <a class="nav-link text-white" href="#"><i class="bi bi-bar-chart-line-fill me-2"></i>Reports</a>
        <a class="nav-link text-white" href="notice.php"><i class="bi bi-bell-fill me-2"></i>Notice</a>
        <a class="nav-link text-white" href="setting.php"><i class="bi bi-gear-fill me-2"></i>Settings</a>
      </nav>
    </div>

    <!-- Main Content -->
    <div class="col-md-10">
      <div class="dashboard-header d-flex justify-content-between align-items-center mb-4 px-4 py-3 bg-secondary text-white rounded shadow-sm">
        <h4 class="mb-0">Settings</h4>
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

      <div class="container px-4">
        <div class="row g-4">
          <!-- Profile Settings -->
          <div class="col-md-6">
            <div class="card shadow-sm">
              <div class="card-header bg-light">
                <h5 class="mb-0">Profile Settings</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="mb-3">
                    <label for="adminName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="adminName" value="Admin">
                  </div>
                  <div class="mb-3">
                    <label for="adminEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="adminEmail" value="admin@edufuture.com">
                  </div>
                  <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
              </div>
            </div>
          </div>

          <!-- Password Settings -->
          <div class="col-md-6">
            <div class="card shadow-sm">
              <div class="card-header bg-light">
                <h5 class="mb-0">Change Password</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="mb-3">
                    <label for="currentPassword" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="currentPassword">
                  </div>
                  <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword">
                  </div>
                  <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirmPassword">
                  </div>
                  <button type="submit" class="btn btn-success">Update Password</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Notification Preferences -->
        <div class="row mt-4">
          <div class="col-md-12">
            <div class="card shadow-sm">
              <div class="card-header bg-light">
                <h5 class="mb-0">Notification Preferences</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="notifyEmail" checked>
                    <label class="form-check-label" for="notifyEmail">Receive email notifications</label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="notifySMS">
                    <label class="form-check-label" for="notifySMS">Receive SMS alerts</label>
                  </div>
                  <button type="submit" class="btn btn-info">Save Preferences</button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div> <!-- /container -->
    </div>
  </div>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
