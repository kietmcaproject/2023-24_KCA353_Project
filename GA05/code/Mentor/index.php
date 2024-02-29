<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>College Portal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="mentorU.css">
</head>
<body>
    <header>
        <img src="collegelogo.jpeg" alt="College Logo">
        <h1>KIET Group of Institutions</h1>
        <br>
        
    </header>
    <div class="container">
        <h2>Online Mentorship Program</h2>
        
    </div>
    <main>
    

        <section id="mentor" class="login-section login-option">
            <h2>Mentor Login</h2>
            <form id="mentor-form" method="post" action="mentor_login.php">
                <div class="form-group">
                    <input type="text" placeholder="Username" id="mentor-username" name="mentor-username" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" id="mentor-password" name="mentor-password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" id="mentor-login-button">Login</button>
                <a href="forgetpass.php" class="forgot-password-link">Forgot Password?</a>
                <p class="mt-3">Don't have an account? <a href="mentor_registration.php">Register as a Mentor</a></p>
            </form>
        </section>

        <section id="logo-section" class="logo-section">
            <img src="logo-no-background.png" alt="Your Logo">
        </section>
        
        <section id="mentee" class="login-section login-option">
            <h2>Mentee Login</h2>
            <form id="mentee-form" method="post" action="mentee_login.php">
                <div class="form-group">
                    <input type="text" placeholder="Username" id="mentee-username" name="mentee-username" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" id="mentee-password" name="mentee-password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" id="mentee-login-button">Login</button>
                <a href="change_password.php">Change Password</a>
            </form>
        </section>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- <script src="MentorU.js"></script> -->
</body>
</html>
