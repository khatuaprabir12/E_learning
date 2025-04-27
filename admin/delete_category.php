<?php
session_start();

// Include database connection
include '../connection.php';

// Check if category ID is provided
if (isset($_POST['category_id'])) {
    $category_id = $_POST['category_id'];

    // Prepare SQL to delete the category
    $sql = "DELETE FROM course_category WHERE category_id = ?";
    
    if ($stmt = $connect->prepare($sql)) {
        // Bind the category ID to the SQL statement
        $stmt->bind_param("i", $category_id);

        // Execute the query
        if ($stmt->execute()) {
            // Set success message and redirect
            $_SESSION['success'] = "Category deleted successfully.";
            header("Location: course.php");  // Redirect to category list page
            exit();
        } else {
            // Set error message if deletion fails
            $_SESSION['error'] = "Failed to delete category.";
            header("Location: course.php");  // Redirect back with error
            exit();
        }
    } else {
        // Handle SQL statement preparation error
        $_SESSION['error'] = "Database error: " . $connect->error;
        header("Location: course.php");  // Redirect back with error
        exit();
    }
} else {
    // If no category ID is provided, redirect with an error
    $_SESSION['error'] = "Category ID is missing.";
    header("Location: course.php");
    exit();
}
?>
