<?php
// edit_student.php
session_start();
include '../connection.php';

if (!isset($_GET['id'])) {
    $_SESSION['error'] = 'Invalid student ID!';
    header('Location: student.php');
    exit();
}

$student_id = intval($_GET['id']);
$sql = "SELECT * FROM students WHERE id = $student_id";
$result = mysqli_query($connect, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    $_SESSION['error'] = 'Student not found!';
    header('Location: student.php');
    exit();
}

$student = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_name = $_POST['student_name'];
    $father_name = $_POST['father_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    // Update query
    $update_sql = "UPDATE students SET 
                    student_name = '$student_name',
                    father_name = '$father_name',
                    mobile = '$mobile',
                    email = '$email',
                    course = '$course'
                  WHERE id = $student_id";

    if (mysqli_query($connect, $update_sql)) {
        $_SESSION['success'] = 'Student updated successfully!';
    } else {
        $_SESSION['error'] = 'Failed to update student!';
    }

    header('Location: student.php');
    exit();
    
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .btn-lg {
            font-size: 18px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card p-4" style="width: 100%; max-width: 600px;">
        <div class="card-body">
            <h2 class="text-center mb-4">Edit Student</h2>
            
            <?php
            if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                unset($_SESSION['success']);
            }
            ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="student_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="student_name" name="student_name" value="<?= htmlspecialchars($student['student_name']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="father_name" class="form-label">Father's Name</label>
                    <input type="text" class="form-control" id="father_name" name="father_name" value="<?= htmlspecialchars($student['father_name']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="<?= htmlspecialchars($student['mobile']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="course" class="form-label">Course</label>
                    <input type="text" class="form-control" id="course" name="course" value="<?= htmlspecialchars($student['course']) ?>" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-lg">Update</button>
                    <a href="student.php" class="btn btn-secondary btn-lg">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>


<?php
// delete_student.php
session_start();
include '../connection.php';

if (!isset($_GET['id'])) {
    $_SESSION['error'] = 'Invalid student ID!';
    header('Location: student.php');
    exit();
}

$student_id = intval($_GET['id']);

// First, delete the profile image if exists (optional)
$sql = "SELECT profile_image FROM students WHERE id = $student_id";
$result = mysqli_query($connect, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $student = mysqli_fetch_assoc($result);
    if (!empty($student['profile_image'])) {
        // Delete the profile image from the uploads folder
        $imagePath = "../uploads/" . $student['profile_image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}

// Delete the student record from the database
$delete_sql = "DELETE FROM students WHERE id = $student_id";

if (mysqli_query($connect, $delete_sql)) {
    $_SESSION['success'] = 'Student deleted successfully!';
} else {
    $_SESSION['error'] = 'Failed to delete student!';
}

header('Location: student.php');
exit();
?>
