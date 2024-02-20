<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="report.css">
    <style>
    .report {
        color: red;
    }

    .btn1 {
        padding: 12px;
        margin-left: 275px;
        text-decoration: none;
        background-color: gold;
        color: black;
        border-radius:10px;
    }

    .btn1:hover {
        color: white;
        background-color: brown;
    }

    .btn2 {
        padding: 12px;
        margin-left: 75px;
        text-decoration: none;
        background-color: gold;
        color: black;
        border-radius:10px;
    }
    .btn2:hover {
        color: white;
        background-color: brown;
    }

    .btn3 {
        padding: 12px;
        margin-left: 75px;
        text-decoration: none;
        background-color: gold;
        color: black;
        border-radius:10px;
    }
    .btn3:hover {
        color: white;
        background-color: brown;
    }

    .btn4 {
        
        padding: 12px;
        margin-left: 75px;
        text-decoration: none;
        background-color: gold;
        color: black;
        border-radius:10px;
    
    } 
    .btn4:hover {
        color: white;
        background-color: brown;
    }
    
    </style>
</head>

<body>
    <nav>
        <img src="logot.png" alt="" class="logo">
        <ul>
            <li><a href="journal.php">Journal Publication</a></li>
            <li><a href="book.php">Book Publication</a></li>
            <li><a href="patent.php">Patents</a></li>
            <li><a href="fdp1.php">FDP</a></li>
            <li><a href="report.php" class="report">Reports</a></li>

            <li><a href="faculty.php">Add Faculty</a></li>
            <li><a href="register.php">Registered Faculty</a></li>
            <li><a href="index.php">Home</a></li>
        </ul>
    </nav>
    <div class="container"><br>
        <a href="journalreport.php" class="btn1">Journal Publication Report</a>
        <a href="bookreport.php" class="btn2">Book Publication Report</a>
        <a href="patentreport.php" class="btn3">Patent Report</a>
        <a href="fdpreport.php" class="btn4">FDP Report</a>
    </div>

</body>

</html>