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
<!-- Add Category Modal (Modal 1) -->
<div class="text-end mt-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
    <i class="fas fa-plus"></i> Add Category
  </button>
</div>

<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" id="categoryForm">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control mb-2" id="categoryName" placeholder="Category Name" required />
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add Category</button>
      </div>
    </form>
  </div>
</div>

<!-- Category Table -->
<div class="card mt-4">
  <div class="card-header bg-primary text-white">
    <h5 class="mb-0">Category Table</h5>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>Category_id</th>
          <th>Category Name</th>
        </tr>
      </thead>
      <tbody id="categoryTableBody">
        <!-- Categories will be inserted here -->
      </tbody>
    </table>
  </div>
</div>

<hr>

<!-- Add Course Modal (Modal 2) -->
<div class="text-end mt-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCourseModal">
    <i class="fas fa-plus"></i> Add Course
  </button>
</div>

<div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" id="courseForm">
      <div class="modal-header">
        <h5 class="modal-title" id="addCourseModalLabel">Add Course</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control mb-2" id="courseTitle" placeholder="Course Title" required />
        <textarea class="form-control" id="courseDescription" placeholder="Course Description" rows="4" required></textarea>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add Course</button>
      </div>
    </form>
  </div>
</div>

<!-- Course Table -->
<div class="card mt-4">
  <div class="card-header bg-success text-white">
    <h5 class="mb-0">Course Table</h5>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>Course_id</th>
          <th>Course Title</th>
          <th>Course Description</th>
        </tr>
      </thead>
      <tbody id="courseTableBody">
        <!-- Courses will be inserted here -->
      </tbody>
    </table>
  </div>
</div>

<!-- JavaScript -->
<script>
  let categoryCount = 1, courseCount = 1;

  document.getElementById('categoryForm').addEventListener('submit', function (e) {
    e.preventDefault();
    let row = `<tr>
                <td>${categoryCount++}</td>
                <td>${categoryName.value}</td>
              </tr>`;
    categoryTableBody.innerHTML += row;
    this.reset();
    const categoryModal = bootstrap.Modal.getInstance(document.getElementById('addCategoryModal'));
    categoryModal.hide();
  });

  document.getElementById('courseForm').addEventListener('submit', function (e) {
    e.preventDefault();
    let row = `<tr>
                <td>${courseCount++}</td>
                <td>${courseTitle.value}</td>
                <td>${courseDescription.value}</td>
              </tr>`;
    courseTableBody.innerHTML += row;
    this.reset();
    const courseModal = bootstrap.Modal.getInstance(document.getElementById('addCourseModal'));
    courseModal.hide();
  });
</script>



<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script/add.js"></script>
</body>
</html>