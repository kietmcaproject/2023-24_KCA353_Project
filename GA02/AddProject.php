<html>
<head>	
<title>Project Link Hub</title>
<link rel="stylesheet" href="mystyle.css" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="overflow: hidden;">

<!--
    Code to insert vertical sidebar 
-->

<input type="checkbox" id="menu-toggle" checked>
<div class="menu dflex">
  <div id="logoCSS3" class="text-center">
    <i class="fa fa-css3"></i>
  </div>
  <div class="elements-container dflex">
    
      <a class="element" href="Deshboardf.php">
        <i class="fa fa-leaf"></i> Deshboard
      </a>
    <a class="element" href="suggestions.php">
        <i class="fa fa-gavel"></i> Suggestions
      </a>
    <a class="element" href="AddProject.php">
        <i class="fa fa-cogs"></i> Add Projects
      </a>
      <a class="element" href="request.php">
        <i class="fa fa-cogs"></i> Pending Requests
      </a>
    <a class="element" href="logout.php">
        <i class="fa fa-cogs"></i> Logout
      </a>
  </div>
  <div class="menu-container-btn">
    <div class="menu-toggle-btn">
      <label class="menu-btn text-center" for="menu-toggle">
          <i class="fa fa-close"></i>
          <i class="fa fa-bars"></i>
        </label>
    </div>
  </div>
</div>


<div class="container d-flex justify-content-center 
    align-items-center"
    style="min-height:100vh; color:white;">
    <div style="border:12px solid black">
<form action="" method="POST" class="border shadow p-3 rounded" >
<h1 class="text-center p-3 mb-5">Add a Project</h1>

<div class="mb-3 m-4">
        <label for="ProjectTitle" 
            class="form-label">Title</label>
        <input type="text" 
            class="form-control" 
            name="ProjectTitle"
            id="ProjectTitle" placeholder="Enter Project Title">
</div>
<div class="mb-3 m-4" >
        <label for="ProjectDesc" 
            class="form-label">Description</label> <br>
            <textarea name="ProjectDesc" id="ProjectDesc" cols="30" rows="10" placeholder="Enter project description"></textarea>
        <!-- <input type="text" 
            class="form-control" 
            name="ProjectDesc"
            id="ProjectDesc"
            placeholder="Enter Project Description"
             style="height: 220px;"> -->

</div>
<input class="btn btn-success m-4" name="ADD" type="submit" value="SUBMIT" ><input class="btn btn-danger"  type="RESET" value="RESET">
</form>
</div>
<?php
$sname="localhost";
$uname="root";
$password="";
$db_name="my_db";
$conn=mysqli_connect($sname,$uname,$password,$db_name);
if(!$conn){
    echo "Connection failed";
    exit();
}
session_start();
$username=$_SESSION['username'];
$role=$_SESSION['role'];

$query = "SELECT `id` FROM `users` WHERE `username` = '$username' AND `role` = '$role' ";
$result = mysqli_query($conn, $query);

if ($result) {
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
    } else {
        echo "Invalid credentials. Please try again.";
    }
} else {
    echo "Error in the query: " . mysqli_error($conn);
}



if(isset($_POST['ADD']))
	{
	$ProjectTitle=$_POST['ProjectTitle'];	
	$ProjectDesc=$_POST['ProjectDesc'];
  $id=$_SESSION['id'];
  if((empty($ProjectTitle))){
   echo "Title is required";
  }
  
  else if((empty($ProjectDesc))){
    echo "Project Description is Requires";    
  }
  else{

	$sql = "INSERT INTO `record` (`fid`,`ProjectTitle`, `ProjectDesc`) 
	VALUES('$id','$ProjectTitle', '$ProjectDesc');";
	if(mysqli_query($conn,$sql)){
	echo "Project has been added submitted successfully";}
	else{
		echo "Something went wrong! please try after some time";
		echo mysqli_error($conn);
	}
}
}
  
?>


</div>
</body>
</html>