<?php 
$port="localhost";
$username="root";
$password="";
$dbname="Auction";
$con=mysqli_connect($port,$username,$password,$dbname);
if(!$con)
{
	echo "not connected";

}
else{
	
	echo "";
}

 ?>
 