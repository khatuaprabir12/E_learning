<?php
// Start session and connect to database
session_start();
include 'connection.php'; // Your database connection file

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Fetch form fields
    $courseName = mysqli_real_escape_string($connect, $_POST['courseName']);
    $courseDescription = mysqli_real_escape_string($connect, $_POST['courseDescription']);
    $courseDuration = mysqli_real_escape_string($connect, $_POST['courseDuration']);
    $categoryId = (int)$_POST['categoryId'];

    // Handle course image upload
    $courseImage = '';
    if (isset($_FILES['courseImage']) && $_FILES['courseImage']['error'] == 0) {
        $imageTmp = $_FILES['courseImage']['tmp_name'];
        $imageName = time() . '_' . basename($_FILES['courseImage']['name']);
        $uploadDir = 'uploads/';
        $uploadPath = $uploadDir . $imageName;

        // Move uploaded file
        if (move_uploaded_file($imageTmp, $uploadPath)) {
            $courseImage = $imageName;
        } else {
            $_SESSION['error'] = 'Failed to upload course image.';
            header('Location: course.php');
            exit();
        }
    }

    // Insert into database
    $sql = "INSERT INTO course (course_title, course_description, course_duration, course_image, category_id) 
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $connect->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssi", $courseName, $courseDescription, $courseDuration, $courseImage, $categoryId);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Course added successfully.';
        } else {
            $_SESSION['error'] = 'Failed to add course.';
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = 'Database error.';
    }

    // Redirect back to the course list
    header('Location: course.php');
    exit();
} else {
    // If accessed without POST
    $_SESSION['error'] = 'Invalid request.';
    header('Location: course.php');
    exit();
}
?>
