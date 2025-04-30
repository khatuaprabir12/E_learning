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
            <th>Mobile</th>
            <th>Email</th>
            <th>Course</th>
            <th>Profile Image</th>
            <th>Approved</th>
            <th>Display</th>
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
              <button 
                class="btn btn-sm btn-primary view-btn" 
                data-bs-toggle="modal" 
                data-bs-target="#viewStudentModal"
                data-id="<?php echo $student['id']; ?>"
                >
                <i class="fas fa-eye"></i>
              </button>
            </td>


            <td>
              <a href="ed_del_student.php?id=<?php echo $student['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');"><i class="fas fa-trash"></i></a>
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



<!-- Student View Modal -->
<div class="modal fade" id="viewStudentModal" tabindex="-1" aria-labelledby="viewStudentLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0 shadow rounded-4">
      <div class="modal-header bg-primary text-white rounded-top-4">
        <h5 class="modal-title"><i class="fas fa-user-graduate me-2"></i>Student Profile</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body px-5 py-4">
        <div class="text-center mb-4">
          <img id="view_photo" src="" alt="Profile Photo" class="rounded-circle border shadow" width="120" height="120">
          <h4 class="mt-3 mb-0 text-primary fw-semibold" id="view_name"></h4>
          <p class="text-muted" id="view_email"></p>
          <p class="text-muted mb-1" id="view_course"></p>
        </div>

        <hr>

        <div class="row g-4">
          <div class="col-md-6">
            <p><strong class="text-primary">Mobile:</strong> <span class="text-dark" id="view_mobile"></span></p>
            <p><strong class="text-primary">Father's Name:</strong> <span class="text-dark" id="view_father"></span></p>
            <p><strong class="text-primary">DOB:</strong> <span class="text-dark" id="view_dob"></span></p>
            <p><strong class="text-primary">Gender:</strong> <span class="text-dark" id="view_gender"></span></p>
            <p><strong class="text-primary">Aadhaar No.:</strong> <span class="text-dark" id="view_aadhaar"></span></p>
            <p><strong class="text-primary">Qualification:</strong> <span class="text-dark" id="view_qualification"></span></p>
          </div>
          <div class="col-md-6">
            <p><strong class="text-primary">Religion:</strong> <span class="text-dark" id="view_religion"></span></p>
            <p><strong class="text-primary">Nationality:</strong> <span class="text-dark" id="view_nationality"></span></p>
            <p><strong class="text-primary">Address:</strong> <span class="text-dark" id="view_address"></span></p>
            <p><strong class="text-primary">City:</strong> <span class="text-dark" id="view_city"></span></p>
            <p><strong class="text-primary">District:</strong> <span class="text-dark" id="view_district"></span></p>
            <p><strong class="text-primary">State:</strong> <span class="text-dark" id="view_state"></span></p>
            <p><strong class="text-primary">Pin Code:</strong> <span class="text-dark" id="view_pincode"></span></p>
          </div>
        </div>
      </div>

      <!-- Modal Footer with Edit Button -->
      <div class="modal-footer bg-light rounded-bottom-4 d-flex justify-content-center gap-3">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning editBtn" data-id="<?php echo $student['id']; ?>" data-bs-toggle="modal" data-bs-target="#editStudentModal">
        <i class="fas fa-edit me-1"></i> Edit
        </button>

      </div>
    </div>
  </div>
</div>


<!-- Edit Student Modal -->
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0 shadow rounded-4">
      <div class="modal-header bg-warning text-white rounded-top-4">
        <h5 class="modal-title"><i class="fas fa-user-edit me-2"></i>Edit Student</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form action="edit_student.php" method="post" enctype="multipart/form-data" id="editStudentForm">
      <div class="modal-body px-5 py-4">
          <div class="row g-3">
            <div class="col-md-6">
            <input type="hidden" class="form-control" id="uid" name="uid" required>

              <div class="form-floating">
                <input type="text" class="form-control" id="edit_name" name="name" required>
                <label for="edit_name">Student Name</label>
              </div>
              <div class="form-floating">
                <input type="email" class="form-control" id="edit_email" name="email" required>
                <label for="edit_email">Email</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="edit_mobile" name="mobile" required>
                <label for="edit_mobile">Mobile</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="edit_father" name="father_name">
                <label for="edit_father">Father's Name</label>
              </div>
              <div class="form-floating">
                <input type="date" class="form-control" id="edit_dob" name="dob">
                <label for="edit_dob">Date of Birth</label>
              </div>
              <div class="form-floating">
                <select class="form-select" id="edit_gender" name="gender">
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                <label for="edit_gender">Gender</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="edit_aadhaar" name="aadhaar">
                <label for="edit_aadhaar">Aadhaar No.</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="edit_qualification" name="qualification">
                <label for="edit_qualification">Qualification</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="edit_course" name="course">
                <label for="edit_course">Course</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="edit_religion" name="religion">
                <label for="edit_religion">Religion</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="edit_nationality" name="nationality">
                <label for="edit_nationality">Nationality</label>
              </div>
              <div class="form-floating">
                <textarea class="form-control" id="edit_address" name="address" style="height: 80px;"></textarea>
                <label for="edit_address">Address</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="edit_city" name="city">
                <label for="edit_city">City</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="edit_district" name="district">
                <label for="edit_district">District</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="edit_state" name="state">
                <label for="edit_state">State</label>
              </div>
              <div class="form-floating">
                <input type="text" class="form-control" id="edit_pincode" name="pincode">
                <label for="edit_pincode">Pin Code</label>
              </div>
              <div id="preview_image" class="mt-2">
                <img src="" id="edit_photo_preview" alt="Profile Photo" class="img-thumbnail" width="100">
              </div>

            </div>
          </div>
        </div>

        <div class="modal-footer bg-light rounded-bottom-4 d-flex justify-content-center gap-3">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-1"></i> Save Changes
          </button>
        </div>
      </form>
    </div>
  </div>
</div>





    </div> <!-- End col-md-10 -->
  </div> <!-- End row -->
</div> <!-- End container-fluid -->

<!-- Approved Checked -->
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

<!-- View Ajax -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll(".view-btn");

  buttons.forEach(btn => {
    btn.addEventListener("click", function () {
      const studentId = this.dataset.id;

      fetch('view_student.php?id=' + studentId)
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            document.getElementById('view_name').textContent = data.student_name;
            document.getElementById('view_email').textContent = data.email;
            document.getElementById('view_mobile').textContent = data.mobile;
            document.getElementById('view_father').textContent = data.father_name;
            document.getElementById('view_dob').textContent = data.dob;
            document.getElementById('view_gender').textContent = data.gender;
            document.getElementById('view_aadhaar').textContent = data.aadhaar;
            document.getElementById('view_qualification').textContent = data.qualification;
            document.getElementById('view_course').textContent = data.course;
            document.getElementById('view_religion').textContent = data.religion;
            document.getElementById('view_nationality').textContent = data.nationality;
            document.getElementById('view_address').textContent = data.address;
            document.getElementById('view_city').textContent = data.city;
            document.getElementById('view_district').textContent = data.district;
            document.getElementById('view_state').textContent = data.state;
            document.getElementById('view_pincode').textContent = data.pin_code;
            document.getElementById('view_photo').src = '../uploads/' + data.profile_image;
          } else {
            alert('Student not found');
          }
        });
    });
  });
});
</script>
<!-- Edit Student View Ajax -->
<script>
// When the Edit button is clicked
$(document).on('click', '.editBtn', function() {
    var studentId = $(this).data('id'); // Get the student ID from the button
    // Make an AJAX request to fetch the student data
    $.ajax({
        url: 'ed-view_student_data.php', // PHP file to fetch data
        method: 'POST',
        data: {id: studentId}, // Send the student ID
        success: function(response) {
            // Parse the JSON response
            var student = JSON.parse(response);
            
            // Populate the modal fields with the student data
            $('#editStudentModal #uid').val(student.id);
            $('#editStudentModal #edit_name').val(student.name);
            $('#editStudentModal #edit_email').val(student.email);
            $('#editStudentModal #edit_mobile').val(student.mobile);
            $('#editStudentModal #edit_father').val(student.father_name);
            $('#editStudentModal #edit_dob').val(student.dob);
            $('#editStudentModal #edit_gender').val(student.gender);
            $('#editStudentModal #edit_aadhaar').val(student.aadhaar);
            $('#editStudentModal #edit_qualification').val(student.qualification);
            $('#editStudentModal #edit_course').val(student.course);
            $('#editStudentModal #edit_religion').val(student.religion);
            $('#editStudentModal #edit_nationality').val(student.nationality);
            $('#editStudentModal #edit_address').val(student.address);
            $('#editStudentModal #edit_city').val(student.city);
            $('#editStudentModal #edit_district').val(student.district);
            $('#editStudentModal #edit_state').val(student.state);
            $('#editStudentModal #edit_pincode').val(student.pin_code);

            // Show the modal
            $('#editStudentModal').modal('show');
        },
        error: function() {
            alert('Error fetching student data!');
        }
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