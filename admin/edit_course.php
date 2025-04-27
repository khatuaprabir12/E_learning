<?php
// edit_course.php
include '../connection.php'; // <-- Your DB connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data safely
    $course_id = intval($_POST['course_id']);
    $course_title = trim($_POST['course_title']);
    $course_description = trim($_POST['course_description']);
    $course_duration = trim($_POST['course_duration']);
    $category_id = intval($_POST['category_id']);

    // Handle file upload if a new image is provided
    if (isset($_FILES['course_image']) && $_FILES['course_image']['error'] == UPLOAD_ERR_OK) {
        $image_name = basename($_FILES['course_image']['name']);
        $image_tmp_path = $_FILES['course_image']['tmp_name'];

        $upload_dir = 'uploads/';
        $upload_path = $upload_dir . $image_name;

        // Move the uploaded file
        if (move_uploaded_file($image_tmp_path, $upload_path)) {
            $image_uploaded = true;
        } else {
            $image_uploaded = false;
        }
    } else {
        $image_uploaded = false;
    }

    // Update the course
    if ($image_uploaded) {
        // Update with new image
        $sql = "UPDATE course SET 
                    course_title = ?, 
                    course_description = ?, 
                    course_duration = ?, 
                    course_image = ?, 
                    category_id = ? 
                WHERE course_id = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param('ssssii', $course_title, $course_description, $course_duration, $image_name, $category_id, $course_id);
    } else {
        // Update without changing image
        $sql = "UPDATE course SET 
                    course_title = ?, 
                    course_description = ?, 
                    course_duration = ?, 
                    category_id = ? 
                WHERE course_id = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param('sssii', $course_title, $course_description, $course_duration, $category_id, $course_id);
    }

    if ($stmt->execute()) {
        // Success
        header("Location: course.php?success=1");
        exit();
    } else {
        // Error
        echo "Error updating course: " . $connect->error;
    }
}
?>
