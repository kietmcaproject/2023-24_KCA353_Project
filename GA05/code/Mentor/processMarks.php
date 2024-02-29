<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include "db.php";

    // Get form data
    $id = $_POST["id"];
    $ct1_marks = $_POST["ct1_marks"];
    $ct2_marks = $_POST["ct2_marks"];
    $pue_marks = $_POST["pue_marks"];

    // Prepare and execute the SQL statement to insert data into the marks table
    $sql = "INSERT INTO marks (id, ct1_marks, ct2_marks, pue_marks) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siii", $id, $ct1_marks, $ct2_marks, $pue_marks);

    // Check if the query was successful
    if ($stmt->execute()) {
        // Use JavaScript to show an alert and redirect to the previous page
        echo '<script>alert("Marks added successfully."); window.location.replace(document.referrer);</script>';
    } else {
        // Use JavaScript to show an alert and redirect to the previous page
        echo '<script>alert("Error adding marks: ' . $stmt->error . '"); window.location.replace(document.referrer);</script>';
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}

?>
