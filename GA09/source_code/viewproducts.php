<?php
// Start the session (if not already started)
session_start();

// Include "dbcon.php" and other necessary files
include "dbcon.php";

function alert($msg, $redirect = null) {
    echo "<script>alert('$msg');";
    if ($redirect) {
        echo "window.location.href='$redirect';";
    }
    echo "</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bid_amount"])) {
    // Assuming you have a user ID stored in the session
    $userId = $_SESSION["uname"];

    $bidAmount = mysqli_real_escape_string($con, $_POST["bid_amount"]);
    $productId = mysqli_real_escape_string($con, $_POST["product_id"]);

    if (!is_numeric($bidAmount) || $bidAmount <= 0) {
        alert("Invalid bid amount. Please enter a valid amount.");
    } else {
        // Fetch the base price of the product
        $basePriceQuery = "SELECT base_price FROM products WHERE id = '$productId'";
        $basePriceResult = mysqli_query($con, $basePriceQuery);

        if ($basePriceResult && $basePriceRow = mysqli_fetch_assoc($basePriceResult)) {
            $basePrice = $basePriceRow['base_price'];

            // Check if the bid amount is greater than the base price
            if ($bidAmount > $basePrice && $bidAmount > $product['highest_bid_amount']) {
                // Update the highest bid amount for the product in the database
                $updateHighestBidSQL = "UPDATE products SET highest_bid_amount = '$bidAmount' WHERE id = '$productId'";
                mysqli_query($con, $updateHighestBidSQL);
            
                // Insert the bid into the database with user ID
                $insertBidSQL = "INSERT INTO bids (user_id, product_id, bid_amount) VALUES ('$userId', '$productId', '$bidAmount')";
                $result = mysqli_query($con, $insertBidSQL);
            
                if ($result) {
                    // Bid successfully placed
                    // Redirect to the same page to prevent form resubmission
                    $redirectUrl = $_SERVER["PHP_SELF"];
                    alert("Bid placed successfully!", $redirectUrl);
                    exit();
                } else {
                    // Handle the case where the bid couldn't be inserted into the database
                    alert("Error placing bid. Please try again later.");
                }
            } else {
                // Bid amount is not valid
                alert("Invalid bid amount. The bid must be greater than the base price and the current highest bid.");
            }
        } else {
            // Handle the case where the base price couldn't be retrieved
            alert("Error retrieving base price. Please try again later.");
        }
    }
}

// Fetch products after processing the bid
$products = array();
$sql = "SELECT products.*, MAX(bids.bid_amount) AS highest_bid_amount
        FROM products
        LEFT JOIN bids ON products.id = bids.product_id
        GROUP BY products.id";

$result = mysqli_query($con, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        .card {
            margin: 20px;
        }

        .card img {
            max-width: 100%;
            height: auto;
        }

        /* Dark theme for the card */
        .dark-card {
            background-color: #343a40;
            color: white;
        }

        /* CSS for the "Go Back to Top" button */
        #goTopButton {
            position: fixed;
            border-radius: 15%;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            display: none;
            background-color: crimson; 
            border: none;
        }

        /* Ensure the footer stays at the bottom of the page */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }
        footer{
            margin-top: 50px;
        }
    </style>
</head>
<body>

<?php include "usernav.php"?>
<main>
    <a id="top"></a>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($products as $product) : ?>
    <div class="col">
        <div class="card h-100 dark-card">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo $product['product_image']; ?>" class="card-img-top" alt="Product Image">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['product_name']; ?></h5>
                        <p class="card-text">Brand: <?php echo $product['brand']; ?></p>
                        <p class="card-text">Base Price: <?php echo $product['base_price']; ?>&nbsp;Rs.</p>
                        <p class="card-text">Highest Bid: <?php echo $product['highest_bid_amount']; ?>&nbsp;Rs.</p>
                        <p class="card-text">Quantity: <?php echo $product['quantity']; ?></p>
                        <p class="card-text">Seller: <?php echo $product['seller_name']; ?></p>
                        <p class="card-text">Expiration Date: <?php echo date('F j, Y', strtotime($product['expiration_date'])); ?></p>
                        <p class="card-text">Description: <?php echo $product['description']; ?></p>

                        <form method="post">
                            <div class="mb-3">
                                <label for="bid_amount" class="form-label">Your Bid Amount (Rs.)</label>
                                <input type="number" class="form-control" id="bid_amount" name="bid_amount" required>
                            </div>
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                            <button type="submit" class="btn btn-primary" onclick="return validateBid(<?php echo $product['highest_bid_amount']; ?>)">Place Bid</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

        </div>
    </div>
</main>

<footer class="bg-dark text-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <p>&copy; 2023 E-Auction Platform</p>
                <p>About Us <br>
                  E-Auction is committed to providing an enjoyable and secure e-auction experience for all our users. We're passionate about connecting people with the products they love and helping sellers reach a broad and engaged audience. Our dedicated support team is always ready to assist you with any questions or concerns.</p>
            </div>
            <div class="col-lg-6 text-right">
                <p>Contact Us</p>
                <p>Have questions or need assistance? Feel free to reach out to us at [akashs@e-auction.com], and our support team will get back to you as soon as possible.</p>
            </div>
        </div>
    </div>
</footer>

<a id="goTopButton" class="btn btn-primary" href="#top"><img src="Images/top.png" alt="Top" width="35px" height="40px"></a>
<script>
    // JavaScript to show/hide the button when scrolling
    var goTopButton = document.getElementById("goTopButton");
    window.addEventListener("scroll", function() {
        if (window.scrollY > 200) {
            goTopButton.style.display = "block";
        } else {
            goTopButton.style.display = "none";
        }
    });

    // Scroll to the top when the button is clicked
    goTopButton.addEventListener("click", function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    function validateBid(highestBid) {
        var bidAmount = document.getElementById("bid_amount").value;
        if (bidAmount <= highestBid) {
            alert("Invalid bid amount. The bid must be greater than the highest bid.");
            return false;
        }
        return true;
    }
</script>
</body>
</html>
