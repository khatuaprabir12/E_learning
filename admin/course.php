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
   <!-- Add Course 1 Button -->
<div class="text-end mt-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCourseModal1">
    <i class="fas fa-plus"></i> Add Course Type 1
  </button>
</div>

<!-- Add Course 1 Modal -->
<div class="modal fade" id="addCourseModal1" tabindex="-1" aria-labelledby="addCourseModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" id="courseForm1">
      <div class="modal-header">
        <h5 class="modal-title" id="addCourseModalLabel1">Add Course Type 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control mb-2" id="courseTitle1" placeholder="Course Title" required />
        <input type="text" class="form-control mb-2" id="categoryName1" placeholder="Category Name" required />
        <input type="text" class="form-control" id="courseDuration1" placeholder="Duration" required />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add Course</button>
      </div>
    </form>
  </div>
</div>

<!-- Course 1 Table -->
<div class="card mt-4">
  <div class="card-header bg-primary text-white">
    <h5 class="mb-0">Course Type 1 Table</h5>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Category</th>
          <th>Duration</th>
        </tr>
      </thead>
      <tbody id="tableBody1">
        <!-- Course 1 data here -->
      </tbody>
    </table>
  </div>
</div>

<hr>

<!-- Add Course 2 Button -->
<div class="text-end mt-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCourseModal2">
    <i class="fas fa-plus"></i> Add Course Type 2
  </button>
</div>

<!-- Add Course 2 Modal -->
<div class="modal fade" id="addCourseModal2" tabindex="-1" aria-labelledby="addCourseModalLabel2" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" id="courseForm2">
      <div class="modal-header">
        <h5 class="modal-title" id="addCourseModalLabel2">Add Course Type 2</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control mb-2" id="courseTitle2" placeholder="Course Title" required />
        <input type="text" class="form-control mb-2" id="categoryName2" placeholder="Category Name" required />
        <input type="text" class="form-control" id="courseDuration2" placeholder="Duration" required />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add Course</button>
      </div>
    </form>
  </div>
</div>

<!-- Course 2 Table -->
<div class="card mt-4">
  <div class="card-header bg-success text-white">
    <h5 class="mb-0">Course Type 2 Table</h5>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Category</th>
          <th>Duration</th>
        </tr>
      </thead>
      <tbody id="tableBody2">
        <!-- Course 2 data here -->
      </tbody>
    </table>
  </div>
</div>


<script>
  let count1 = 1, count2 = 1;

  document.getElementById('courseForm1').addEventListener('submit', function (e) {
    e.preventDefault();
    let row = `<tr>
                <td>${count1++}</td>
                <td>${courseTitle1.value}</td>
                <td>${categoryName1.value}</td>
                <td>${courseDuration1.value}</td>
              </tr>`;
    tableBody1.innerHTML += row;
    this.reset();
    new bootstrap.Modal(document.getElementById('addCourseModal1')).hide();
  });

  document.getElementById('courseForm2').addEventListener('submit', function (e) {
    e.preventDefault();
    let row = `<tr>
                <td>${count2++}</td>
                <td>${courseTitle2.value}</td>
                <td>${categoryName2.value}</td>
                <td>${courseDuration2.value}</td>
              </tr>`;
    tableBody2.innerHTML += row;
    this.reset();
    new bootstrap.Modal(document.getElementById('addCourseModal2')).hide();
  });
</script>


<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script/add.js"></script>
</body>
</html>