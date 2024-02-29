<?php
session_start();
session_destroy(); // Destroy the session

// Redirect to the login page or another appropriate location
header("Location: index.php"); // Adjust the URL based on your application's structure
exit();
?>
