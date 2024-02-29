<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'restaurant';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Initialize variables to store user input and error messages
$email = $mobile = $itemsOrdered = $totalPrice = "";
$emailErr = $mobileErr = $itemsOrderedErr = $totalPriceErr = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = sanitizeInput($_POST["email"]);
        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate mobile number
    if (empty($_POST["mobile"])) {
        $mobileErr = "Mobile number is required";
    } else {
        $mobile = sanitizeInput($_POST["mobile"]);
        // You can add more validation for mobile number if needed
    }

    // Validate items ordered
    if (empty($_POST["itemsOrdered"])) {
        $itemsOrderedErr = "Items ordered are required";
    } else {
        $itemsOrdered = sanitizeInput($_POST["itemsOrdered"]);
        // You can add more validation for items ordered if needed
    }

    // Validate total price
    if (empty($_POST["totalPrice"])) {
        $totalPriceErr = "Total price is required";
    } else {
        $totalPrice = sanitizeInput($_POST["totalPrice"]);
        // You can add more validation for total price if needed
    }

    // If there are no validation errors, insert data into the database
    if (empty($emailErr) && empty($mobileErr) && empty($itemsOrderedErr) && empty($totalPriceErr)) {
        $sql = "INSERT INTO orders (email, mobile, items_ordered, total_price) VALUES ('$email', '$mobile', '$itemsOrdered', '$totalPrice')";

        if ($conn->query($sql) === TRUE) {
            echo "Order placed successfully!";
            // You can redirect the user to a confirmation page or perform other actions
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>


