<?php
include "db.php";

// Process login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mentorUsername = $_POST["mentor-username"];
    $mentorPassword = $_POST["mentor-password"];

    // Basic validation
    if (empty($mentorUsername) || empty($mentorPassword)) {
        echo '<script>alert("Please enter both username and password.");</script>';
        echo '<script>window.location.href = "index.php";</script>';
    } else {
        // Fetch mentor data from the database
        $sql = "SELECT * FROM mentor_login WHERE username = '$mentorUsername'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Compare plaintext password
            if ($mentorPassword == $row["password"]) {
                // Successful login, redirect to mentor dashboard or another page
                session_start();
                $_SESSION["username"] = $mentorUsername;
                header("Location: mentor_dashboard.php");
                
                exit();
            } else {
                echo '<script>alert("Invalid password.");</script>';
                echo '<script>window.location.href = "index.php";</script>';
            }
        } else {
            echo '<script>alert("Mentor not found.");</script>';
            echo '<script>window.location.href = "index.php";</script>';
        }
    }
}
?>

