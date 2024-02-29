<?php
include "db.php";

// Process mentor registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mentorUsername = $_POST["mentor-username"];
    $mentorPassword = $_POST["mentor-password"];
    $mentorName = $_POST["mentor-name"];
    $mentorContact = $_POST["mentor-contact"];
    $mentorExperience = $_POST["mentor-experience"];
    $mentorArea = $_POST["mentor-area"];
    $mentorImage = $_POST["mentor-image"];
    $mentorStudentCount = $_POST["mentor-student-count"];

    // Basic validation
    if (empty($mentorUsername) || empty($mentorPassword) || empty($mentorName) || empty($mentorContact) || empty($mentorExperience) || empty($mentorArea) || empty($mentorStudentCount)) {
        $error_message = "Please fill in all the fields.";
    } else {
        // Insert mentor data into the database
        $sql = "INSERT INTO mentor_login (username, password, name, contact, experience, area, image, student_count) VALUES ('$mentorUsername', '$mentorPassword', '$mentorName', '$mentorContact', '$mentorExperience', '$mentorArea', '$mentorImage', '$mentorStudentCount')";

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
    <title>Mentor Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Add your custom CSS styling here -->
</head>
<body>
    <div class="container mt-5">
        <h2>Mentor Registration</h2>

        <?php
        // Display error message if any
        if (isset($error_message)) {
            echo '<p style="color: red;">' . $error_message . '</p>';
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="mentor-username">Username:</label>
                <input type="text" name="mentor-username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mentor-password">Password:</label>
                <input type="password" name="mentor-password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mentor-name">Name:</label>
                <input type="text" name="mentor-name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mentor-contact">Contact:</label>
                <input type="text" name="mentor-contact" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mentor-experience">Experience:</label>
                <input type="text" name="mentor-experience" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mentor-area">Area:</label>
                <input type="text" name="mentor-area" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mentor-image">Image URL:</label>
                <input type="text" name="mentor-image" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mentor-student-count">Student Count:</label>
                <input type="number" name="mentor-student-count" class="form-control" required>
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
