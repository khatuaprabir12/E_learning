<?php
include("connection.php");

function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$id = $_POST['id'];
$student_name = clean_input($_POST['student_name']);
$mobile = clean_input($_POST['mobile']);
// Add other fields as needed

$stmt = $connect->prepare("UPDATE students SET student_name = ?, mobile = ? WHERE id = ?");
$stmt->bind_param("ssi", $student_name, $mobile, $id);

if ($stmt->execute()) {
    header("Location: students_list.php"); // wherever your list is
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$connect->close();
?>
