<?php
include "db.php";
// Process mentee registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $menteeUsername = $_POST["mentee-username"];
    $menteePassword = $_POST["mentee-password"];

    // Basic validation
    if (empty($menteeUsername) || empty($menteePassword)) {
        $error_message = "Please enter both username and password.";
    } else {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($menteePassword, PASSWORD_DEFAULT);

        // Insert mentee data into the database
        $sql = "INSERT INTO mentee_login (username, password) VALUES ('$menteeUsername', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to index page after successful registration
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mentee Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Add your custom CSS styling here -->
</head>
<body>
    <div class="container mt-5">
        <h2>Mentee Registration</h2>

        <?php
        // Display error message if any
        if (isset($error_message)) {
            echo '<p style="color: red;">' . $error_message . '</p>';
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="mentee-username">Username:</label>
                <input type="text" name="mentee-username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mentee-password">Password:</label>
                <input type="password" name="mentee-password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        
        <p class="mt-3">Already have an account? <a href="index.php">Login</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
