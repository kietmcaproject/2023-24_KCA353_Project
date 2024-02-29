<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style1.css">
    
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <a href="#">Home</a>
            <a href="about.php">About</a>
            <a href="services.php">Services</a>
            <a href="index.php"  class="btn btn-primary card-button">login</a>
        </nav>

        <!-- College Name and Logo Container -->
        <div class="college-info">
            <img src="./collegelogo.jpeg" alt="College Logo" class="college-logo" id="collegeLogo">
            <span class="college-name">Kiet Group of Institutions</span>
        </div>
    </header>
    <main class="flexD">
    <a href="index.php" style="display: flex; justify-content: center; align-items: center; text-decoration: none; color: inherit;">
            <img src="./logo-no-background.png" class="" id="img" alt="">
        </a>


        <h1>Welcome to Online Mentorship Program</h1>
        <div class="form hide" id="form">
</main>

              
<footer class="mt-5">
        <p>&copy; 2023 MentorU</p>
        <p id="date-time"></p>
    </footer>

    <!-- Inline script for updating date and time -->
    <script>
        function updateDateTime() {
            const now = new Date();
            const datetimeSpan = document.getElementById('date-time');
            datetimeSpan.innerText = now.toLocaleString();
        }

        // Update date and time every second
        setInterval(updateDateTime, 1000);
        updateDateTime(); // Initial update
    </script>
    <script src="./main1.js"></script>
    
</body>

</html>
