<?php
// edit_category_submit.php

session_start();
include '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoryId = intval($_POST['category_id']);
    $categoryName = trim($_POST['categoryName']);

    if (empty($categoryName)) {
        $_SESSION['error'] = "Category name cannot be empty.";
    } else {
        $query = "UPDATE course_category SET category_name = ? WHERE category_id = ?";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("si", $categoryName, $categoryId);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Category updated successfully.";
        } else {
            $_SESSION['error'] = "Failed to update category.";
        }
        $stmt->close();
    }

    $connect->close();
    header("Location: course.php"); // back to dashboard
    exit();
} else {
    echo "Invalid request.";
}
?>
