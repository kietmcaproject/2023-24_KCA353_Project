<?php
// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['uname'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other page you want
    header("Location: index.php");
    exit();
} else {
    // If the user is not logged in, you can redirect to a different page or display a message
    echo "You are not logged in.";
}
?>
