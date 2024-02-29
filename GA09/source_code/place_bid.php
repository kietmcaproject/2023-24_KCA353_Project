<?php
include "dbcon.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve bid information from the form
    $bidAmount = mysqli_real_escape_string($con, $_POST["bid_amount"]);
    $productId = mysqli_real_escape_string($con, $_POST["product_id"]);

    // Validate the bid amount (you can add more validation as needed)
    if (!is_numeric($bidAmount) || $bidAmount <= 0) {
        // Handle invalid bid amount
        echo "Invalid bid amount. Please enter a valid amount.";
        exit();
    }

    // Insert the bid into the database
    $insertBidSQL = "INSERT INTO bids (product_id, bid_amount) VALUES ('$productId', '$bidAmount')";
    $result = mysqli_query($con, $insertBidSQL);

    if ($result) {
        // Bid successfully placed
        echo "Bid placed successfully!";
    } else {
        // Handle the case where the bid couldn't be inserted into the database
        echo "Error placing bid. Please try again later.";
    }
} else {
    // Redirect to the product listing page if accessed without a POST request
    header("Location: view_products.php");
    exit();
}
?>
