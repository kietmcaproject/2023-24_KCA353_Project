<?php

include "db.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
$mentor_id = $_SESSION['username'];

// Fetch data from the 'students' table
$sql = "SELECT id, name, section, contact, department, attendance, ct_marks FROM students WHERE mentor_id='$mentor_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $menteeData = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($menteeData);
} else {
    echo "No mentees found";
}

$conn->close();

?>
