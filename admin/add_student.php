<?php
session_start();
include '../connection.php'; // Connect to DB

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect fields
    $student_id = uniqid('STU'); // Generate unique Student ID
    $student_name = trim($_POST['student_name']);
    $father_name = trim($_POST['father_name']);
    $mobile = trim($_POST['mobile']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $district = trim($_POST['district']);
    $state = trim($_POST['state']);
    $pin_code = trim($_POST['pin_code']);
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $caste = trim($_POST['caste']);
    $religion = trim($_POST['religion']);
    $nationality = trim($_POST['nationality']);
    $aadhaar = trim($_POST['aadhaar']);
    $qualification = trim($_POST['qualification']);
    $course = trim($_POST['course']);
    $approved = 0; // New students not approved by default

    // Upload profile image
    $profile_image = null;
    if (!empty($_FILES['profile_image']['name'])) {
        $target_dir = "../uploads/";
        $profile_image = basename($_FILES['profile_image']['name']);
        $target_file = $target_dir . $profile_image;
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file);
    }

    // Check if email or mobile already exists
    $check_sql = "SELECT * FROM students WHERE email = ? OR mobile = ?";
    $stmt_check = $connect->prepare($check_sql);
    $stmt_check->bind_param("ss", $email, $mobile);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        $error_message = "";
        
        // Check if the email or mobile already exists
        $email_exists = false;
        $mobile_exists = false;
    
        while ($row = $result->fetch_assoc()) {
            if ($row['email'] == $email && !$email_exists) {
                $error_message .= "Email already exists. ";
                $email_exists = true; // Set flag to true after the first occurrence
            }
            if ($row['mobile'] == $mobile && !$mobile_exists) {
                $error_message .= "Mobile number already exists. ";
                $mobile_exists = true; // Set flag to true after the first occurrence
            }
        }
    
        // Only display the error message if there's an issue
        if (!empty($error_message)) {
            $_SESSION['error'] = $error_message;
            header("Location: student.php?error=1");
            exit();
        }
    }
    

    // Insert query
    $stmt = $connect->prepare("INSERT INTO students 
        (student_id, student_name, father_name, mobile, email, password, address, city, district, state, pin_code, gender, dob, caste, religion, nationality, aadhaar, qualification, course, profile_image, approved)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssssssssssssssssi", 
        $student_id, $student_name, $father_name, $mobile, $email, $password,
        $address, $city, $district, $state, $pin_code, $gender, $dob, $caste,
        $religion, $nationality, $aadhaar, $qualification, $course, $profile_image, $approved
    );

    if ($stmt->execute()) {
        header("Location: student.php?success=1");
        exit();
    } else {
        echo "Error: " . $connect->error;
    }
}
?>
