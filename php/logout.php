<?php
// Start or resume the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to login page
header("Location: ../login.html");
exit; // Stop further script execution
?>
