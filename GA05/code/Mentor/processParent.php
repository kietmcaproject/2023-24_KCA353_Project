<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include "db.php";

    // Get form data
    
    $id = $_POST["id"];
    $father_name = $_POST["father_name"];
    $mother_name = $_POST["mother_name"];
    $contact = $_POST["contact"];

    // Prepare and execute the SQL statement to insert data into the parents_details table
    $sql = "INSERT INTO parents_details (id,father_name, mother_name,contact) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss",$id, $father_name, $mother_name, $contact);

    // Check if the query was successful
    if ($stmt->execute()) {
        echo '<script>alert("Parent details added successfully."); window.location.replace(document.referrer);</script>';
    } else {
        echo '<script>alert("Error adding parent details: ' . $stmt->error . '"); window.location.replace(document.referrer);</script>';
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}

?>
