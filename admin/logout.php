<?php
session_start();

// Destroy all sessions
$_SESSION = [];
session_destroy();

// Set a session variable for the logout message
$_SESSION['logout_message'] = 'You have successfully logged out.';

// Redirect to dashboard.php to display the logout message
header("Location: dashboard.php");
exit();
?>
