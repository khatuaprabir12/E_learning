<?php
// Start session
session_start();

// Destroy the session to log the user out
session_unset(); // Unsets all session variables
session_destroy(); // Destroys the session

// Redirect to the homepage or any other page
header("Location: index.php");
exit();
?>
