<?php
// category_submit.php

// Start session
session_start();

// Include database connection
include '../connection.php'; // Correct path

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryName = trim($_POST['categoryName']);

    if (!empty($categoryName)) {
        // Insert the category into database
        $query = "INSERT INTO course_category (category_name) VALUES (?)";
        $stmt = $connect->prepare($query);

        if ($stmt) {
            $stmt->bind_param("s", $categoryName);

            if ($stmt->execute()) {
                $_SESSION['success'] = "Category added successfully!";
            } else {
                $_SESSION['error'] = "Failed to add category: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $_SESSION['error'] = "Prepare failed: " . $connect->error;
        }
    } else {
        $_SESSION['error'] = "Category name cannot be empty.";
    }

    // Close connection safely
    if ($connect) {
        $connect->close();
    }

    // Redirect back
    header("Location: course.php"); 
    exit();
} else {
    echo "Invalid Request.";
}
?>
