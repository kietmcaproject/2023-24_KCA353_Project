<?php
include "nav.php";
include "db.php";
session_start(); 

// Fetch mentor information from the database
$mentorUsername = $_SESSION['username'];
$sqlMentor = "SELECT * FROM mentor_login WHERE username = '$mentorUsername';";
$resultMentor = $conn->query($sqlMentor);

if ($resultMentor->num_rows > 0) {
    $mentorInfo = $resultMentor->fetch_assoc();
} else {
    // Handle the case where mentor information is not found
    $mentorInfo = array(); // Set to an empty array or handle appropriately
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="mentorinfo.css">
    <style>
        /* Add custom styles for the mentor image */
       /* Text color for better contrast */
        .mentor-image {
            max-width: 50%; /* Adjust the maximum width as needed */
            height: 250px;
        }

        /* Style for card-styled buttons */
        .card-button {
            width: 20%;
            margin-bottom: 10px;
        }
        
    </style>
    <title>Mentor Information</title>
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

    <!-- Move the mentor card outside the row to have it below the college logo -->
    <div class="container1">
        <div class="row">
            <div class="col-md-6 mentor-info">
                <!-- Display mentor information using Bootstrap cards -->
                <br>
                <div class="card">
                    <!-- Add mentor's image within the card -->
                    <img src="<?php echo $mentorInfo['image']; ?>" class="card-img-top mentor-image" alt="Mentor Image">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $mentorInfo['name']; ?></h4>
                        <p class="card-text"><strong>Contact:</strong> <?php echo $mentorInfo['contact']; ?></p>
                        <p class="card-text"><strong>Experience:</strong> <?php echo $mentorInfo['experience']; ?> years</p>
                        <p class="card-text"><strong>Area:</strong> <?php echo $mentorInfo['area']; ?></p>
                        <!-- Add more mentor information as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <main>
        <div class="container2">
            <h2>Your Mentees and Mentees details:</h2>
            <!-- Rest of your HTML content -->
        </div>
    </main>
    <h5>Mentee Details</h5>
    <a href="addDetails.php" class="btn btn-primary card-button">Add Mentee Details</a>
    <a href="menteedetails.php" class="btn btn-success card-button">See Your Mentee</a>
    <button onclick="logout()" class="btn btn-danger card-button">Logout</button>

   
<script>
    function logout()
    {
        window.location.href = 'logout.php';
    }
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Include your custom JavaScript file if needed -->
    <!-- <script src="mentorhome.js"></script> -->
    <?php
    include "footer.php";
    ?>
</body>
</html>
