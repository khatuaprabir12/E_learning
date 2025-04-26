<?php
// course_submit.php

// Start session if needed
session_start();

// Include database connection
include 'admin/connection.php'; // make sure this file has your DB credentials

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get form data
    $courseTitle = trim($_POST['courseTitle']);
    $courseDescription = trim($_POST['courseDescription']);
    $courseDuration = trim($_POST['courseDuration']);
    $courseImage = trim($_POST['courseImage']);
    $categoryId = intval($_POST['categoryId']); // If you select category from dropdown later

    // Insert into database
    $query = "INSERT INTO Course (course_title, course_description, course_duration, course_image, category_id) 
              VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("ssssi", $courseTitle, $courseDescription, $courseDuration, $courseImage, $categoryId);
        
        if ($stmt->execute()) {
            $_SESSION['success'] = "Course added successfully.";
        } else {
            $_SESSION['error'] = "Error adding course: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        $_SESSION['error'] = "Prepare failed: " . $conn->error;
    }
    
    $conn->close();
    
    // Redirect back
    header("Location: admin/dashboard.php"); // or wherever your admin page is
    exit();
} else {
    echo "Invalid request.";
}
?>
