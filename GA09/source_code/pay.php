<?php
include "dbcon.php";

$username = $_POST['username'];
$productId = $_POST['productId'];
$ctype = $_POST['ctype'];
$name = $_POST['name'];
$cno = $_POST['cno'];
$month = $_POST['month'];
$year = $_POST['year'];
$exp = $month . "/" . $year;
$cvv = $_POST['cvv'];
$amount = $_POST['amount'];
$productName = $_POST['product'];

// Check if the product ID is already purchased
$checkSql = "SELECT * FROM purchases WHERE product_id = '$productId' AND username = '$username'";
$checkResult = mysqli_query($con, $checkSql);

if (mysqli_num_rows($checkResult) > 0) {
    // Product is already purchased
    echo "<script>alert('This product has already been purchased.');</script>";
    echo "<script>window.location.href='my_biddings.php' ;</script>";
    exit();
}

// Product is not purchased, proceed with the insertion
$sql = "INSERT INTO purchases (username, cardtype, cardname, cardnumber, expiry, cvv, amount, productname, product_id, date) 
        VALUES ('$username', '$ctype', '$name', '$cno', '$exp', '$cvv', '$amount', '$productName', '$productId', CURDATE())";

if (mysqli_query($con, $sql)) {
    // Purchase successful, redirect to the bill page
    header("Location: bill.php");
    exit();
} else {
    // Handle the case where the purchase couldn't be completed
    header("Location: error.php");
    exit();
}
?>
