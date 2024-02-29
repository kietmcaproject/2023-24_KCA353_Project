<?php
include "db.php";
session_start();

if (isset($_SESSION['id'])) {
    $menteeid = $_SESSION['id'];

    // Fetch mentor_id from the 'students' table
    $sqlMentorId = "SELECT mentor_id FROM students WHERE id='$menteeid'";
    $resultMentorId = $conn->query($sqlMentorId);

    if ($resultMentorId->num_rows > 0) {
        $row = $resultMentorId->fetch_assoc();
        $mentor_id = $row['mentor_id'];

        // Fetch mentor information from the 'mentor_login' table using the obtained mentor_id
        $sqlMentor = "SELECT * FROM mentor_login WHERE mentor_id = '$mentor_id'";
        $resultMentor = $conn->query($sqlMentor);

        if ($resultMentor->num_rows > 0) {
            $mentorInfo = $resultMentor->fetch_assoc();
            echo json_encode($mentorInfo);
        } else {
            echo json_encode(['error' => 'Mentor data not found']);
        }
    } else {
        echo json_encode(['error' => 'Mentor ID not found for the mentee']);
    }
} else {
    echo json_encode(['error' => 'Session not set']);
}

$conn->close();
?>
