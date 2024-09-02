<?php
session_start();

// Destroy all session data
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session itself

// Redirect to login page
header('Location: index.php'); // Adjust the path to your login page if needed
exit();
?>
