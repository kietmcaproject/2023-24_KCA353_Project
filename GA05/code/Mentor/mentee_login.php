<?php
// Database connection
include "db.php";

// Process mentee login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menteeId = $_POST["mentee-username"]; // Assuming the input field is named "mentee-id"
    $menteePassword = $_POST["mentee-password"];

    // Basic validation
    if (empty($menteeId) || empty($menteePassword)) {
        echo '<script>alert("Please enter both ID and password.");</script>';
        echo '<script>window.location.href = "index.php";</script>';
    } else {
        // Fetch mentee data from the database
        $sql = "SELECT * FROM students WHERE id = '$menteeId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Hash the provided password and compare with the hashed password in the database
            if ($menteePassword==$row["password"]) {
                // Successful login, redirect to mentee dashboard or another page
                session_start();
                $_SESSION["mentee_id"] = $row["id"]; // Store mentee ID in the session if needed
                header("Location: mentee_dashboard.php");
                exit();
            } else {
                echo '<script>alert("Invalid password.");</script>';
                echo '<script>window.location.href = "index.php";</script>';
            }
        } else {
            echo '<script>alert("Mentee not found.");</script>';
            echo '<script>window.location.href = "index.php";</script>';
        }
    }
}
?>
