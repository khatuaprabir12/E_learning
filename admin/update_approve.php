<?php
session_start();
include '../connection.php'; // adjust path if needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = intval($_POST['student_id']);
    $approved = intval($_POST['approved']);

    $stmt = $connect->prepare("UPDATE students SET approved = ? WHERE id = ?");
    $stmt->bind_param("ii", $approved, $student_id);

    if ($stmt->execute()) {
        if ($approved) {
            $_SESSION['success'] = "Student approved successfully.";
            echo "Student approved successfully.";
        } else {
            $_SESSION['success'] = "Student unapproved successfully.";
            echo "Student unapproved successfully.";
        }
    } else {
        $_SESSION['error'] = "Error updating approval status.";
        echo "Error updating approval status.";
    }
}
?>



