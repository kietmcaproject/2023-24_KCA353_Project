<link rel="stylesheet" href="register.css">
<?php
$facultyid="9%^&1";
if(isset($_GET['facultyid']))
$facultyid=$_GET['facultyid'];
if(isset($_GET['facultyname']))
$name=$_GET['facultyname'];
/*
$password=$_POST['password'];
$designation=$_POST['designation'];
$dateofjoining=$_POST['doj'];
$department=$_POST['department'];
$emailid=$_POST['email'];
$phone=$_POST['phone'];
*/

$conn =mysqli_connect('localhost','root','','facultydb');
 if($facultyid!="9%^&1")
 {
 $sql="Insert into tempdata(facid,name) values('$facultyid','$name')";
mysqli_query($conn,$sql);
echo"registration successfully...<hr>";
 }
 $sql="Select * from tempdata order by name";
$data=mysqli_query($conn,$sql);
echo '<table class="tbl"><tr><td><b>S.No.</b></td><td><b>Faculty Id</b></td><td><b>Faculty Name</b></td></tr>';
$i=0;
while($row=mysqli_fetch_assoc($data))
{
	$i++;
	echo "<tr><td>$i<b></b></td><td>". $row["facid"] ."</td><td>". $row["name"] ."</td></tr>";
}
echo "</table>";
?>
