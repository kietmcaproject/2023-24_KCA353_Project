<?php
include "db.php"; // Include your database connection file
$menteeId = $_GET['menteeId'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $counseling_date = $_POST['counseling_date'];
    $up_counseling_date = $_POST['up_counseling_date'];
    echo "Upcoming Counseling Date: " . $up_counseling_date;
    $counseling_remark = $_POST['counseling_remark'];
    $counseling_suggestion = $_POST['counseling_suggestion'];
    
    // Handle file upload
    $target_dir = "uploads/"; // Create a directory for uploads
    $target_file = $target_dir . basename($_FILES["achievement_document"]["name"]);

    if (move_uploaded_file($_FILES["achievement_document"]["tmp_name"], $target_file)) {
        // File uploaded successfully, insert data into the database
        $sql = "INSERT INTO counseling_records (id,counseling_date, counseling_remark, counseling_suggestion, achievement_document,upcoming_date)
                VALUES ('$menteeId','$counseling_date', '$counseling_remark', '$counseling_suggestion', '$target_file','$up_counseling_date')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Record added successfully."); window.location.replace(document.referrer);</script>';
                
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading file";
    }

    $conn->close();
}
?>
