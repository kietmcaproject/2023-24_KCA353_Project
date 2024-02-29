<?php
include "dbcon.php";
session_start();

// Check if the user is logged in
if (!isset($_SESSION["uname"])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

$userIdentifier = $_SESSION["uname"];

// Fetch user details
$userDetails = getUserDetails($userIdentifier);

function getUserDetails($userIdentifier) {
    global $con;

    $sql = "SELECT name FROM register WHERE username = '$userIdentifier'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $userDetails = mysqli_fetch_assoc($result);
        return $userDetails;
    } else {
        // Handle the case where the query fails
        return null;
    }
}

// Fetch the user's bids from the database
$userBids = array();
$sql = "SELECT products.id, products.product_name, products.product_image, products.expiration_date, bids.bid_amount
        FROM bids
        INNER JOIN products ON bids.product_id = products.id
        WHERE bids.user_id = '$userIdentifier'";

$result = mysqli_query($con, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $userBids[] = $row;
    }
}

// Count of won and lost bids
$wonBidCount = 0;
$lostBidCount = 0;

foreach ($userBids as $bid) {
    if ($bid['expiration_date'] < date('Y-m-d') && $bid['id'] == getWinningBidProductId($userIdentifier)) {
        $wonBidCount++;
    } else {
        $lostBidCount++;
    }
}

function getWinningBidProductId($userIdentifier) {
    global $con;
    $sql = "SELECT product_id FROM bids WHERE user_id = '$userIdentifier' ORDER BY bid_amount DESC LIMIT 1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['product_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-dark text-light">

<?php include "usernav.php"?>
<main class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <h2 class="mb-4">User Profile</h2>
            <hr>
            <h4>My Biddings</h4>
            <?php if (!empty($userBids)) : ?>
                <ul>
                    <?php foreach ($userBids as $bid) : ?>
                        <li><?php echo $bid['product_name']; ?> - <?php echo $bid['bid_amount']; ?>&nbsp;Rs.</li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p>No bidding history available.</p>
            <?php endif; ?>
        </div>
        <div class="col-md-8">
            <h2>Welcome, <?php echo $userDetails['name']; ?>!</h2>
            <p>Total Won Bids: <?php echo $wonBidCount; ?></p>
            <p>Total Lost Bids: <?php echo $lostBidCount; ?></p>
        </div>
    </div>
</main>

<footer class="bg-dark text-light py-3">
    <div class="container">
        <!-- Footer content -->
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>
</html>
