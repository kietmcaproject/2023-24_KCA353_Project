<?php
include "dbcon.php";
session_start();
$userIdentifier = $_SESSION["uname"];
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bidding History</title>
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-dark text-light">

<?php include "usernav.php"?>
<main>
    <div class="container mt-4">
        <h2 class="mb-4">Bidding History</h2>
        <?php if (!empty($userBids)) : ?>
            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Current Bid Amount</th>
                            <th scope="col">Expiration Date</th>
                            <th scope="col">Bid Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userBids as $bid) : ?>
                            <tr>
                                <td><img src="<?php echo $bid['product_image']; ?>" alt="Product Image" class="img-thumbnail" width="50"></td>
                                <td><?php echo $bid['product_name']; ?></td>
                                <td><?php echo $bid['bid_amount']; ?>&nbsp;Rs.</td>
                                <td><?php echo date('F j, Y', strtotime($bid['expiration_date'])); ?></td>
                                <td>
                                    <?php echo ($bid['expiration_date'] < date('Y-m-d')) ? ($bid['id'] == getWinningBidProductId($userIdentifier) ? 'Won Bid' : 'Lost Bid') : '-'; ?>
                                </td>
                                <td>
                                    <?php if ($bid['expiration_date'] < date('Y-m-d')) : ?>
                                        <?php if ($bid['id'] == getWinningBidProductId($userIdentifier)) : ?>
                                            <button class="btn btn-success" onclick="purchaseProduct(<?php echo $bid['id']; ?>)">Purchase</button>
                                        <?php else : ?>
                                            <button class="btn btn-secondary" disabled>Not Eligible</button>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <button class="btn btn-secondary" disabled>Auction Ongoing</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p>No bidding history available.</p>
        <?php endif; ?>
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

<script>
    function purchaseProduct(productId) {
        // Add your logic to handle the purchase of the product with the given productId
        window.location.href = 'payment.php?productId=' + productId;
    }
</script>

<?php
// Function to get the product ID with the highest bid for a user
function getWinningBidProductId($userIdentifier) {
    global $con;
    $sql = "SELECT product_id FROM bids WHERE user_id = '$userIdentifier' ORDER BY bid_amount DESC LIMIT 1";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['product_id'];
}
?>
</body>
</html>
