<?php



include "db.php"; // Assuming this file contains your database connection details
session_start();
$mentor_id = $_SESSION['username'];
$menteeId = $_GET['id'];

// Fetch data from the 'students' table, assuming there is a common column 'student_id' between 'students' and 'parents_details'

$sql = "SELECT 
            students.id, 
            students.name, 
            students.roll_no, 
            students.unv_no, 
            students.section, 
            students.department, 
            students.attendance, 
            students.image,
            parents_details.father_name, 
            parents_details.mother_name, 
            parents_details.contact,
            parents_details.leetcode,
            parents_details.linkedin,
            parents_details.github,
            marks.ct1_marks,
            marks.ct2_marks,
            marks.pue_marks
        FROM students
        LEFT JOIN parents_details ON students.id = parents_details.id
        LEFT JOIN marks ON students.id = marks.id
        WHERE students.id = '$menteeId'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $studentData = $result->fetch_assoc(); // Assuming there is only one student per mentor
} else {
    $studentData = array(); // If no student found, set to an empty array
}
$sqlCounseling = "SELECT counseling_date FROM counseling_records WHERE id='$menteeId'";
$resultCounseling = $conn->query($sqlCounseling);
$counselingData = array();

if ($resultCounseling->num_rows > 0) {
    while ($rowCounseling = $resultCounseling->fetch_assoc()) {
        $counselingData[] = $rowCounseling;
    }
}
// if ($resultMentor->num_rows > 0) {
// $mentorInfo = $resultMentor->fetch_assoc();
// }
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Dashboard</title>
  
        <style>
            header {
    background-color: #343a40;
    color: #ffffff;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.college-logo {
    max-width: 100%;
    height: auto;
    margin-left: auto;
}

.mentoru-logo {
    max-width: 15%;
    height: auto;
    margin-right: auto;
    animation: rotate 5s linear infinite;
    transform-origin: center center;
}
@keyframes rotate {
    from {
        transform: rotateY(0deg);
    }
    to {
        transform: rotateY(360deg);
    }
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
    <!-- <nav class="flex"> -->
        <!-- <div class="leftNav"> -->
            <!-- <img src="./logo.jfif" alt=""> -->
        <!-- </div> -->

        <!-- <div class="rightNav"> -->
            <!-- <h1>KIET Group Of Institutions</h1> -->
        <!-- </div> -->
    </nav>
    <div class="main">
        <div class="left flex">
        <img src="<?php echo $studentData['image']; ?>" alt="Student Image" class="img">

     <div class="details">
    <p><b>Name :</b> <?php echo $studentData['name']; ?></p>
    <p><b>University no :</b> <?php echo $studentData['unv_no']; ?></p>
    <p><b>Roll no :</b> <?php echo $studentData['roll_no']; ?></p>
    <p><b>Lib ID :</b> <?php echo $studentData['id']; ?></p>
    <p><b>Section :</b> <?php echo $studentData['section']; ?></p>
    <p><b>Contact :</b> <?php echo $studentData['contact']; ?></p>
    <p> <b>Session :</b> 2022-2024 </p>
</div>

<h2>Parent Details</h2>
<div class="details">
    <p> <b>Father's Name :</b><?php echo $studentData['father_name']; ?> </p>
    <p> <b>Mother's Name :</b> <?php echo $studentData['mother_name']; ?></p>
    <p> <b>Phone no :</b> <?php echo $studentData['contact']; ?> </p> 
</div>
                <h2>Other Details</h2>
                <p> <b>Leetcode :</b> <?php echo $studentData['leetcode']; ?></p>
                <p> <b>LinkedIn :</b> <?php echo $studentData['linkedin']; ?></p>
                <p> <b>Github :</b> <?php echo $studentData['github']; ?></p>
                <p> <b>Add Other</b> </p>
                <br>
                <h2>Previous Counselling Details</h2>
                <!-- <p> <b>Number of Counselling :</b> </p> -->
                <php> <b>Previous Counselling Date :</b><?php if (!empty($counselingData)) {
                            foreach ($counselingData as $counseling) {
                                echo "<div>Date: " . $counseling['counseling_date'] . "</div>";
                                echo "<hr>";
                            }
                        } else {
                            echo "<p>No previous counseling data available.</p>";
                        }
                        ?></p>
               
                

                <br><br><br>
                
                <button class="connect-button" id="connectButton">
                    <i class="fa fa-link"></i> Connect for Counselling
                  </button>
                
                  <!-- Container for additional buttons -->
                  <div class="additional-buttons" id="additionalButtons">
                    <!-- <a href="call.html"><button>Call</button></a> -->
                    <a href="https://meet.google.com/" class="btn btn-success card-button" target="_blank">Initiate Video call</a>
                  </div>
                
                
                
                <br><br>
      

        </div>
          
        

        <div class="right flex">
            <div class="heading">
                <h1>Semester 3</h1>
            </div>
            <div class="bottomLeft flex">
                <table class="tftable" border="1">
                    <tr>
                        <th>CT 1</th>
                        <th>CT 2</th>
                        <th>PUE</th>
                        
                    </tr>
                    <tr>
                <td><?php echo $studentData['ct1_marks']; ?>%</td>
                <td><?php echo $studentData['ct2_marks']; ?>%</td>
                <td><?php echo $studentData['pue_marks']; ?>%</td>
                </tr>
                </table>
            </div>
          <div class="cardsWrapper flex">
    <h1>Attendance</h1>
    <h1><?php echo $studentData['attendance']; ?>%</h1>
    <div class="cardsContainer flex">
        <div class="chart flex">
            <canvas id="myChart" style="width: 100%; max-width: 600px;"></canvas>
        </div>
    </div>
</div>

                    <div class="cards flex">
                        <div class="card">
                            <h1>80%</h1>
                            <p>Academic Performence</p>
                        </div>
                        <div class="card">
                            <h1>80%</h1>
                            <p>Coding Performence</p>
                        </div>
                        <div class="card">
                            <h1>80%</h1>
                            <p>Improvement</p>
                        </div>
                        
                    </div>
                </div>

            </div>

            <div class="counselling flex">
    <h1>Counselling Details</h1>

    <div class="counsellingContainer flex">
        <form action="submit_counseling.php?menteeId=<?php echo $menteeId; ?>" method="post" enctype="multipart/form-data">
            <div class="type flex">
                <label for="counseling_type">Counselling Type</label>
                <select name="counseling_type">
                    <option value="0">Choose one:</option>
                    <option value="1">Normal</option>
                    <option value="2">Marks</option>
                    <option value="3">Attendance</option>
                    <option value="4">Personal</option>
                    <option value="5">Other</option>
                    <option value="6">Alumni</option>
                </select>
            </div>
            <div class="type flex">
                <label for="counseling_date">Counseling Date</label>
                <input type="date" name="counseling_date" required>
            </div>
            <div class="type flex">
                <label for="up_counseling_date">Upcoming Counseling Date:</label>
                <input type="date" name="up_counseling_date" required>
            </div>
            <div class="type flex">
                <label for="counseling_remark">Counseling Remark</label>
                <textarea name="counseling_remark" placeholder="Enter the counseling remark" cols="30" rows="3" required></textarea>
            </div>
            <div class="type flex">
                <label for="counseling_suggestion">Counseling Suggestion</label>
                <textarea name="counseling_suggestion" placeholder="Enter the counseling suggestion" cols="30" rows="3" required></textarea>
            </div>
            <div class="type flex">
                <label for="achievement_document">Achievement Upload Document</label>
                <input type="file" id="achievement_document" name="achievement_document">
            </div>
            <input type="hidden" name="menteeId" value="<?php echo $menteeId; ?>">
            <div class="btn flex">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>


    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    


    <script src="./main.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> -->
    <?php
    include "footer.php";
    ?>
</body>

</html>