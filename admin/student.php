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
        <h4 class="mb-0">Student Management</h4>
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
      if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success">
        Student registered successfully!
    </div>
<?php endif;
 ?>
 <?php
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
    unset($_SESSION['error']);
}
?>



      <!-- Student Table Section -->
      <div class="d-flex justify-content-between align-items-center mb-4 px-4">
  <h4 class="mb-0">Student List</h4>
  <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addStudentModal">
    <i class="fas fa-user-plus me-1"></i> Add Student
  </button>
</div>

<div class="container">
  <div class="card shadow-sm">
    <div class="card-body">
      <table class="table table-bordered table-hover">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Student ID</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Course</th>
            <th>Profile Image</th>
            <th>Approved</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="studentTable">
          <?php
          include '../connection.php';
          
          $students = [];
          $sql = "SELECT * FROM students ORDER BY id DESC";
          $result = $connect->query($sql);

          if ($result && $result->num_rows > 0) {
              $students = $result->fetch_all(MYSQLI_ASSOC);
          }

          if (!empty($students)):
            $serial = 1;
            foreach ($students as $student):
          ?>
          <tr>
            <td><?php echo $serial++; ?></td>
            <td><?php echo htmlspecialchars($student['student_id']); ?></td>
            <td><?php echo htmlspecialchars($student['student_name']); ?></td>
            <td><?php echo htmlspecialchars($student['father_name']); ?></td>
            <td><?php echo htmlspecialchars($student['mobile']); ?></td>
            <td><?php echo htmlspecialchars($student['email']); ?></td>
            <td><?php echo htmlspecialchars($student['course']); ?></td>
            <td>
              <?php if (!empty($student['profile_image'])): ?>
                <img src="../uploads/<?php echo htmlspecialchars($student['profile_image']); ?>" alt="Profile" width="50">
              <?php else: ?>
                <span class="text-muted">No Image</span>
              <?php endif; ?>
            </td>
            <td>
              <div class="form-check form-switch">
                <input class="form-check-input approve-switch" type="checkbox" role="switch" id="approveSwitch<?php echo $student['id']; ?>"
                  data-student-id="<?php echo $student['id']; ?>"
                   <?php echo $student['approved'] ? 'checked' : ''; ?>
                >
              </div>
            </td>


            <td>
              <a href="ed_del_student.php?id=<?php echo $student['id']; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
              <a href="delete_student.php?id=<?php echo $student['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="10" class="text-center text-muted">No students found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- bigger modal -->
    <form class="modal-content" action="add_student.php" method="POST" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-md-6">
            <label for="studentName" class="form-label">Full Name</label>
            <input type="text" name="student_name" class="form-control" id="studentName" required>
          </div>

          <div class="col-md-6">
            <label for="fatherName" class="form-label">Father's Name</label>
            <input type="text" name="father_name" class="form-control" id="fatherName" required>
          </div>

          <div class="col-md-6">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="tel" name="mobile" class="form-control" id="mobile" required>
          </div>

          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
          </div>

          <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
          </div>

          <div class="col-md-6">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" name="dob" class="form-control" id="dob" required>
          </div>

          <div class="col-md-6">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" id="gender" class="form-select" required>
              <option value="">Select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <div class="col-md-6">
            <label for="aadhaar" class="form-label">Aadhaar Number</label>
            <input type="text" name="aadhaar" class="form-control" id="aadhaar">
          </div>

          <div class="col-md-6">
            <label for="qualification" class="form-label">Qualification</label>
            <input type="text" name="qualification" class="form-control" id="qualification">
          </div>

          <div class="col-md-6">
            <label for="course" class="form-label">Course</label>
            <select name="course" class="form-select" id="course" required>
              <option value="">Select Course</option>
              
              
              <?php
    

    // Fetch all course categories
    $categoryQuery = "SELECT * FROM course_category ORDER BY category_name ASC";
    $categoryResult = mysqli_query($connect, $categoryQuery);

    if (mysqli_num_rows($categoryResult) > 0) {
      while ($category = mysqli_fetch_assoc($categoryResult)) {
        echo '<optgroup label="' . htmlspecialchars($category['category_name']) . '">';

        // Fetch courses under this category
        $courseQuery = "SELECT * FROM course WHERE category_id = " . intval($category['category_id']);
        $courseResult = mysqli_query($connect, $courseQuery);

        if (mysqli_num_rows($courseResult) > 0) {
          while ($course = mysqli_fetch_assoc($courseResult)) {
            echo '<option value="' . htmlspecialchars($course['course_title']) . '">' . htmlspecialchars($course['course_title']) . '</option>';
          }
        } else {
          echo '<option disabled>No courses available</option>';
        }

        echo '</optgroup>';
      }
    } else {
      echo '<option disabled>No course categories found</option>';
    }
    ?>
            </select>
          </div>

          <div class="col-md-6">
            <label for="caste" class="form-label">Caste</label>
            <input type="text" name="caste" class="form-control" id="caste">
          </div>

          <div class="col-md-6">
            <label for="religion" class="form-label">Religion</label>
            <input type="text" name="religion" class="form-control" id="religion">
          </div>

          <div class="col-md-6">
            <label for="nationality" class="form-label">Nationality</label>
            <input type="text" name="nationality" class="form-control" id="nationality" value="Indian">
          </div>

          <div class="col-md-6">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="city">
          </div>

          <div class="col-md-6">
            <label for="district" class="form-label">District</label>
            <input type="text" name="district" class="form-control" id="district">
          </div>

          <div class="col-md-6">
            <label for="state" class="form-label">State</label>
            <input type="text" name="state" class="form-control" id="state">
          </div>

          <div class="col-md-6">
            <label for="pinCode" class="form-label">Pin Code</label>
            <input type="text" name="pin_code" class="form-control" id="pinCode">
          </div>

          <div class="col-md-12">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" class="form-control" rows="2"></textarea>
          </div>

          <div class="col-md-12">
            <label for="profileImage" class="form-label">Profile Image</label>
            <input type="file" name="profile_image" class="form-control" id="profileImage" accept="image/*">
          </div>
        </div> <!-- row -->
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save Student</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
  </div>
</div>







    </div> <!-- End col-md-10 -->
  </div> <!-- End row -->
</div> <!-- End container-fluid -->


<script>
document.querySelectorAll('.approve-switch').forEach(function(switchInput) {
    switchInput.addEventListener('change', function() {
        const studentId = this.getAttribute('data-student-id');
        const approved = this.checked ? 1 : 0;

        fetch('update_approve.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `student_id=${studentId}&approved=${approved}`
        })
        .then(response => response.text())
        .then(data => {
            Swal.fire({
                title: 'Success!',
                text: data,
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                location.reload(); // Reload after user clicks OK
            });
        })
        .catch(error => {
            Swal.fire({
                title: 'Error!',
                text: 'Something went wrong. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            console.error('Error:', error);
        });
    });
});
</script>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script/add.js"></script>


</body>
</html>