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
        margin-left: 325px;
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
        background-color: orange;
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
    th{
        border: 0.5px solid black;
        color: blue;
        padding: 20px;
        
    }
    td{
        border: 1px solid black;
        color: black;
        padding: 12px;
    }
    .tbl{
        margin-left:12px;
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
    </div><br><br>

</body>
</html>
<?php
$con = mysqli_connect('localhost', 'root', '', 'facultydb');
$sql="select * from patenttbl";
$data=mysqli_query($con,$sql);
echo' <table class="tbl">
<tr>
    <th> applicantname</th>
    <th> facultyid</th>
    <th> coapplicant</th>
    <th> patentnumber</th>
    <th> patentpublished</th>
    <th> status</th>
    <th> date</th>
    <th> patentlevel</th>
    <th> patentoffice</th>
    <th> uploadproof</th>
    <th> collaboration</th>
</tr>';
//$i=0;
while($rows=mysqli_fetch_assoc($data))
{
    //$i++;
   echo"<tr><td>".$rows["applicantname"]."</td>"."<td>".$rows["facultyid"]."</td>"."<td>".$rows["coapplicant"]."</td>"."<td>".$rows["patentnumber"]."</td>"."<td>".$rows["patentpublished"]."</td>"."<td>".$rows["status"]."</td>"."<td>".$rows["date"]."</td>"."<td>".$rows["patentlevel"]."</td>"."<td>".$rows["patentoffice"]."</td>"."<td>".$rows["uploadproof"]."</td>"."<td>".$rows["outsideinstitutionscollaboration"]."</td></tr>";
  //echo $rows["id"].",".$rows["password"].",".$rows["name"];
  
  
}
?>