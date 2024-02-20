<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal</title>
    <link rel="stylesheet" href="register.css">
    <style>
        .register{
            color:red;
        }
    </style>
</head>
<body>
    <nav>
        <img src="logot.png" alt="" class="logo">
        
        <ul>
            <li><a href="journal.php" >Journal Publication</a></li>
            <li><a href="book.php">Book Publication</a></li>
            <li><a href="patent.php">Patents</a></li>
            <li><a href="fdp1.php">FDP</a></li>
            <li><a href="report.php">Reports</a></li>
            
            <li><a href="faculty.php">Add Faculty</a></li>
            <li><a href="register.php" class="register">Registered Faculty</a></li>
            <li><a href="index.php">Home</a></li>       
        </ul>
    </nav>
</body>
</html>
<?php
$con = mysqli_connect('localhost', 'root', '', 'facultydb');
$sql="select * from facultytbl";
$data=mysqli_query($con,$sql);
echo' <table class="tbl">
<tr>
    <th>Faculty Id</th>
    <th>Name</th>
    <th>Designation</th>
    <th>Date Of Joining</th>
    <th>Department</th>
    <th>Email Id</th>
    <th>Phone</th>
</tr>
<tr>';
//$i=0;
while($rows=mysqli_fetch_assoc($data))
{
    //$i++;
   echo"<tr><td>".$rows["id"]."</td>"."<td>".$rows["name"]."</td>"."<td>".$rows["designation"]."</td>"."<td>".$rows["dateofjoining"]."</td>"."<td>".$rows["department"]."</td>"."<td>".$rows["emailid"]."</td>"."<td>".$rows["phone"]."</td>";
  //echo $rows["id"].",".$rows["password"].",".$rows["name"];
  
  
}

?>