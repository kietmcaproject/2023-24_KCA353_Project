<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal</title>
    <link rel="stylesheet" href="journal.css">
    <style>
        .Journal{
            color:red;
        }
    </style>
</head>

<body>
    <nav>
        <img src="logot.png" alt="" class="logo">
        <ul>
            <li><a href="journal.php " class="Journal">Journal Publication</a></li>
            <li><a href="book.php">Book Publication</a></li>
            <li><a href="patent.php">Patents</a></li>
            <li><a href="fdp1.php">FDP</a></li>
            <li><a href="report.php">Reports</a></li>

            <li><a href="faculty.php">Add Faculty</a></li>
            <li><a href="register.php">Registered Faculty</a></li>
            <li><a href="index.php">Home</a></li>
        </ul>
    </nav>
    <div class="container">
        <br><br>
        <form action="journal.php" method="post">
            <label for="name" class="lblform">Faculty Name : </label><br>
            <input type="text" id="facultyname " class="demo" placeholder="Enter faculty name"
                name="facultyname"><br><br>

            <label for="id" class="lblform">Faculty Id : </label><br>
            <input type="text" id="facultyid" class="demo" placeholder="Enter faculty id" name="facultyid"> <br><br>

            <label for="department" class="lblform">Department : </label><br>
            <select id="department" class="demo1" name="department">
                <option value="department">Select your department</option>
                <option value="mca">MCA</option>
                <option value="mba">MBA</option>
                <option value="cse">CSE</option>
                <option value="it">IT</option>
                <option value="ml">ML</option>
                <option value="cs">CS</option>
                <option value="csit">CSIT</option>
                <option value="me">ME</option>
                <option value="aiml">AI-ML</option>
                <option value="bpharma">B-PHARMA</option>
                <option value="mpharma">M-PHARMA</option>
            </select><br><br>

            <label for="affiliation" class="lblform">KIET Affiliated : </label><br>
            <select id="affiliated" class="demo1" name="affiliated"><br><br>
                <option value="NA">Select your affiliation</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select><br><br>

            <label for="publisher" class="lblform">Publisher : </label><br>
            <input type="text" name="publisher" class="demo" placeholder="Enter the name of publisher"><br><br>

            <label for="manuscript" class="lblform">Title of the Manuscript : </label><br>
            <input type="text" name="manuscript" class="demo" placeholder="Enter the title of the manuscript"><br><br>

            <label for="journal" class="lblform">Name of Journal : </label><br>
            <input type="text" name="journal" class="demo" placeholder="Enter the name of journal"><br><br>

            <label for="yearpublication" class="lblform">Year of publication : </label><br>
            <input type="number" name="publicationyear" class="demo"
                placeholder="Enter the year of publication like 2021"><br><br>

            <label for="datepublication" class="lblform">Date of the publication : </label><br>
            <input type="date" name="publicationdate" class="demo2"><br><br>

            <label for="issnnumber" class="lblform">ISSN number : </label><br>
            <input type="number" name="issnnumber" class="demo"><br><br>

            <label for="linkjournal" class="lblform">Link to website of the Journal : </label><br>
            <input type="text" name="linkweb" class="demo"><br><br>

            <label for="linkarticle" class="lblform">Link to article/paper/abstract of the article/ web link of DOI :
            </label><br>
            <input type="text" name="linkart" class="demo"><br><br>

            <label for="vjournal" class="lblform">Volume No (For Journal) : </label><br>
            <input type="number" name="volumeno" class="demo"><br><br>

            <label for="" class="lblform">Issue No. (For Journal) : </label><br>
            <input type="number" name="issueno" class="demo"><br><br>

            <label for="" class="lblform">Page Numbers (For Journal) : </label><br>
            <input type="number" name="pagenumber" id="" class="demo"><br><br>

            <label for="" class="lblform">Category of Journal : </label><br>
            <select id="catojournal" class="demo1" name="category"><br><br>
                <option value="NA">Select category</option>
                <option value="yes">SCIE</option>
                <option value="no">SSCI</option>
                <option value="no">SCI</option>
                <option value="no">eSCI</option>
                <option value="no">SCOPUS</option>
            </select><br><br>

            <label for="" class="lblform">Upload the proof for the published paper (shareable link) : </label><br>
            <input type="text" name="proof" id="" class="demo"> <br><br>

            <label for="" class="lblform">Name of all the authors : </label><br>
            <input type="text" name="author" id="" class="demo"> <br><br>

            <label for="" class="lblform">KIET faculty ID of all the authors : </label><br>
            <input type="text" name="authorsid" id="" class="demo"> <br><br>

            <label for="" class="lblform">Please Map Outcome with the following SDGs (SDG (1-17)) : </label><br>
            <input type="number" name="sdg" id="" class="demo"> <br><br>

            <label for="" class="lblform">Is the research with outside Institutions in collaboration : </label>
            &emsp;<input type="radio" name="collaboration" id="">Yes &emsp;
            <input type="radio" name="collaboration" id="">No <br><br>

            <label for="" class="lblform">Name of persons (Outside the KIET Institution) : </label><br>
            <input type="text" name="personsname" id="" class="demo"> <br><br>

            <label for="" class="lblform">Name of the Outside Institutions / Organizations : </label><br>
            <input type="text" name="institutename" id="" class="demo"> <br><br>

            <label for="" class="lblform">Departmental DRC Recommendation : </label>
            &emsp;<input type="radio" name="recommendation" id=""> Recommended &emsp;
            <input type="radio" name="recommendation" id=""> Not Recommended<br><br>
            <input type="submit" name="submit" id="submit">

        </form>
    </div>
</body>

</html>

<?php
$con = mysqli_connect('localhost', 'root', '', 'facultydb');
//echo"connected successfully";
if (isset($_POST["submit"])) {

    $facultyname = $_POST["facultyname"];
    $facultyid = $_POST["facultyid"];
    $department = $_POST["department"];
    $affiliated = $_POST["affiliated"];
    $publisher = $_POST["publisher"];
    $manuscript = $_POST["manuscript"];
    $journal = $_POST["journal"];
    $publicationyear = $_POST["publicationyear"];
    $publicationdate = $_POST["publicationdate"];
    $issnnumber = $_POST["issnnumber"];
    $linkweb = $_POST["linkweb"];
    $linkart = $_POST["linkart"];
    $volumeno = $_POST["volumeno"];
    $issueno = $_POST["issueno"];
    $pagenumber = $_POST["pagenumber"];
    $category = $_POST["category"];
    $proof = $_POST["proof"];
    $author = $_POST["author"];
    $authorsid = $_POST["authorsid"];
    $sdg = $_POST["sdg"];
    $collaboration = $_POST["collaboration"];
    $personsname = $_POST["personsname"];
    $institutename = $_POST["institutename"];
    $recommendation = $_POST["recommendation"];

    
    $sql = "insert into journaltbl(facultyname,facultyid,department,affiliated,publisher,manuscript,journal,publicationyear,publicationdate,issnnumber,linkweb,linkart,volumeno,issueno,pagenumber,category,proof,author,authorsid,sdg,collaboration,personsname,institutename,recommendation)values('$facultyname','$facultyid','$department','$affiliated','$publisher','$manuscript','$journal','$publicationyear','$publicationdate','$issnnumber','$linkweb','$linkart','$volumeno','$issueno','$pagenumber','$category','$proof','$author','$authorsid','$sdg','$collaboration','$personsname','$institutename','$recommendation')";
    mysqli_query($con, $sql);
    echo "<script> alert('saved successfully')</script>";

}
?>