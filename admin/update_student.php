<?php
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $student_name = $_POST['student_name'];
    $father_name = $_POST['father_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    // You can add more fields similarly...

    $sql = "UPDATE students SET 
                student_name = ?, 
                father_name = ?, 
                mobile = ?, 
                email = ? 
            WHERE id = ?";

    $stmt = $connect->prepare($sql);
    $stmt->bind_param('ssssi', $student_name, $father_name, $mobile, $email, $id);

    if ($stmt->execute()) {
        echo 'Student updated successfully.';
    } else {
        http_response_code(500);
        echo 'Failed to update student.';
    }

    $stmt->close();
    $connect->close();
} else {
    http_response_code(405);
    echo 'Method not allowed';
}
?>
