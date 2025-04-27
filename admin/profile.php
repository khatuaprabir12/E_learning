<?php
session_start();
// include 'connection.php'; // Uncomment if you have db connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminName = $_POST['adminName'];
    $adminEmail = $_POST['adminEmail'];
    $adminPassword = $_POST['adminPassword'];

    // Save to database here if needed (not included)
    $_SESSION['success'] = "Profile updated successfully!";
    header("Location: profile.php");
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

  <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
      <?php 
        echo $_SESSION['success']; 
        unset($_SESSION['success']);
      ?>
    </div>
  <?php endif; ?>

  <div class="card p-4 shadow-sm">
    <form action="profile.php" method="post">
      <div class="mb-3">
        <label for="adminName" class="form-label">Name</label>
        <input type="text" class="form-control" id="adminName" name="adminName" value="Admin Name" required>
      </div>

      <div class="mb-3">
        <label for="adminEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="adminEmail" name="adminEmail" value="admin@example.com" required>
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
