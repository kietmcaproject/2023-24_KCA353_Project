<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <form id="changePasswordForm" method="post">
        <label for="menteeId">Mentee ID:</label>
        <input type="text" id="menteeId" name="menteeId" required>

        <label for="currentPassword">Current Password:</label>
        <input type="password" id="currentPassword" name="currentPassword" required>

        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required>

        <label for="confirmPassword">Confirm New Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>

        <button type="submit">Change Password</button>
    </form>
</body>
</html>
<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menteeId = $_POST["menteeId"];
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Basic validation
    if (empty($menteeId) || empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
        echo '<script>alert("Please fill in all fields.");</script>';
        echo '<script>window.location.href = "change_password.html";</script>';
    } else {
        // Fetch mentee data from the database
        $sql = "SELECT * FROM students WHERE id = '$menteeId'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Check if the current password is correct
            if ($currentPassword== $row["password"]) {
                // Check if the new password matches the confirm password
                if ($newPassword === $confirmPassword) {
                    // Update the password in the database
                    $updateSql = "UPDATE students SET password = '$newPassword' WHERE id = '$menteeId'";
                    if ($conn->query($updateSql) === TRUE) {
                        echo '<script>alert("Password changed successfully.");</script>';
                        echo '<script>window.location.href = "index.php";</script>';
                    } else {
                        echo "Error updating password: " . $conn->error;
                    }
                } else {
                    echo '<script>alert("New password and confirm password do not match.");</script>';
                    echo '<script>window.location.href = "change_password.php";</script>';
                }
            } else {
                echo '<script>alert("Current password is incorrect.");</script>';
                echo '<script>window.location.href = "change_password.php";</script>';
            }
        } else {
            echo '<script>alert("Mentee not found.");</script>';
            echo '<script>window.location.href = "change_password.php";</script>';
        }
    }
}

$conn->close();
?>
