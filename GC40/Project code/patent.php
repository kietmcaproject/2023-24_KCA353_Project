<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patent</title>
    <link rel="stylesheet" href="patent.css">
    <style>
        .patent{
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
            <li><a href="patent.php" class="patent">Patents</a></li>
            <li><a href="fdp1.php">FDP</a></li>
            <li><a href="report.php">Reports</a></li>
            
            <li><a href="faculty.php">Add Faculty</a></li>
            <li><a href="register.php">Registered Faculty</a></li>
            <li><a href="index.php">Home</a></li>            
        </ul>
    </nav>
    <div class="container">
        <br><br>
        <form action="patent.php" method="post">
            <label for="name" class="lblform">Applicant Name : </label> <br>
            <input type="text"  id="facultyname " name="applicantname" class="demo" placeholder="Enter applicant name"><br><br>

            <label for="id" class="lblform">Faculty Id : </label><br>
            <input type="text" name="facultyid" class="demo" placeholder="Enter faculty id"> <br><br>

            <label for="" class="lblform">Name of all Co-Applicant : </label><br>
            <input type="text" name="coapplicant" id="" class="demo" placeholder="In the same order as in proof"><br><br>

            <label for="" class="lblform">Patent Application Number/ Patent Number : </label><br>
            <input type="number" name="patentnumber" id="" class="demo" placeholder="Enter application number or patent number"><br><br>

            <label for="" class="lblform">Title of Patent Published / Granted : </label><br>
            <input type="text" name="patentpublished" id="" class="demo" placeholder="Title should be same as in the Document which will be uploaded as a proof"><br><br>

            <label for="" class="lblform">Status : </label>&emsp;<br>
            <select name="status" id="" class="demo1">
                <option value="NA">Choose status</option>
                <option value="published">Published</option>
                <option value="granted">Granted</option>
            </select><br><br>
            
            <label for="" class="lblform">Date : </label><br>
            <input type="date" name="date" id="" class="demo"><br><br>

            <label for="" class="lblform">Level of the Patent : </label>&emsp;<br>
            <select name="patentlevel" id="" class="demo1">
                <option value="NA">Select level</option>
                <option value="national">National</option>
                <option value="international">International</option>
                
            </select><br><br>
            

            <label for="" class="lblform">Name of the Patent Office Applied (Indian/ Australian/ US etc.) : </label><br>
            <select id="appli" class="demo1" name="patentoffice"><br><br>
                <option value="NA">Select country</option>
                <option value="indian">Indian</option>
                <option value="australian">Australian</option>
                <option value="us">US</option>
            </select><br><br>

            <label for="" class="lblform">Upload the proof of Patent in pdf format : </label><br>
            <input type="file" name="uploadproof" id="" class="demo" placeholder="KIET Affiliation and Author name must reflect in pdf."><br><br>


            <label for="" class="lblform">Is the research with outside Institutions in collaboration : </label>
            &emsp;<input type="radio" name="outsideinstitutionscollaboration" id="" >Yes &emsp;
            <input type="radio" name="outsideinstitutionscollaboration" id="" > No <br><br>

            <label for="" class="lblform">Name of persons (Outside the KIET Institution) : </label><br>
            <input type="text" name="personsname" id="" class="demo"> <br><br>

            <label for="" class="lblform">Name of the Outside Institutions / Organizations : </label><br>
            <input type="text" name="outsideinstitutions" id="" class="demo"> <br><br>

            <label for="" class="lblform">Please Map Outcome with the following SDGs (SDG (1-17)) : </label><br>
            <input type="number" name="sdg" id="" class="demo"> <br><br>

            <label for="" class="lblform">Departmental DRC Recommendation : </label>
            &emsp;<input type="radio" name="drcrecommend" id=""  > Recommended &emsp;
            <input type="radio" name="drcrecommend" id="" > Not Recommended<br><br>


            <input type="submit" name="submit" id="submit">
        </form>
    </div>
</body>
</html>
<?php
$con = mysqli_connect('localhost','root','','facultydb');
//echo"Connected successfully";
if(isset($_POST["submit"]))
{
$applicantname = $_POST["applicantname"];
$facultyid = $_POST["facultyid"];
$coapplicant = $_POST["coapplicant"];
$patentnumber = $_POST["patentnumber"];
$patentpublished = $_POST["patentpublished"];
$status = $_POST["status"];
$date = $_POST["date"];
$patentlevel = $_POST["patentlevel"];
$patentoffice = $_POST["patentoffice"];
$uploadproof = $_POST["uploadproof"];
$outsideinstitutionscollaboration = $_POST["outsideinstitutionscollaboration"];
$personsname = $_POST["personsname"];
$outsideinstitutions = $_POST["outsideinstitutions"];
$sdg = $_POST["sdg"];
$drcrecommend = $_POST["drcrecommend"];

$sql="insert into patenttbl(applicantname,facultyid,coapplicant,patentnumber,patentpublished,status,date,patentlevel,patentoffice,uploadproof,outsideinstitutionscollaboration,personsname,outsideinstitutions,sdg,drcrecommend)values('$applicantname','$facultyid','$coapplicant','$patentnumber','$patentpublished','$status','$date','$patentlevel','$patentoffice','$uploadproof','$outsideinstitutionscollaboration','$personsname','$outsideinstitutions','$sdg','$drcrecommend')"; 

mysqli_query($con,$sql);
echo"<script> alert('saved successfully')</script>";
}
?>