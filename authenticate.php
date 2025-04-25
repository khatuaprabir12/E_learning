<?php
// session_start();
// include("connection.php");

// // Get redirect page (if any)
// $redirect_page = isset($_POST['redirect']) ? $_POST['redirect'] : 'index.php';

// $username = $_POST['username'];
// $password = $_POST['password'];

// // Fetch admin credentials from DB
// $query = "SELECT * FROM admin WHERE username = ?";
// $stmt = $connect->prepare($query);
// $stmt->bind_param("s", $username);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows === 1) {
//     $admin = $result->fetch_assoc();
//     if (password_verify($password, $admin['password'])) {
//         $_SESSION['admin_logged_in'] = true;
//         $_SESSION['admin_username'] = $admin['username'];
//         header("Location: admin/dashboard.php");
//         exit();
//     }
// }

// // Login failed, redirect back with error
// header("Location: $redirect_page?error=1");
// exit();




// session_start();
// include("connection.php");

// // Get redirect page (if any)
// $redirect_page = isset($_POST['redirect']) ? $_POST['redirect'] : 'index.php';
// $login_type = isset($_POST['login_type']) ? $_POST['login_type'] : 'admin';

// $username = $_POST['username'];
// $password = $_POST['password'];

// if ($login_type === 'admin') {
//     // Admin login
//     $query = "SELECT * FROM admin WHERE username = ?";
//     $stmt = $connect->prepare($query);
//     $stmt->bind_param("s", $username);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows === 1) {
//         $admin = $result->fetch_assoc();
//         if (password_verify($password, $admin['password'])) {
//             $_SESSION['admin_logged_in'] = true;
//             $_SESSION['admin_username'] = $admin['username'];
//             header("Location: admin/dashboard.php");
//             exit();
//         }
//     }

// } else {
//     // Student login by email or student_id
//     $query = "SELECT * FROM students WHERE email = ? OR student_id = ?";
//     $stmt = $connect->prepare($query);
//     $stmt->bind_param("ss", $username, $username);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows === 1) {
//         $student = $result->fetch_assoc();
//         if (password_verify($password, $student['password'])) {
//             $_SESSION['student_logged_in'] = true;
//             $_SESSION['student_name'] = $student['student_name'];
//             $_SESSION['student_id'] = $student['student_id'];
//             header("Location: index.php");
//             exit();
//         }
//     }
// }



// // Login failed
// header("Location: $redirect_page?error=1");
// exit();


session_start();
include("connection.php");

// Get redirect page (if any)
$redirect_page = isset($_POST['redirect']) ? $_POST['redirect'] : 'index.php';
$login_type = isset($_POST['login_type']) ? $_POST['login_type'] : 'admin';

$username = $_POST['username'];
$password = $_POST['password'];

if ($login_type === 'admin') {
    // Admin login
    $query = "SELECT * FROM admin WHERE username = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $admin['username'];
            header("Location: admin/dashboard.php");
            exit();
        }
    }

} else {
    // Student login by email or student_id
    $query = "SELECT * FROM students WHERE (email = ? OR student_id = ?)";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $student = $result->fetch_assoc();
        
        // Check if student is approved
        if ($student['approved'] == 0) {
            // Redirect with custom message: Pending verification
            header("Location: $redirect_page?error=2&message=Your%20Student%20ID%20is%20pending%20admin%20approval.");
            exit();
        }

        // If approved, verify password
        if (password_verify($password, $student['password'])) {
            $_SESSION['student_logged_in'] = true;
            $_SESSION['student_name'] = $student['student_name'];
            $_SESSION['student_id'] = $student['student_id'];
            header("Location: index.php");
            exit();
        }
    }
}

// Login failed (incorrect credentials or any other reason)
header("Location: $redirect_page?error=1");
exit();

?>

