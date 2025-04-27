<?php
session_start();

// Include the database connection
include 'connection.php';

// Assume admin ID = 1 (or use session data if admin is logged in)
$admin_id = 1; 

// Fetch admin data
$sql = "SELECT * FROM admin WHERE id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();

// If form is submitted, update the profile
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminName = $_POST['adminName'];
    $adminEmail = $_POST['adminEmail'];
    $adminPassword = $_POST['adminPassword'];

    // Hash the password if it's updated
    if (!empty($adminPassword)) {
        $adminPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
    } else {
        // If password is not changed, retain the current password
        $adminPassword = $admin['password'];
    }

    // Update the database
    $updateSql = "UPDATE admin SET username = ?, password = ? WHERE id = ?";
    $stmt = $connect->prepare($updateSql);
    $stmt->bind_param("ssi", $adminName, $adminPassword, $admin_id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Profile updated successfully!";
    } else {
        $_SESSION['error'] = "Failed to update profile.";
    }

    header("Location: profile.php"); // Redirect to the same page after the update
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Profile - Edufuture Academy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container py-5">
  <h2 class="mb-4">Admin Profile</h2>

  <!-- Success or error message -->
  <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
      <?php 
        echo $_SESSION['success']; 
        unset($_SESSION['success']);
      ?>
    </div>
  <?php endif; ?>
  
  <?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
      <?php 
        echo $_SESSION['error']; 
        unset($_SESSION['error']);
      ?>
    </div>
  <?php endif; ?>

  <div class="card p-4 shadow-sm">
    <form action="profile.php" method="post">
      <div class="mb-3">
        <label for="adminName" class="form-label">Name</label>
        <input type="text" class="form-control" id="adminName" name="adminName" value="<?php echo $admin['username']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="adminEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="adminEmail" name="adminEmail" value="<?php echo $admin['username']; ?>" required>
      </div>

      <div class="mb-3">
        <label for="adminPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="Enter new password if you want to change">
      </div>

      <button type="submit" class="btn btn-primary">Update Profile</button>
      <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
