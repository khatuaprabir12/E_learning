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
      include '../connection.php'; // Correct path

      // Fetch categories from database
      $categories = [];
      $sql = "SELECT * FROM course_category ORDER BY category_id DESC"; // latest first
      $result = $connect->query($sql);

      if ($result && $result->num_rows > 0) {
          $categories = $result->fetch_all(MYSQLI_ASSOC);
      }
      ?>
 
<?php
// Fetch courses from database
$courses = [];
$sql = "SELECT c.*, cat.category_name 
        FROM course c
        JOIN course_category cat ON c.category_id = cat.category_id
        ORDER BY c.course_id DESC";

$result = $connect->query($sql);

if ($result && $result->num_rows > 0) {
    $courses = $result->fetch_all(MYSQLI_ASSOC);
}
?>


      <!-- course category Section -->
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
      

      <!-- Course Section -->
      <div class="d-flex justify-content-between align-items-center my-4 px-4">
        <h4 class="mb-0">Course List</h4>
          <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addCourseModal">
            <i class="fas fa-plus-circle me-1"></i> Add Course
          </button>
      </div>

<div class="container">
  <div class="card shadow-sm">
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <thead class="table-light">
          <tr>
            <th>Serial No.</th>
            <th>Course Title</th>
            <th>Course Description</th>
            <th>Course Duration</th>
            <th>Course Image</th>
            <th>Category</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="courseTableBody">
          <?php if (!empty($courses)): ?>
            <?php $serial = 1; ?>
            <?php foreach ($courses as $course): ?>
              <tr>
                <td><?php echo $serial++; ?></td>
                <td><?php echo htmlspecialchars($course['course_title']); ?></td>
                <td><?php echo htmlspecialchars($course['course_description']); ?></td>
                <td><?php echo htmlspecialchars($course['course_duration']); ?></td>
                <td>
                  <?php if (!empty($course['course_image'])): ?>
                    <img src="uploads/<?php echo htmlspecialchars($course['course_image']); ?>" alt="Course Image" width="80" height="80">
                  <?php else: ?>
                    <span class="text-muted">No image</span>
                  <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars($course['category_name']); ?></td>
                <td>
                  <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editCourseModal<?php echo $course['course_id']; ?>"><i class="fas fa-edit"></i> Edit</button>
                  <a href="delete_course.php?id=<?php echo $course['course_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?');">
                    <i class="fas fa-trash"></i> Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7" class="text-center text-muted">No courses available.</td> <!-- Correct colspan -->
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

      <!-- Add Course Modal -->
      <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="course_submit.php" method="POST" enctype="multipart/form-data" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCourseModalLabel">Add New Course</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control mb-3" name="courseName" placeholder="Enter Course Name" required />
        
        <textarea class="form-control mb-3" name="courseDescription" placeholder="Enter Course Description" rows="3" required></textarea>

        <input type="text" class="form-control mb-3" name="courseDuration" placeholder="Enter Course Duration (e.g., 3 months)" required />

        <input type="file" class="form-control mb-3" name="courseImage" accept="image/*" />

        <select class="form-select mb-3" name="categoryId" required>
          <option value="" disabled selected>Select Category</option>
          <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['category_id']; ?>"><?php echo htmlspecialchars($category['category_name']); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save Course</button>
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

   <!-- Edit Course Modals -->
<?php foreach ($courses as $course): ?>
<div class="modal fade" id="editCourseModal<?php echo $course['course_id']; ?>" tabindex="-1" aria-labelledby="editCourseModalLabel<?php echo $course['course_id']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <form action="edit_course.php" method="POST" enctype="multipart/form-data" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCourseModalLabel<?php echo $course['course_id']; ?>">Edit Course</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">

        <div class="mb-3">
          <label for="courseTitle" class="form-label">Course Title</label>
          <input type="text" class="form-control" name="course_title" value="<?php echo htmlspecialchars($course['course_title']); ?>" required>
        </div>

        <div class="mb-3">
          <label for="courseDescription" class="form-label">Course Description</label>
          <textarea class="form-control" name="course_description" rows="3" required><?php echo htmlspecialchars($course['course_description']); ?></textarea>
        </div>

        <div class="mb-3">
          <label for="courseDuration" class="form-label">Course Duration</label>
          <input type="text" class="form-control" name="course_duration" value="<?php echo htmlspecialchars($course['course_duration']); ?>" required>
        </div>

        <div class="mb-3">
          <label for="courseImage" class="form-label">Course Image</label><br>
          <?php if (!empty($course['course_image'])): ?>
            <img src="uploads/<?php echo htmlspecialchars($course['course_image']); ?>" alt="Course Image" width="50" height="50" class="mb-2">
          <?php endif; ?>
          <input type="file" class="form-control" name="course_image">
          <small class="text-muted">Leave blank if you don't want to change the image.</small>
        </div>

        <div class="mb-3">
          <label for="categoryId" class="form-label">Category</label>
          <select class="form-select" name="category_id" required>
            <option value="" disabled>Select Category</option>
            <?php foreach ($categories as $category): ?>
              <option value="<?php echo $category['category_id']; ?>" <?php echo ($category['category_name'] == $course['category_name']) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($category['category_name']); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">Update Course</button>
      </div>

    </form>
  </div>
</div>
<?php endforeach; ?>


    </div> <!-- End col-md-10 -->
  </div> <!-- End row -->
</div> <!-- End container-fluid -->


<!-- course section -->



<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
