<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include "db.php";

    // Get form data
    $id = $_POST["id"];
    $leetcode_link = $_POST["leetcode_link"];
    $linkedin_link = $_POST["linkedin_link"];
    $github_link = $_POST["github_link"];

    // Prepare and execute the SQL statement to update data in the parents_details table
    $sql = "UPDATE parents_details SET leetcode = ?, linkedin = ?, github = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $leetcode_link, $linkedin_link, $github_link, $id);

    // Check if the query was successful
    if ($stmt->execute()) {
        echo '<script>alert("Social links updated successfully."); window.location.replace(document.referrer);</script>';
    } else {
        echo '<script>alert("Error updating social links: ' . $stmt->error . '"); window.location.replace(document.referrer);</script>';
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}

?>
