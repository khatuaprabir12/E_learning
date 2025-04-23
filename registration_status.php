<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("Location: index.html");
    exit();
}

$student_id = $_SESSION['student_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Status</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow text-center">
            <div class="card-header bg-warning text-dark">
                <h4>Registration Status</h4>
            </div>
            <div class="card-body">
                <p class="fs-5">Your registration has been received.</p>
                <p class="text-danger fw-bold">Your Student ID: <?php echo $student_id; ?></p>
                <p class="text-muted">Status: <strong>Pending Verification</strong></p>
            </div>
        </div>
    </div>
</body>
</html>
