<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include "db.php";

    $mentee_id = $_POST["id"];
    $response = $_POST["response"];

    // Use prepared statements to avoid SQL injection
    $sqlMentorId = "SELECT mentor_id FROM students WHERE id=?";
    $stmtMentorId = $conn->prepare($sqlMentorId);
    $stmtMentorId->bind_param("s", $mentee_id);
    $stmtMentorId->execute();
    $resultMentorId = $stmtMentorId->get_result();

    if ($resultMentorId->num_rows > 0) {
        $row = $resultMentorId->fetch_assoc();
        $mentor_id = $row['mentor_id'];

        // Use prepared statement to insert a new record with the updated response
        $sqlInsert = "INSERT INTO req_res (id, response, mentor_id) VALUES (?, ?, ?)";
        $stmtInsert = $conn->prepare($sqlInsert);
        $stmtInsert->bind_param("sss", $mentee_id, $response, $mentor_id);

        if ($stmtInsert->execute()) {
            echo '<script>alert("Response updated successfully."); window.location.replace(document.referrer);</script>';
        } else {
            echo '<script>alert("Error updating response: ' . $stmtInsert->error . '"); window.location.replace(document.referrer);</script>';
        }

        $stmtInsert->close();
    } else {
        echo '<script>alert("Mentee not found."); window.location.replace(document.referrer);</script>';
    }

    $stmtMentorId->close();
    $conn->close();
}
?>
