<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check which form is submitted (login or signup)
    if (isset($_POST["login"])) {
        // Handle login form data
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Validate and process login data as needed
        // ...

        // Example: Authenticate user, redirect, etc.
        echo "Login form submitted";
    } elseif (isset($_POST["signup"])) {
        // Handle signup form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm = $_POST["confirm"];

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'restaurant');
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the registration table
        $stmt = $conn->prepare("INSERT INTO registration (name, email, password, confirm) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $hashedPassword, $confirm);
        $stmt->execute();
        $stmt->close();

        echo "Registration successful";

        $conn->close();
    } else {
        echo "Invalid form submission";
    }
} else {
    echo "Invalid request method";
}
?>