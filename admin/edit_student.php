<?php
// Include database connection
include_once '../connection.php'; // Ensure $connect is set correctly

// Initialize student array
$student = [];

// Check if ID is passed
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connect, $_GET['id']);

    // Fetch student data
    $sql = "SELECT * FROM students WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        $student = mysqli_fetch_assoc($result);
    } else {
        die("Student not found.");
    }
} else {
    die("Invalid request.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize form inputs
    $student_name = mysqli_real_escape_string($connect, $_POST['student_name']);
    $email        = mysqli_real_escape_string($connect, $_POST['email']);
    $mobile       = mysqli_real_escape_string($connect, $_POST['mobile']);
    $father_name  = mysqli_real_escape_string($connect, $_POST['father_name']);
    $dob          = mysqli_real_escape_string($connect, $_POST['dob']);
    $gender       = mysqli_real_escape_string($connect, $_POST['gender']);
    $aadhaar      = mysqli_real_escape_string($connect, $_POST['aadhaar']);
    $qualification= mysqli_real_escape_string($connect, $_POST['qualification']);
    $course       = mysqli_real_escape_string($connect, $_POST['course']);
    $caste       = mysqli_real_escape_string($connect, $_POST['caste']);
    $religion     = mysqli_real_escape_string($connect, $_POST['religion']);
    $nationality  = mysqli_real_escape_string($connect, $_POST['nationality']);
    $address      = mysqli_real_escape_string($connect, $_POST['address']);
    $city         = mysqli_real_escape_string($connect, $_POST['city']);
    $district     = mysqli_real_escape_string($connect, $_POST['district']);
    $state        = mysqli_real_escape_string($connect, $_POST['state']);
    $pincode      = mysqli_real_escape_string($connect, $_POST['pincode']);

    // Update query
    $update_sql = "UPDATE students SET 
        student_name = '$student_name',
        email = '$email',
        mobile = '$mobile',
        father_name = '$father_name',
        dob = '$dob',
        gender = '$gender',
        aadhaar = '$aadhaar',
        qualification = '$qualification',
        course = '$course',
        caste = '$caste',
        religion = '$religion',
        nationality = '$nationality',
        address = '$address',
        city = '$city',
        district = '$district',
        state = '$state',
        pin_code = '$pincode'
        WHERE id = '$id'";

    if (mysqli_query($connect, $update_sql)) {
        echo "<script>alert('Student updated successfully.'); window.location.href='student.php';</script>";
        exit;
    } else {
        echo "Error updating student: " . mysqli_error($connect);
    }
}
?>


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

<div class="d-flex min-vh-100">
  <!-- Sidebar -->
  <div class="bg-dark text-white p-3" style="width: 250px;">
    <h4 class="mb-4"><i class="bi bi-mortarboard-fill me-2"></i>Edufuture Admin</h4>
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
  <div class="flex-grow-1">
    <!-- Header -->
    <div class="dashboard-header d-flex justify-content-between align-items-center mb-4 px-4 py-3 bg-info text-white shadow-sm">
      <h4 class="mb-0"><i class="bi bi-people-fill me-2"></i>Edit Student</h4>
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

    <!-- Content -->
    <div class="container mb-5">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4">
          <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Edit Student Details</h5>
        </div>
        <!-- Your form content remains unchanged here -->
        <div class="card-body p-4">
        <form method="POST">
    <div class="row g-4">
      <!-- Left Column -->
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" name="student_name" value="<?= htmlspecialchars($student['student_name']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Mobile</label>
          <input type="text" name="mobile" value="<?= htmlspecialchars($student['mobile']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Father's Name</label>
          <input type="text" name="father_name" value="<?= htmlspecialchars($student['father_name']) ?>" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">DOB</label>
          <input type="date" name="dob" value="<?= htmlspecialchars($student['dob']) ?>" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Gender</label>
          <select name="gender" class="form-select">
            <option value="Male" <?= $student['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= $student['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
            <option value="Other" <?= $student['gender'] === 'Other' ? 'selected' : '' ?>>Other</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Aadhaar Number</label>
          <input type="text" name="aadhaar" value="<?= htmlspecialchars($student['aadhaar']) ?>" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Qualification</label>
          <input type="text" name="qualification" value="<?= htmlspecialchars($student['qualification']) ?>" class="form-control">
        </div>
      </div>

      <!-- Right Column -->
      <div class="col-md-6">
        <div class="mb-3">
          <label class="form-label">Course</label>
          <select name="course"  class="form-select" id="course" required>
            <option value="" disabled >Select a course</option>
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
              $selected = ($student['course'] === $course['course_title']) ? 'selected' : '';
              echo '<option value="' . htmlspecialchars($course['course_title']) . '" ' . $selected . '>' . htmlspecialchars($course['course_title']) . '</option>';
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
        <div class="mb-3">
          <label class="form-label">Caste</label>
          <select name="caste" class="form-select">
            <option value="General" <?= $student['caste'] === 'General' ? 'selected' : '' ?>>General</option>
            <option value="SC" <?= $student['caste'] === 'SC' ? 'selected' : '' ?>>SC</option>
            <option value="ST" <?= $student['caste'] === 'ST' ? 'selected' : '' ?>>ST</option>
            <option value="OBC" <?= $student['caste'] === 'OBC' ? 'selected' : '' ?>>OBC</option>
          </select>
        </div>
      
        <div class="mb-3">
          <label class="form-label">Religion</label>
          <input type="text" name="religion" value="<?= htmlspecialchars($student['religion']) ?>" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Nationality</label>
          <input type="text" name="nationality" value="<?= htmlspecialchars($student['nationality']) ?>" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">Address</label>
          <textarea name="address" class="form-control" rows="2"><?= htmlspecialchars($student['address']) ?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">City</label>
          <input type="text" name="city" value="<?= htmlspecialchars($student['city']) ?>" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">District</label>
          <input type="text" name="district" value="<?= htmlspecialchars($student['district']) ?>" class="form-control">
        </div>
        <div class="mb-3">
          <label class="form-label">State</label>
          <select name="state" class="form-select" required>
            <option value="" selected>Select your state</option>
            <option value="Andhra Pradesh"<?= $student['state'] === 'Andhra Pradesh' ? 'selected' : '' ?>>Andhra Pradesh</option>
            <option value="Arunachal Pradesh"<?= $student['state'] === 'Arunachal Pradesh' ? 'selected' : '' ?>>Arunachal Pradesh</option>
            <option value="Assam"<?= $student['state'] === 'Assam' ? 'selected' : '' ?>>Assam</option>
            <option value="Bihar"<?= $student['state'] === 'Bihar' ? 'selected' : '' ?>>Bihar</option>
            <option value="Chhattisgarh"<?= $student['state'] === 'Chhattisgarh' ? 'selected' : '' ?>>Chhattisgarh</option>
            <option value="Goa"<?= $student['state'] === 'Goa' ? 'selected' : '' ?>>Goa</option>
            <option value="Gujarat"<?= $student['state'] === 'Gujarat' ? 'selected' : '' ?>>Gujarat</option>
            <option value="Haryana"<?= $student['state'] === 'Haryana' ? 'selected' : '' ?>>Haryana</option>
            <option value="Himachal Pradesh"<?= $student['state'] === 'Himachal Pradesh' ? 'selected' : '' ?>>Himachal Pradesh</option>
            <option value="Jharkhand"<?= $student['state'] === 'Jharkhand' ? 'selected' : '' ?>>Jharkhand</option>
            <option value="Karnataka"<?= $student['state'] === 'Karnataka' ? 'selected' : '' ?>>Karnataka</option>
            <option value="Kerala"<?= $student['state'] === 'Kerala' ? 'selected' : '' ?>>Kerala</option>
            <option value="Madhya Pradesh"<?= $student['state'] === 'Madhya Pradesh' ? 'selected' : '' ?>>Madhya Pradesh</option>
            <option value="Maharashtra"<?= $student['state'] === 'Maharashtra' ? 'selected' : '' ?>>Maharashtra</option>
            <option value="Manipur"<?= $student['state'] === 'Manipur' ? 'selected' : '' ?>>Manipur</option>
            <option value="Meghalaya"<?= $student['state'] === 'Meghalaya' ? 'selected' : '' ?>>Meghalaya</option>
            <option value="Mizoram"<?= $student['state'] === 'Mizoram' ? 'selected' : '' ?>>Mizoram</option>
            <option value="Nagaland"<?= $student['state'] === 'Nagaland' ? 'selected' : '' ?>>Nagaland</option>
            <option value="Odisha"<?= $student['state'] === 'Odisha' ? 'selected' : '' ?>>Odisha</option>
            <option value="Punjab"<?= $student['state'] === 'Punjab' ? 'selected' : '' ?>>Punjab</option>
            <option value="Rajasthan"<?= $student['state'] === 'Rajasthan' ? 'selected' : '' ?>>Rajasthan</option>
            <option value="Sikkim"<?= $student['state'] === 'Sikkim' ? 'selected' : '' ?>>Sikkim</option>
            <option value="Tamil Nadu"<?= $student['state'] === 'Tamil Nadu' ? 'selected' : '' ?>>Tamil Nadu</option>
            <option value="Telangana"<?= $student['state'] === 'Telangana' ? 'selected' : '' ?>>Telangana</option>
            <option value="Tripura"<?= $student['state'] === 'Tripura' ? 'selected' : '' ?>>Tripura</option>
            <option value="Uttar Pradesh"<?= $student['state'] === 'Uttar Pradesh' ? 'selected' : '' ?>>Uttar Pradesh</option>
            <option value="Uttarakhand"<?= $student['state'] === 'Uttarakhand' ? 'selected' : '' ?>>Uttarakhand</option>
            <option value="West Bengal"<?= $student['state'] === 'West Bengal' ? 'selected' : '' ?>>West Bengal</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Pin Code</label>
          <input type="text" name="pincode" value="<?= htmlspecialchars($student['pin_code']) ?>" class="form-control">
        </div>
      </div>
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-success px-4"><i class="bi bi-save me-2"></i>Update</button>
      <a href="student.php" class="btn btn-secondary px-4"><i class="bi bi-x-circle me-2"></i>Cancel</a>
    </div>
  </form>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="script/add.js"></script>


</body>
</html>
