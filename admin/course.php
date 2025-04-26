<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Students - Edufuture Admin</title>
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
        <a class="nav-link text-white active" href="student.php"><i class="bi bi-people-fill me-2"></i>Students</a>
        <a class="nav-link text-white" href="course.php"><i class="bi bi-journal-code me-2"></i>Courses</a>
        <a class="nav-link text-white" href="#"><i class="bi bi-bar-chart-line-fill me-2"></i>Reports</a>
        <a class="nav-link text-white" href="notice.php"><i class="bi bi-bell-fill me-2"></i>Notice</a>
        <a class="nav-link text-white" href="settings.php"><i class="bi bi-gear-fill me-2"></i>Settings</a>
      </nav>
    </div>

    <!-- Main content -->
    <div class="col-md-10">
      <!-- Header -->
      <div class="dashboard-header d-flex justify-content-between align-items-center mb-4 px-4 py-3 bg-info text-white rounded shadow-sm">
        <h4 class="mb-0">Course Management</h4>
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

      <?php
      session_start();

      // Error view
      if (isset($_SESSION['success'])) {
          echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
          unset($_SESSION['success']);
      }
      if (isset($_SESSION['error'])) {
          echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
          unset($_SESSION['error']);
      }

      // Include your database connection
      include 'connection.php'; // Correct path

      // Fetch categories from database
      $categories = [];
      $sql = "SELECT * FROM course_category ORDER BY category_id DESC"; // latest first
      $result = $connect->query($sql);

      if ($result && $result->num_rows > 0) {
          $categories = $result->fetch_all(MYSQLI_ASSOC);
      }
      ?>

      <!-- Student Table Section -->
      <div class="d-flex justify-content-between align-items-center mb-4 px-4">
        <h4 class="mb-0">Category List</h4>
        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
          <i class="fas fa-plus-circle me-1"></i> Add Category
        </button>
      </div>

      <div class="container">
        <div class="card shadow-sm">
          <div class="card-body">
            <table class="table table-bordered table-hover">
              <thead class="table-light">
                <tr>
                  <th>Serial No.</th>
                  <th>Category Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="categoryTableBody">
                <?php if (!empty($categories)): ?>
                  <?php $serial = 1; ?>
                  <?php foreach ($categories as $category): ?>
                    <tr>
                      <td><?php echo $serial++; ?></td>
                      <td><?php echo htmlspecialchars($category['category_name']); ?></td>
                      <td>
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editCategoryModal<?php echo $category['category_id']; ?>"><i class="fas fa-edit"></i> Edit</button>
                        <a href="delete_category.php?id=<?php echo $category['category_id']; ?>"  class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">
                          <i class="fas fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="3" class="text-center text-muted">No categories available.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Add Category Modal -->
      <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form action="category_submit.php" method="POST" class="modal-content" id="categoryForm">
            <div class="modal-header">
              <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <input type="text" class="form-control mb-3" id="categoryName" name="categoryName" placeholder="Enter Category Name" required />
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save Category</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Edit Category Modal -->
      <?php foreach ($categories as $category): ?>
        <div class="modal fade" id="editCategoryModal<?php echo $category['category_id']; ?>" tabindex="-1" aria-labelledby="editCategoryModalLabel<?php echo $category['category_id']; ?>" aria-hidden="true">
          <div class="modal-dialog">
            <form action="edit_category.php" method="POST" class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel<?php echo $category['category_id']; ?>">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <input type="hidden" name="category_id" value="<?php echo $category['category_id']; ?>">
                <input type="text" class="form-control mb-3" name="categoryName" value="<?php echo htmlspecialchars($category['category_name']); ?>" required />
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-warning">Update Category</button>
              </div>
            </form>
          </div>
        </div>
      <?php endforeach; ?>

    </div> <!-- End col-md-10 -->
  </div> <!-- End row -->
</div> <!-- End container-fluid -->

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
