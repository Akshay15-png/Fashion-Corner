<?php
// resume the session
session_start();

// unnset all session variables
session_unset();

// destroy session
session_destroy();

// redirect to login page
header("Location: ../login.html");
exit; 
?>
