<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FDP</title>
    <link rel="stylesheet" href="fdp1.css">
</head>
<body>
    <nav>
        <img src="logot.png" alt="" class="logo">
        <ul>
           <li><a href="journal.php" >Journal Publication</a></li>
            <li><a href="book.php">Book Publication</a></li>
            <li><a href="patent.php">Patents</a></li>
            <li><a href="fdp1.php" class="fdp">FDP</a></li>
            <li ><a href="report.php" >Reports</a></li>
            
            <li><a href="faculty.php">Add Faculty</a></li>
            <li><a href="register.php">Registered Faculty</a></li>
            <li><a href="index.php">Home</a></li>            
        </ul>
    </nav>
    <div class="container">
       <form action="fdp1.php" method="post">

        <label for=""  class="dem">Faculty Name : </label><br>
        <input type="text" name="facultyname" placeholder="Enter faculty name" class="demo"><br><br>

        <label for=""  class="dem">FDP Id : </label><br>
        <input type="text" name="fdpid" placeholder="Enter faculty development program id" class="demo"><br><br>

        <label for=""  class="dem">FDP Name : </label><br>
        <input type="text" name="fdp" placeholder="Enter faculty development program" class="demo"><br><br>

        <label for=""  class="dem">Duration : From</label><br>
        <input type="date" name="durationfrom" placeholder="Enter the duration of fdp from" class="demo1"><br><br>
        
        <label for=""  class="dem">Duration : To</label><br>
        <input type="date" name="durationto" placeholder="Enter the duration of fdp to " class="demo1"><br><br>

        <label for=""  class="dem">Week : </label><br>
        <input type="number" name="week" placeholder="Enter the week of fdp " class="demo"><br><br>

        <label for=""  class="dem">Mode : </label><br> 
        <select name="mode" id="" class="demo2">
            <option value="Online">Select your mode</option>
            <option value="Online">Online</option>
            <option value="Online">Offline</option>
        </select><br><br>
        
        <label for=""  class="dem">Sponsered by : </label><br>
        <input type="text" name="sponseredby" placeholder="Enter the sponser" class="demo"><br><br>

        <label for=""  class="dem">Organizing Institute : </label><br>
        <input type="text" name="organizinginstitute" placeholder="Enter organizing institute" class="demo"><br><br>

        <input type="submit" name="submit" class="submitbtn">

       </form>
    </div>
</body>        
</html>
<?php
$con=mysqli_connect('localhost','root','','facultydb');
//echo"connected successfully";
if(isset($_POST["submit"]))
{
$facultyname=$_POST["facultyname"];
$fdpid=$_POST["fdpid"];
$fdp=$_POST["fdp"];
$durationfrom=$_POST["durationfrom"];
$durationto=$_POST["durationto"];
$week=$_POST["week"];
$mode=$_POST["mode"];
$sponseredby=$_POST["sponseredby"];
$organizinginstitute=$_POST["organizinginstitute"];
$sql="insert into fdptbl(facultyname,fdp,durationfrom,durationto,week,mode,sponseredby,organizinginstitute,fdpid)values('$facultyname','$fdp','$durationfrom','$durationto','$week','$mode','$sponseredby','$organizinginstitute','$fdpid')"; 
mysqli_query($con,$sql);
echo"<script> alert('saved successfully')</script>";
}
?>