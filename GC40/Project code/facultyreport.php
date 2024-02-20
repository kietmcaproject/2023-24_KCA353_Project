
<link rel="stylesheet" href="register.css">
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