<?php
include "db.php";
session_start();
$menteeid = $_SESSION["mentee_id"];

// Fetch mentor_id and mentee information from the 'students' table
$sqlMentorId = "SELECT mentor_id FROM students WHERE id='$menteeid'";
$resultMentorId = $conn->query($sqlMentorId);

if ($resultMentorId->num_rows > 0) {
    $row = $resultMentorId->fetch_assoc();
    $mentor_id = $row['mentor_id'];

    // Fetch mentor information from the 'mentor_login' table using the obtained mentor_id
    $sqlMentor = "SELECT * FROM mentor_login WHERE username = '$mentor_id'";
    $resultMentor = $conn->query($sqlMentor);
    // Fetch upcoming counseling date from the 'counseling_records' table
    $sqlUpcomingCounseling = "SELECT MIN(upcoming_date) AS upcoming_date FROM counseling_records WHERE id='$menteeid' AND upcoming_date > CURDATE()";
    $resultUpcomingCounseling = $conn->query($sqlUpcomingCounseling);
    $upcomingCounselingDate = ($resultUpcomingCounseling->num_rows > 0) ? $resultUpcomingCounseling->fetch_assoc()['upcoming_date'] : null;
    
    //Fetch the counseling remark
    $sqlCounseling = "SELECT counseling_date, counseling_remark, counseling_suggestion FROM counseling_records WHERE id='$menteeid'";
        $resultCounseling = $conn->query($sqlCounseling);
        $counselingData = array();

        if ($resultCounseling->num_rows > 0) {
            while ($rowCounseling = $resultCounseling->fetch_assoc()) {
                $counselingData[] = $rowCounseling;
            }
        }
    if ($resultMentor->num_rows > 0) {
        $mentorInfo = $resultMentor->fetch_assoc();
        // Fetch response chat content from the 'req_res' table
$sqlResponseChat = "SELECT id, response FROM req_res WHERE mentor_id = '$mentor_id' AND id = '$menteeid'";
$resultResponseChat = $conn->query($sqlResponseChat);
$responseChatData = array();

if ($resultResponseChat->num_rows > 0) {
    while ($rowResponseChat = $resultResponseChat->fetch_assoc()) {
        $responseChatData[] = $rowResponseChat;
    }
}

        // Update mentor information on the page
        $mentorPhoto = $mentorInfo['image'];
        $mentorName = $mentorInfo['name'];
        $mentorContact = $mentorInfo['contact'];
    } else {
        echo "Mentor data not found";
    }

    // Fetch mentee information from the 'students' table
    $sqlMentee = "SELECT * FROM students WHERE id = '$menteeid'";
    $resultMentee = $conn->query($sqlMentee);

    if ($resultMentee->num_rows > 0) {
        $menteeInfo = $resultMentee->fetch_assoc();

        // Update mentee information on the page
        // $menteePhoto = $menteeInfo['image'];
        $menteeName = $menteeInfo['name'];
        $menteeContact = $menteeInfo['contact'];
        $menteeSection = $menteeInfo['section'];
        $menteeDept = $menteeInfo['department'];
        $menteeAtten = $menteeInfo['attendance'];
        
        
        
    } else {
        echo "Mentee data not found";
    }
} else {
    echo "Mentor ID not found for the mentee";
}
// Check if the request form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit-request'])) {
    $requestText = $_POST['info-request'];

    // Insert the request information into the 'req_rep' table
    $sqlInsertRequest = "INSERT INTO req_res (id, request, mentor_id) VALUES ('$menteeid', '$requestText','$mentor_id')";
    
    if ($conn->query($sqlInsertRequest) === TRUE) {
        echo "Request submitted successfully";
    } else {
        echo "Error: " . $sqlInsertRequest . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="menteedash.css">
    <title>Mentee Dashboard</title>
    <style>
        /* Add your custom styles here */
        body {
            background-color: #f8f9fa;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
        }

        .college-info img {
            max-width: 50px;
        }

        .mentor-info img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
        }

        .card-title {
            color: #007bff;
        }

        .card-body {
            padding: 20px;
        }

        hr {
            border-top: 1px solid #007bff;
            margin: 10px 0;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .button-container {
  text-align: right;
  margin-top: 10px; /* Adjust the margin as needed */
}
    </style>
</head>

<body>
    <header class="header">
        <div class="container d-flex justify-content-between">
            <div class="college-info d-flex align-items-center">
                <img src="logo-no-background.png" alt="MentorU Logo" class="mr-2">
                <h1 class="mb-0">MentorU</h1>
            </div>
            <div class="mentor-info d-flex align-items-center">
                <img src="<?php echo $mentorPhoto; ?>" alt="Mentor Photo" class="mr-2 rounded-circle">
                <div class="contact-info">
                    <p class="mb-0"><?php echo $mentorName; ?></p>
                    <p class="mb-0">Contact: <?php echo $mentorContact; ?></p>
                </div>
            </div>
        </div>
    </header>

    <section class="container mt-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Profile</h2>
                        <div class="mentee-info d-flex align-items-center">
                            <!-- <img src="<?php echo $menteePhoto; ?>" alt="Mentee Photo" class="mr-2 rounded-circle"> -->
                            <div class="contact-info">
                                <p class="mb-0"><?php echo $menteeName; ?></p>
                                <p class="mb-0">Contact: <?php echo $menteeContact; ?></p>
                                <p class="mb-0">Section: <?php echo $menteeSection; ?></p>
                                <p class="mb-0">Department: <?php echo $menteeDept; ?></p>
                                <p class="mb-0">Attendance: <?php echo $menteeAtten; ?>%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Previous Counseling</h2>
                        <?php
                        if (!empty($counselingData)) {
                            foreach ($counselingData as $counseling) {
                                echo "<div>Date: " . $counseling['counseling_date'] . "</div>";
                                echo "<div>Remark: " . $counseling['counseling_remark'] . "</div>";
                                echo "<div>Suggestion: " . $counseling['counseling_suggestion'] . "</div>";
                                echo "<hr>";
                            }
                        } else {
                            echo "<p>No previous counseling data available.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
    
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Upcoming Counseling</h2>
                        <?php
                        if ($upcomingCounselingDate) {
                            echo "<p><b>Upcoming Counseling Date: </b>" . $upcomingCounselingDate . "</p>";
                        } else {
                            echo "<p>No upcoming counseling date available.</p>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">Chat</h2>
                        <!-- Form for requesting information -->
                        <form id="request-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="mb-3">
                                <label for="info-request" class="form-label">Request:</label>
                                <textarea id="info-request" name="info-request" class="form-control" rows="5" cols="50" required></textarea>
                            </div>
                            <button type="submit" name="submit-request" class="btn btn-primary">Submit Request</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Response Chat Box -->
                <div class="card mb-4 response-chat">
                    <h2 class="card-title">Response Chat</h2>
                    <!-- Response chat content goes here -->
                    <?php
                    if (!empty($responseChatData)) {
                        foreach ($responseChatData as $responseChat) {
                            echo "<div>ID: " . $responseChat['id'] . "</div>";
                            echo "<div>Response: " . $responseChat['response'] . "</div>";
                            echo "<hr>";
                        }
                    } else {
                        echo "<p>No response chat data available.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
   


                 </div> 
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Contact Mentor</h2>
                        <!-- <button id="audio-call-btn" class="btn btn-primary">Initiate Audio Call</button> -->
                        <a href="https://meet.google.com/" class="btn btn-success card-button" target="_blank">Initiate Video call</a>

                    </div>
                </div>
            </div> 
        </div>
       
        <div class="button-container">
  <button onclick="logout()" class="btn btn-danger card-button">Logout</button>
</div>

    <script>
    function logout()
    {
        window.location.href = 'logout.php';
    }
</script>
  
</section>

    <script src="menteedash.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
   
</body>

</html>
