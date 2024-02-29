<?php
include "db.php";
session_start();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the POST request
$mentorId = $_SESSION['username']; // Add this line to retrieve the mentor ID
$id = $_POST['id'];
$name = $_POST['name'];
$section = $_POST['section'];
$rollno = $_POST['rollNumber'];
$uniroll = $_POST['universityRollNo'];
$contact = $_POST['contact'];
$department = $_POST['department'];
$attendance = $_POST['attendance'];
$menteeImage = $_POST["image"];
$password = $_POST['password']; // Add this line to retrieve the password

// Insert data into the 'students' table including 'mentor_id' and 'password'
$sql = "INSERT INTO students (id, name, section, contact, department, attendance,mentor_id, password,roll_no,unv_no,image)
        VALUES ('$id', '$name', '$section', '$contact', '$department', '$attendance','$mentorId', '$password','$rollno','$uniroll','$menteeImage')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Student Added Successfully');window.location.replace(document.referrer);</script>";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
