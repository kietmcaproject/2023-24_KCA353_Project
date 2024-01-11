<?php
$con = mysqli_connect('localhost', 'root', '', 'career_path');

if (!$con) {
    echo "not connected";
} else {
    echo "connected";

    // Get data from the POST request
    $full = $_POST['full'];
    $mail = $_POST['mail'];

    // Insert data into the database
    $query = "INSERT INTO student_data (NAME,EMAIL) VALUES ('$full', '$mail')";
    mysqli_query($con, $query);
}
?>
