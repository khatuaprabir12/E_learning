<?php
session_start();

// Destroy session variables
session_unset();
session_destroy();

// Start a new session (to store logout message)
session_start();
$_SESSION['logout_message'] = "You have successfully logged out.";

// Redirect to dashboard
header("Location: dashboard.php");
exit();
?>
