<?php
// Include database connection
include('../connection.php');  // Assuming you have a separate file for DB connection

// Check if the 'id' parameter is passed
if (isset($_POST['id'])) {
    $studentId = $_POST['id'];

    // Prepare the query to get the student data
    $query = "SELECT * FROM students WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $studentId);  // 'i' for integer
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a student is found
    if ($result->num_rows > 0) {
        // Fetch the student data
        $student = $result->fetch_assoc();

        // Return the student data as JSON
        echo json_encode($student);
    } else {
        // No student found
        echo json_encode(['error' => 'Student not found']);
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // If 'id' is not provided
    echo json_encode(['error' => 'No student ID provided']);
}

// Close the database connection
$conn->close();
?>
