<?php

// include("connection.php");

// // Sanitize function
// function clean_input($data) {
//     return htmlspecialchars(stripslashes(trim($data)));
// }

// // Sanitize POST data
// $student_name = clean_input($_POST['student_name']);
// $father_name = clean_input($_POST['father_name']);
// $mobile = clean_input($_POST['mobile']);
// $email = clean_input($_POST['email']);
// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
// $address = clean_input($_POST['address']);
// $city = clean_input($_POST['city']);
// $district = clean_input($_POST['district']);
// $state = clean_input($_POST['state']);
// $pin_code = clean_input($_POST['pin_code']);
// $gender = clean_input($_POST['gender']);
// $dob = clean_input($_POST['dob']);
// $caste = clean_input($_POST['caste']);
// $religion = clean_input($_POST['religion']);
// $nationality = clean_input($_POST['nationality']);
// $aadhaar = clean_input($_POST['aadhaar']);
// $qualification = clean_input($_POST['qualification']);
// $course = clean_input($_POST['course']);

// // Handle file upload
// $target_dir = "uploads/";
// if (!file_exists($target_dir)) {
//     mkdir($target_dir, 0777, true);
// }

// $profile_image = $_FILES["profile_image"]["name"];
// $tmp_name = $_FILES["profile_image"]["tmp_name"];
// $file_type = mime_content_type($tmp_name);

// // Validate file type (basic check for images)
// $allowed_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
// if (!in_array($file_type, $allowed_types)) {
//     die("Only image files are allowed.");
// }

// // Generate a unique file name
// $profile_image = time() . "_" . basename($profile_image);
// $target_file = $target_dir . $profile_image;

// if (move_uploaded_file($tmp_name, $target_file)) {
//     // Use prepared statement to insert into DB
//     $stmt = $connect->prepare("INSERT INTO students (student_name, father_name, mobile, email, password, address, city, district, state, pin_code, gender, dob, caste, religion, nationality, aadhaar, qualification, course, profile_image)
//                             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

//     $stmt->bind_param("sssssssssssssssssss",
//         $student_name,
//         $father_name,
//         $mobile,
//         $email,
//         $password,
//         $address,
//         $city,
//         $district,
//         $state,
//         $pin_code,
//         $gender,
//         $dob,
//         $caste,
//         $religion,
//         $nationality,
//         $aadhaar,
//         $qualification,
//         $course,
//         $profile_image
//     );

//     if ($stmt->execute()) {
//         echo "<script>alert('Registration successful!'); window.location.href='index.html';</script>";
//     } else {
//         echo "Error: " . $stmt->error;
//     }

//     $stmt->close();
// } else {
//     echo "File upload failed. Please try again.";
// }

// $connect->close();




// include("connection.php");

// // Sanitize function
// function clean_input($data) {
//     return htmlspecialchars(stripslashes(trim($data)));
// }

// // Start session
// session_start();

// // Student ID generation
// $institute_code = "TBNYCTC";
// $year = date("Y");
// $month = date("m");

// // Count students registered this month
// $check_sql = "SELECT COUNT(*) as total FROM students WHERE YEAR(created_at) = ? AND MONTH(created_at) = ?";
// $stmt_check = $connect->prepare($check_sql);
// $stmt_check->bind_param("ii", $year, $month);
// $stmt_check->execute();
// $result = $stmt_check->get_result()->fetch_assoc();
// $student_count = $result['total'] + 1;
// $stmt_check->close();

// // Create student ID like TBNYCTC-01-2025-01
// $student_id = sprintf("%s-%02d-%d-%02d", $institute_code, $month, $year, $student_count);

// // Sanitize POST data
// $student_name = clean_input($_POST['student_name']);
// $father_name = clean_input($_POST['father_name']);
// $mobile = clean_input($_POST['mobile']);
// $email = clean_input($_POST['email']);
// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
// $address = clean_input($_POST['address']);
// $city = clean_input($_POST['city']);
// $district = clean_input($_POST['district']);
// $state = clean_input($_POST['state']);
// $pin_code = clean_input($_POST['pin_code']);
// $gender = clean_input($_POST['gender']);
// $dob = clean_input($_POST['dob']);
// $caste = clean_input($_POST['caste']);
// $religion = clean_input($_POST['religion']);
// $nationality = clean_input($_POST['nationality']);
// $aadhaar = clean_input($_POST['aadhaar']);
// $qualification = clean_input($_POST['qualification']);
// $course = clean_input($_POST['course']);

// // Handle file upload
// $target_dir = "uploads/";
// if (!file_exists($target_dir)) {
//     mkdir($target_dir, 0777, true);
// }

// $profile_image = $_FILES["profile_image"]["name"];
// $tmp_name = $_FILES["profile_image"]["tmp_name"];
// $file_type = mime_content_type($tmp_name);

// // Validate image type
// $allowed_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
// if (!in_array($file_type, $allowed_types)) {
//     die("Only image files are allowed.");
// }

// // Rename to avoid conflicts
// $profile_image = time() . "_" . basename($profile_image);
// $target_file = $target_dir . $profile_image;

// if (move_uploaded_file($tmp_name, $target_file)) {
//     $sql = "INSERT INTO students (student_id, student_name, father_name, mobile, email, password, address, city, district, state, pin_code, gender, dob, caste, religion, nationality, aadhaar, qualification, course, profile_image, created_at)
//             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

//     $stmt = $connect->prepare($sql);
//     $stmt->bind_param("ssssssssssssssssssss",
//         $student_id,
//         $student_name,
//         $father_name,
//         $mobile,
//         $email,
//         $password,
//         $address,
//         $city,
//         $district,
//         $state,
//         $pin_code,
//         $gender,
//         $dob,
//         $caste,
//         $religion,
//         $nationality,
//         $aadhaar,
//         $qualification,
//         $course,
//         $profile_image
//     );

//     if ($stmt->execute()) {
//         // Store student ID in session
//         $_SESSION['student_id'] = $student_id;

//         // Redirect to status page
//         header("Location: registration_status.php");
//         exit();
//     } else {
//         echo "Error: " . $stmt->error;
//     }

//     $stmt->close();
// } else {
//     echo "File upload failed.";
// }

// $connect->close();

include("connection.php");

// Start session
session_start();

// Sanitize function
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Student ID generation
$institute_code = "TBNYCTC";
$year = date("Y");
$month = date("m");

// Count students registered this month
$check_sql = "SELECT COUNT(*) as total FROM students WHERE YEAR(created_at) = ? AND MONTH(created_at) = ?";
$stmt_check = $connect->prepare($check_sql);
$stmt_check->bind_param("ii", $year, $month);
$stmt_check->execute();
$result = $stmt_check->get_result()->fetch_assoc();
$student_count = $result['total'] + 1;
$stmt_check->close();

// Create student ID like TBNYCTC-04-2025-01
$student_id = sprintf("%s-%02d-%d-%02d", $institute_code, $month, $year, $student_count);

// Sanitize and fetch POST data
$student_name = clean_input($_POST['student_name']);
$father_name = clean_input($_POST['father_name']);
$mobile = clean_input($_POST['mobile']);
$email = clean_input($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$address = clean_input($_POST['address']);
$city = clean_input($_POST['city']);
$district = clean_input($_POST['district']);
$state = clean_input($_POST['state']);
$pin_code = clean_input($_POST['pin_code']);
$gender = clean_input($_POST['gender']);
$dob = clean_input($_POST['dob']);
$caste = clean_input($_POST['caste']);
$religion = clean_input($_POST['religion']);
$nationality = clean_input($_POST['nationality']);
$aadhaar = clean_input($_POST['aadhaar']);
$qualification = clean_input($_POST['qualification']);
$course = clean_input($_POST['course']);

// Check if email or mobile already exists
$check_duplicate = "SELECT * FROM students WHERE email = ? OR mobile = ?";
$stmt_dup = $connect->prepare($check_duplicate);
$stmt_dup->bind_param("ss", $email, $mobile);
$stmt_dup->execute();
$dup_result = $stmt_dup->get_result();

if ($dup_result->num_rows > 0) {
    $_SESSION['error'] = "Email or Mobile Number already exists!";
    header("Location: admission.php"); // change this to your registration page
    exit();
}
$stmt_dup->close();

// Handle profile image upload
$target_dir = "uploads/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$profile_image = $_FILES["profile_image"]["name"];
$tmp_name = $_FILES["profile_image"]["tmp_name"];
$file_type = mime_content_type($tmp_name);

// Validate image type
$allowed_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
if (!in_array($file_type, $allowed_types)) {
    $_SESSION['error'] = "Only JPG, PNG, or GIF image files are allowed.";
    header("Location: admission.php");
    exit();
}

// Rename file to avoid conflicts
$profile_image = time() . "_" . basename($profile_image);
$target_file = $target_dir . $profile_image;

// Move file and insert student data
if (move_uploaded_file($tmp_name, $target_file)) {
    $sql = "INSERT INTO students (
        student_id, student_name, father_name, mobile, email, password, 
        address, city, district, state, pin_code, gender, dob, caste, 
        religion, nationality, aadhaar, qualification, course, profile_image, created_at
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $connect->prepare($sql);
    $stmt->bind_param("ssssssssssssssssssss",
        $student_id,
        $student_name, 
        $father_name, 
        $mobile, 
        $email, 
        $password,
        $address, 
        $city, 
        $district, 
        $state, 
        $pin_code, 
        $gender, 
        $dob,
        $caste, 
        $religion, 
        $nationality, 
        $aadhaar, 
        $qualification,
        $course, 
        $profile_image
    );

    if ($stmt->execute()) {
        $_SESSION['student_id'] = $student_id;
        header("Location: registration_status.php");
        exit();
    } else {
        $_SESSION['error'] = "Database error: " . $stmt->error;
        header("Location: admission.php");
        exit();
    }

    $stmt->close();
} else {
    $_SESSION['error'] = "File upload failed.";
    header("Location: admission.php");
    exit();
}

$connect->close();
?>