<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edufuture_academy";

// Database connection
$connect = new mysqli($servername, $username, $password, $dbname);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Assume admin ID = 1
$admin_id = 1;

// Fetch current admin data
$sql = "SELECT * FROM admin WHERE id = ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();

// If form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminName = $_POST['adminName'];
    $adminPassword = $_POST['adminPassword'];

    if (!empty($adminPassword)) {
        $adminPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
    } else {
        $adminPassword = $admin['password'];
    }

    $updateSql = "UPDATE admin SET username = ?, password = ? WHERE id = ?";
    $stmt = $connect->prepare($updateSql);
    $stmt->bind_param("ssi", $adminName, $adminPassword, $admin_id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Profile updated successfully!";
        $_SESSION['admin_name'] = $adminName;
    } else {
        $_SESSION['error'] = "Failed to update profile.";
    }

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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #74ebd5, #ACB6E5);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .profile-card {
      background: #fff;
      border: none;
      border-radius: 20px;
      padding: 30px;
      max-width: 500px;
      width: 100%;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      animation: slideDown 0.5s ease;
    }
    @keyframes slideDown {
      0% { transform: translateY(-50px); opacity: 0; }
      100% { transform: translateY(0); opacity: 1; }
    }
    .profile-avatar {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      margin-bottom: 20px;
      border: 3px solid #0d6efd;
    }
    .form-control:focus {
      box-shadow: 0 0 5px #0d6efd;
      border-color: #0d6efd;
    }
  </style>
</head>
<body>

<div class="profile-card text-center">
 

  <h3 class="mb-4"><?php echo htmlspecialchars($admin['username']); ?></h3>

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

  <form action="profile.php" method="post">
    <div class="mb-3 text-start">
      <label for="adminName" class="form-label">Username</label>
      <input type="text" class="form-control" id="adminName" name="adminName" value="<?php echo htmlspecialchars($admin['username']); ?>" required>
    </div>

    <div class="mb-3 text-start">
      <label for="adminPassword" class="form-label">New Password</label>
      <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="password">
    </div>

    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary">Update Profile</button>
      <a href="dashboard.php" class="btn btn-outline-secondary">Back to Dashboard</a>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
