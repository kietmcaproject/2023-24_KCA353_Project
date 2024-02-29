<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "studentandteacher";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize assignedStudents array to track assignments
$assignedStudents = array();

// Fetch student data from the database
$student_data = "";
$result = $conn->query("SELECT student_id, student_name FROM student");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $student_data .= "<option value='" . $row['student_id'] . "'>" . $row['student_name'] . "</option>";
    }
}

// Fetch teacher data from the database
$teacher_data = "";
$result = $conn->query("SELECT teacher_id, teacher_name FROM teacher");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $teacher_data .= "<option value='" . $row['teacher_id'] . "'>" . $row['teacher_name'] . "</option>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['student_id']) && isset($_POST['teacher_id'])) {
        $student_id = $_POST['student_id'];
        $teacher_id = $_POST['teacher_id'];

        // Check if the student has already been assigned to a mentor
        if (array_key_exists($student_id, $assignedStudents)) {
            echo "This student is already assigned to a mentor.";
        } else {
            // Check if the teacher has already been assigned to a student
            $teacherAssigned = array_search($teacher_id, $assignedStudents);
            if ($teacherAssigned !== false) {
                echo "This teacher is already assigned to a student.";
            } else {
                // Update the assigned students and mentors
                $assignedStudents[$student_id] = $teacher_id;

                // Insert the assignment into the database (Use prepared statements)
                $stmt = $conn->prepare("INSERT INTO mentor_mentee (student_id, teacher_id) VALUES (?, ?)");
                $stmt->bind_param("ii", $student_id, $teacher_id);
                if ($stmt->execute()) {
                    echo "Assignment successful!";
                } else {
                    echo "Error: " . $conn->error;
                }
            }
        }
    } else {
        echo "Invalid request.";
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
    <div class="header">
    <div class="logo1"><a href="mentorU.php" style="color: white;">MentorU</a></div>



    <div class="logo2">
        <button id="sign-out-btn" onclick="signOut()">Sign out</button>
    </div>
        <h1>Admin Panel</h1>
    </div>

    
       
    </div>
    

    </div>
    <div class="content">
        
        <img class="logoc" src="collegelogo.jpeg" alt="College Logo">
        <h2>KIET Group of Institutions</h2>
        <h3>Assign Mentees and Mentors</h3>

        <div class="form">
            <div>
                <h4>Students (Mentees):</h4>
                <select id="student-list">
              <?php echo $student_data; ?>
              </select>
            </div>
            <div>
                <h4>Teachers (Mentors):</h4>
                <select id="teacher-list">
               <?php echo $teacher_data; ?>
                </select>
            </div>
            <button onclick="assignMentor()">Assign Mentor</button>
        </div>

        <div id="assigned-mentors">
            <h3>Assigned Mentors</h3>
            <ul id="mentor-mentee-list">
                <!-- Mentor-Mentee assignments will be listed here -->
            </ul>
        </div>
        
    </div>
    <div class="add-button">
    <a href="addstudent.php" class="add-button">Add New Student</a>

<!-- Button to Add New Teacher -->
<a href="add_teacher.php" class="add-button">Add New Teacher</a>
    </div>

    <script>
             function signOut() {
        // Redirect the user to the "index.html" page or any other desired URL
        window.location.href = "mentorU.php";
    

    // Add a click event listener to the "Sign Out" button
    document.getElementById("sign-out-btn").addEventListener("click", signOut);

             }
        </script>
        
    </div>
    <script src="admin.js"></script>

</body>
</html>
