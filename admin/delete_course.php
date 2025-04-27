<?php
session_start();

// Include database connection
include '../connection.php'; // Adjust path if needed

// Check if the ID is set
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $course_id = intval($_GET['id']);

    // Optionally: Delete the course image also (if you store images)
    $getImageQuery = "SELECT course_image FROM course WHERE course_id = ?";
    $stmt = $connect->prepare($getImageQuery);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $course = $result->fetch_assoc();

    if ($course && !empty($course['course_image'])) {
        $imagePath = 'uploads/' . $course['course_image'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }
    }

    // Now delete the course from the database
    $deleteQuery = "DELETE FROM course WHERE course_id = ?";
    $stmt = $connect->prepare($deleteQuery);
    $stmt->bind_param("i", $course_id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Course deleted successfully!";
    } else {
        $_SESSION['error'] = "Failed to delete course. Please try again.";
    }
} else {
    $_SESSION['error'] = "Invalid course ID.";
}

// Redirect back to the course page
header("Location: course.php");
exit();
?>
