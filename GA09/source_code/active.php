<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active Auctions</title>
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #343a40;
            color: #ffffff;
        }

        .container {
            margin-top: 50px;
        }

        .auction-container {
            border: 1px solid #555;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #454d55;
        }

        h3 {
            color: #17a2b8;
        }
    </style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</head>
<body>

    <!-- Include navigation or header if needed -->
    <?php
        include "usernav.php";
    ?>

<div class="container">
        <h1 class="mb-4">Active Auctions</h1>

        <!-- Include the PHP script to display active products -->
        <?php
        include "dbcon.php"; // Include your database connection file
        $current_date = new DateTime();
        $formatted_current_date = $current_date->format('Y-m-d H:i:s');
        // Fetch active products from the database
        $query = "SELECT * FROM products WHERE expiration_date > '$formatted_current_date'";
        $result = mysqli_query($con, $query);

        // Display the active products
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='auction-container'>";
            echo "<h3>{$row['product_name']}</h3>";
            echo "<p>Category: {$row['product_type']}</p>";
            echo "<p>Description: {$row['description']}</p>";
            echo "<p>Base Price: {$row['base_price']}</p>";
            echo "<a href='viewproducts.php?product_id={$row['id']}' class='btn btn-primary view-button'>View</a>";
            echo "</div>";
        }

        mysqli_close($con);
        ?>
    </div>


    <!-- Add your footer if needed -->
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
</body>
</html>
