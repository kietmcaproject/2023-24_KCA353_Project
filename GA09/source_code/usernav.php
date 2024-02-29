<style>
    /* Add hover effect to navigation links */
    .navbar-nav .nav-link:hover {
        background-color:#333 ; 
        color: #2E86DE; 
        border-radius: 5%;
        transition: background-color 0.3s, color 0.3s;
    }
</style>


<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2E86DE;">
    <div class="container">
        <a class="navbar-brand" href="main.php" style="color: #FFF; font-family: 'Arial', sans-serif; font-size: 24px;">
            <img src="Images/bid.png" alt="bid" width="60px" height="50px" class="mr-2">
            My Auction Site
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"  style ="padding:10px">
                    <a class="nav-link active" href="main.php" style="color: #FFF;">Home</a>
                </li>
                <li class="nav-item"  style ="padding:10px">
                    <a class="nav-link active" href="active.php" style="color: #FFF;">Active Auctions</a>
                </li>
                <li class="nav-item"  style ="padding:10px">
                    <a class="nav-link" href="viewproducts.php" style="color: #FFF;">View Products</a>
                </li>
                <li class="nav-item"  style ="padding:10px">
                    <a class="nav-link" href="my_biddings.php" style="color: #FFF;">View Biddings</a>
                </li>
                <li class="nav-item dropdown"  style ="padding:10px">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" style="color: #FFF;">
                        More
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile.php" style="color: #333;">Profile</a></li>
                        <li><a class="dropdown-item" href="logout.php" style="color: #333;">Sign out</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="faq.html" style="color: #333;">FAQ</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
