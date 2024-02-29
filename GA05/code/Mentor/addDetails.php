<?php include "nav.php";?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="addDetails.css">
    <title>Add Mentee Details</title>
    
</head>
<body>
    <header>
    <div class="col-md-6">
    <img src="logo-no-background.png" alt="MentorU Logo" class="mentoru-logo img-fluid">
</div>
<div class="col-md-6 text-right">
    <img src="collegeimg.webp" alt="College Logo" class="college-logo img-fluid">
</div>
    </header>

    <button onclick="addMentee()">Add Mentee</button>
    <button onclick="addMarks()">Add Mentee Marks</button>
    <button onclick="addParent()">Add Mentee Parents</button>
    <button onclick="addSocial()">Add Mentee Social Links</button>


    <!-- <footer class="mt-5">
        <p>&copy; 2023 MentorU</p>
        <p id="date-time"></p>
    </footer> -->

    <!-- Inline script for updating date and time -->
    <!-- <script>
        function updateDateTime() {
            const now = new Date();
            const datetimeSpan = document.getElementById('date-time');
            datetimeSpan.innerText = now.toLocaleString();
        } -->

        <!-- // Update date and time every second
        setInterval(updateDateTime, 1000);
        updateDateTime(); // Initial update -->
    <!-- </script> --> 

    <script>
        function addMentee() {
            window.location.href = 'addstd.php';
        }

        function addMarks() {
            window.location.href = 'addMarks.php';
        }

        function addParent() {
            window.location.href = 'addParent.php';
        }

        function addSocial() {
            window.location.href = 'addSocial.php';
        }
    </script>
    <?php
    include "footer.php";
    ?>
</body>
</html>
