<?php
include("connection.php");
$student_name = $_REQUEST['student_name'];
$father_name = $_REQUEST['father_name'];
$mobile = $_REQUEST['mobile'];
$email = $_REQUEST['email'];
$password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT); // hashed
$address = $_REQUEST['address'];
$city = $_REQUEST['city'];
$district = $_REQUEST['district'];
$state = $_REQUEST['state'];
$pin_code = $_REQUEST['pin_code'];
$gender = $_REQUEST['gender'];
$dob = $_REQUEST['dob'];
$caste = $_REQUEST['caste'];
$religion = $_REQUEST['religion'];
$nationality = $_REQUEST['nationality'];
$aadhaar = $_REQUEST['aadhaar'];
$qualification = $_REQUEST['qualification'];
$course = $_REQUEST['course'];

// Handle image upload
$filename = $_FILES['profile_image']['name'];
$tempname = $_FILES['profile_image']['tmp_name'];
$folder = 'uploads/' . time() . '_' . $filename;
move_uploaded_file($tempname, $folder);

// Insert data
$sql = "INSERT INTO `students`(`id`, `student_name`, `father_name`, `mobile`, `email`, `password`, `address`, `city`, `district`, `state`, `pin_code`, `gender`, `dob`, `caste`, `religion`, `nationality`, `aadhaar`, `qualification`, `profile_image`, `course`, `created_at`)
 VALUES ('','$student_name','$father_name','$mobile','$email','$password','$address','$city','$district','$state', '$pin_code', '$gender', '$dob', '$caste', '$religion', '$nationality', '$aadhaar', '$qualification', '$folder', '$course')";

$data = mysqli_query($conn, $sql);

if ($data) {
    echo "<script>alert('Data inserted successfully');</script>";
    
    
} else {
    echo "Data not inserted. Error: " ;
}
?>
