
<?php


session_start();
include '../connection.php'; // ✅ Adjust the path if this file is in "admin/"

$adminName = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : '';

if (isset($_SESSION['logout_message'])) {
    $logoutMessage = $_SESSION['logout_message'];
    unset($_SESSION['logout_message']);
}

// ✅ Fetch recent students from DB
$recentStudents = [];
$sql = "SELECT * FROM students ORDER BY created_at DESC LIMIT 5";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $recentStudents[] = $row;
    }
}
?>
