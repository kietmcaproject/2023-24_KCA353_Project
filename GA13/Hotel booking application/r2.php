<?php
include('dbcon.php');
$ci=$_GET['ci'];
 $co=$_GET['co'];
 $rt=$_GET['rt'];
 $nr=$_GET['nr'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ac room form</title>
</head>
<style>
    body{
        background-color:orange;
    }
   #r1-container{
     
   }
   #r1-container h1{
       text-align:center;
       margin-top: 30px;
   }
   form{
       display: flex;
       justify-content:center;
       align-items: center;
       
       flex-direction:column;
       

   }
   table{
      width: 200px;
      height:150px;
      border:1px solid black;
      background-color:red;
      padding: 40px;
      border-radius:20px;
   }
   table tr td{
       padding: 8px;
   }
   table tr td input{
       font-size:17px;
   }
</style>
<body>
    <div id="r1-container">
    <h1>Please Fill Up The Form Given Below</h1>
<form action="r2.php" method="post">
<h1>BOOK NOW</h1>
    <table>
        <tr>
            <td>Status</td>
            <td><input type="text" name="status" title="status" placeholder="Availble"></td>
        </tr>
       
        <tr>
            <td>name</td>
            <td><input type="text" name="name" title="name" required></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input type="text" name="address" title="address" required></td>
        </tr>
        <tr>
            <td>State</td>
            <td><input type="text" name="state" title="state" required></td>
        </tr>
        <tr>
            <td>City</td>
            <td><input type="text" name="city" title="city" required></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" title="email" required></td>
        </tr>
        <tr>
            <td>Check in Date</td>
            <td><input type="date" name="cin" title="cindate" value="<?php echo $ci; ?>"> </td>
            <td>Check out Date</td>
            <td><input type="date" name="cout" title="coutdate" value="<?php echo $co; ?>"></td>
        </tr>
        <tr>
            <td>Members</td>
            <td><input type="text" name="members" title="members" required></td>
        </tr>
        <tr>
            <td>Room Type</td>
            <td><input type="text" name="roomtype" title="roomtype" value="<?php echo $rt; ?>"></td>
        </tr>
        <tr>
            <td>No of Rooms</td>
            <td><input type="text" name="noofroom" title="No of Room" value="<?php echo $nr; ?>"></td>
        </tr>
        <tr>
            
            <td><input type="submit" name="submit" value="submit"></td>
        </tr>
    </table>
    <?php
        
        
        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
        $address=$_POST['address'];
        $state=$_POST['state'];
        $city=$_POST['city'];
        $email=$_POST['email'];
        $ci=$_POST['cin'];
        $co=$_POST['cout'];
        $members=$_POST['members'];
        $roomtype=$_POST['roomtype'];
        $noofroom=$_POST['noofroom'];

        $qryy="SELECT * FROM `acroom` WHERE `status`='un book'";
        $run=mysqli_query($sql,$qryy);
        // $rno=$ow['roomno'];
        $row=mysqli_fetch_assoc($run);
        $rno=$row['roomno'];

        
        

            $qry="INSERT INTO `room booking` (`id`, `name`, `address`, `state`, `city`, `email`, `cin`, `cout`, `members`, `roomtype`, `no of rooms`) VALUES (NULL, '$name', '$address', '$state', '$city', '$email', '$ci', '$co', '$members', '$roomtype', '$noofroom');";
           
            $run=mysqli_query($sql,$qry);
            
           
           
            if($run==true)
            {
                mysqli_query($sql,"UPDATE `acroom` SET `status`='book' WHERE `roomno`='$rno' ");
                header('location:cartpayment2.php');
                ?>
                <script>
                    alert("room book Successfully");
                </script>
                <?php
            }
            else{

            }
        }
    ?>
</form> 
</div>
</body>
</html>