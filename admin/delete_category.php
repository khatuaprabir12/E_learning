<?php
session_start();

// Include database connection
include '../connection.php';

// Check if category ID is provided
if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // First, delete courses under this category
    $delete_courses_sql = "DELETE FROM course WHERE category_id = ?";
    if ($stmt_courses = $connect->prepare($delete_courses_sql)) {
        $stmt_courses->bind_param("i", $category_id);
        $stmt_courses->execute();
    }

    // Then, delete the category
    $sql = "DELETE FROM course_category WHERE category_id = ?";
    
    if ($stmt = $connect->prepare($sql)) {
        $stmt->bind_param("i", $category_id);
        if ($stmt->execute()) {
            $_SESSION['success'] = "Category and related courses deleted successfully.";
        } else {
            $_SESSION['error'] = "Failed to delete category.";
        }
    } else {
        $_SESSION['error'] = "Database error: " . $connect->error;
    }
} else {
    $_SESSION['error'] = "Category ID is missing.";
}

// Redirect back
header("Location: course.php");
exit();
?>
