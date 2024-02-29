<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction Page</title>
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
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
    </style>
</head>
<body>
<a id="top"></a>
    <section>
    <?php
     include"usernav.php";
    ?>
  
<!-- Main content -->
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8" style="color:#D3D3D3;">
            <h1>Welcome to E-Auction Platform</h1>
            <hr>
            <p>Discover, bid, and win exciting products in our online auctions.</p>
            <p> At E-Auction, we offer you a unique online auction experience where you can discover, bid, and win exciting products. Our platform brings together buyers and sellers in a dynamic and competitive marketplace. Whether you're a seasoned auction enthusiast or new to the world of e-auctions, we have something for everyone.</p>
            <hr>
            <p>Why Choose E-Auction?

            Wide Range of Products: Explore a diverse range of products, from collectibles and antiques to the latest gadgets and fashion items. Our auctions feature something for every interest and budget.

            Exciting Bidding: Engage in thrilling bidding wars with other users. Our real-time bidding system ensures that you can stay on top of the action and compete for the items you desire.

            Transparency and Security: We prioritize transparency and security in every transaction. You can trust our platform to protect your personal information and ensure fair and honest auctions.

            Easy-to-Use Interface: Our user-friendly interface makes it easy to browse, bid, and manage your auctions. You can participate in auctions from the comfort of your home, using any device.</p>

        </div>
        <div class="col-lg-4">
        <div class="col-md-7">
                <img src="Images/main.png" alt="Online Bidding" width="400">
            </div>
            
        </div>
    </div>
</div>

<!-- Footer -->
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
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
</body>
</html>