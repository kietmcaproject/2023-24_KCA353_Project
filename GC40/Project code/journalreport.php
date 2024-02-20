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
        background-color: orange;
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
<br><br>
</body>
</html>
<?php
$con = mysqli_connect('localhost', 'root', '', 'facultydb');
$sql="select * from journaltbl";
$data=mysqli_query($con,$sql);
echo' <table class="tbl">
<tr>
<th>Faculty Name</th>
<th>Faculty Id</th>
<th>Department</th>
<th>affiliated</th>
<th>publisher</th>
<th>manuscript</th>
<th>journal</th>
<th>publicationyear</th>
<th>publicationdate</th>
<th>issnnumber</th>
<th>linkweb</th>
<th>linkart</th>
<th>volumeno</th>
<th>issueno</th>
<th>pagenumber</th>
<th>category</th>
<th>proof</th>
<th>author</th>
<th>authorsid</th>
<th>sdg</th>
<th>collaboration</th>
<th>personsname</th>
<th>institutename</th>
<th>recommendation</th>
</tr>';
//$i=0;
while($rows=mysqli_fetch_assoc($data))
{
    //$i++;
   echo"<tr><td>".$rows["facultyname"]."</td>"."<td>".$rows["facultyid"]."</td>"."<td>".$rows["department"]."</td>"."<td>".$rows["affiliated"]."</td>"."<td>".$rows["publisher"]."</td>"."<td>".$rows["manuscript"]."</td>"."<td>".$rows["journal"]."</td>"."<td>".$rows["publicationyear"]."</td>"."<td>".$rows["publicationdate"]."</td>"."<td>".$rows["issnnumber"]."</td>"."<td>".$rows["linkweb"]."</td>"."<td>".$rows["linkart"]."</td>"."<td>".$rows["volumeno"]."</td>"."<td>".$rows["issueno"]."</td>"."<td>".$rows["pagenumber"]."</td>"."<td>".$rows["category"]."</td>"."<td>".$rows["proof"]."</td>"."<td>".$rows["author"]."</td>"."<td>".$rows["authorsid"]."</td>"."<td>".$rows["sdg"]."</td>"."<td>".$rows["collaboration"]."</td>"."<td>".$rows["personsname"]."</td>"."<td>".$rows["institutename"]."</td>"."<td>".$rows["recommendation"]."</td></tr>";
   //,,,,,,,,,,,,,,,,,,,,,,,
  //echo $rows["id"].",".$rows["password"].",".$rows["name"];
  
  
}
?>