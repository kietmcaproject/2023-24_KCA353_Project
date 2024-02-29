<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "studentandteacher";
$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Handle the form submission
if (isset($_POST['teacherId'])) {
    $teacherId = $_POST['teacherId'];
    $teacherName = $_POST['teacherName'];
    $department = $_POST['department'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    // Upload teacher image
    $teacherpic = $_FILES['teacherpic']['name'];
    $targetDir = "teacher_uploads/";
    $targetFile = $targetDir . basename($teacherpic);
    move_uploaded_file($_FILES['teacherpic']['tmp_name'], $targetFile);
    if (isset($_FILES['teacherpic']) && is_uploaded_file($_FILES['teacherpic']['tmp_name'])) {
        $teacherImage = $_FILES['teacherpic']['name'];
        $targetDir = "teacher_uploads/";
        $targetFile = $targetDir . basename($teacherImage);
        if (move_uploaded_file($_FILES['teacherpic']['tmp_name'], $targetFile)) {
            // File uploaded successfully, proceed with the rest of the code
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "No file uploaded or upload failed.";
    }
    

    // Insert data into the database
    $sql = "INSERT INTO teacher (teacher_id, teacher_name, department, contact, teacher_pic)
            VALUES ('$teacherId', '$teacherName', '$department', '$contact', '$teacherpic')";

    if (mysqli_query($connection, $sql)) {
        echo "Teacher added successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Teacher Registration</h1>
        <form action="addteacher.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="teacherId">Teacher ID</label>
                <input type="text" class="form-control" id="teacherId" name="teacherId" required>
            </div>
            <div class="form-group">
                <label for="teacherName">Teacher Name</label>
                <input type="text" class="form-control" id="teacherName" name="teacherName" required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" class="form-control" id="department" name="department" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="teacherImage">Teacher Image</label>
                <input type="file" class="form-control-file" id="teacherImage" name="teacherImage" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
