<?php
 
include "nav.php";

include "db.php";
session_start();
$mentor_id = $_SESSION['username'];

// Fetch data from the 'students' table
$sql = "SELECT id, name, section, contact, department, attendance FROM students WHERE mentor_id='$mentor_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $menteeData = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $menteeData = array(); // If no mentees found, set to an empty array
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="menteedetails.css">
    <title>Mentee Information</title>
    <style>
        .footer{
            margin-bottom: 1px;
        }
        </style>
</head>
<body>
    <header>
    <div class="col-md-6">
    <img src="logo-no-background.png" alt="MentorU Logo" class="mentoru-logo img-fluid">
</div>
<div class="col-md-6 text-right">
    <img src="collegeimg.webp" alt="College Logo" class="college-logo img-fluid">
</div>
    </header>
    <br>
    <hr>
    <main>
        <div class="container">
            <h2>Your Mentees:</h2>
            <!-- Rest of your HTML content -->

            <h5>Mentee Details</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Section</th>
                        <th>Contact</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menteeData as $mentee) : ?>
                        <tr>
                            <td><?php echo $mentee['id']; ?></td>
                            <td><?php echo $mentee['name']; ?></td>
                            <td><?php echo $mentee['section']; ?></td>
                            <td><?php echo $mentee['contact']; ?></td>
                            <td><?php echo $mentee['department']; ?></td>
                            <td><a href="view_students.php?id=<?php echo $mentee['id']; ?>" class="btn btn-primary">View Students</a></td>
                            <td>
                <a href="req_rep.php?id=<?php echo $mentee['id']; ?>" class="btn btn-info">See Messages</a>
            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </main>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.js delivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Include your custom JavaScript file if needed -->
    <!-- <script src="mentorhome.js"></script> -->
    <?php
    include "footer.php";
    ?>
</body>
</html>
