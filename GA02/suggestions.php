
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
$query="select * from `suggestion`"; 
$result=mysqli_query($conn,$query); 
?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title>Suggestions</title> 
        
    <link rel="stylesheet" href="mystyle.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	</head> 
	<body> 

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

    <h1 style="text-align:center">Suggestions</h1>
	<table align="center" border="1px" style="color:white; width:800px; line-height:40px;"> 
	
			  <th> Student </th> 
			  <th> Project-Title </th> 
			  <th> Project-Description </th>
              <th> Time </th> 
			  
			  
		</tr> 
		
		<?php 
    $i=0;
    while($rows=mysqli_fetch_assoc($result))  
		{ 
      $i++;
		?> 
		<tr> <td><?php echo $rows['Sname']; ?></td> 
		<td><?php echo $rows['ProjectTitle']; ?></td> 
		<td><?php echo $rows['ProjectDesc']; ?></td> 
        <td><?php echo $rows['Time']; ?></td> 
		
    
		</tr> 
	<?php 
               } 
          ?> 

	</table> 
	</body> 
	</html>