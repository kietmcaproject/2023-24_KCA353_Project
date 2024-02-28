<?php
include('../dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Room</title>
    <link rel="stylesheet" href="stylee.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&family=Rubik&display=swap" rel="stylesheet">
</head>
<style>
    .admin-room-details{
        background:rgba(255,255,255,0.5); 
        
    }
    .admin-room-details h1{
        text-align:center;
        margin-top: 20px;
    }
    body::before{
    position: absolute;
    content: "";
    height: 170%;
    width: 100%;
    z-index: -1;
    opacity: 0.89;
    background: url('../img/adminhotel2.jpg') center center/cover no-repeat;
    }
    .admin-booking table tr{
        font-size:20px;
        font-family: 'Rubik', sans-serif;
    }
</style>
<body>
    <div class="wrapper-container">
    <div class="wrapper">
        <ul>
            <li><a href="aroom.php">Room Home</a></li>
            <li><a href="#">Room Update</a>
                    <ul>
                        <li><a href="adelux.php">Delux ac</a></li>
                        <li><a href="aac.php"> ac</a></li>
                        <li><a href="anonac.php">Non ac</a></li>
                    </ul>
            </li>
            <li><a href="booking.php">Booking</a></li>
            <li><a href="roomdetails.php">Room Details</a></li>
            <li><a href="admindash.php">Admin Dash</a></li>
            
        </ul>
    </div>
    </div>

    <div class="admin-room-details">
         <h1 style="color:blue; text-align:center;">Delux room details</h1>
         <table>
             <tr>
                     <th width="25%" height="50px">Room No</th>
                     <th width="25%" height="50px">Room Type</th>
                     <th width="25%" height="50px">Price</th>
                     <th width="25%" height="50px">Status</th>
                     <th width="25%" height="50px">Option</th>
             </tr>
             <?php
                $qry="SELECT * FROM `deluxacroom`";
                $run=mysqli_query($sql,$qry);
                while( $row=mysqli_fetch_assoc($run))
                {
                    $rno=$row['roomno'];
                    $rtype=$row['roomtype'];
                    $price=$row['price'];
                    $status=$row['status'];

                    ?>
                    <tr>
                    <td width="25%" height="50px"><center><?php echo $rno ?></center></td>
                     <td width="25%" height="50px"><center><?php echo $rtype ?></center></td>
                     <td width="25%" height="50px"><center><?php echo $price ?></center></td>
                     <td width="25%" height="50px"><center><?php echo $status ?></center></td>
                     <td><a style="color:blue;" href="co.php? rno=<?php echo $rno; ?>">Check Out</a></td>
                    </tr>
                    <?php
                }
             ?>
         </table>
    </div>

    <div class="admin-room-details">
         <h1 style="color:blue; text-align:center;">Ac room details</h1>
         <table>
             <tr>
                     <th width="25%" height="50px">Room No</th>
                     <th width="25%" height="50px">Room Type</th>
                     <th width="25%" height="50px">Price</th>
                     <th width="25%" height="50px">Status</th>
                     <th width="25%" height="50px">Option</th>
             </tr>
             <?php
                $qry="SELECT * FROM `acroom`";
                $run=mysqli_query($sql,$qry);
                while( $row=mysqli_fetch_assoc($run))
                {
                    $rno=$row['roomno'];
                    $rtype=$row['roomtype'];
                    $price=$row['price'];
                    $status=$row['status'];

                    ?>
                    <tr>
                    <td width="25%" height="50px"><center><?php echo $rno ?></center></td>
                     <td width="25%" height="50px"><center><?php echo $rtype ?></center></td>
                     <td width="25%" height="50px"><center><?php echo $price ?></center></td>
                     <td width="25%" height="50px"><center><?php echo $status ?></center></td>
                     <td><a style="color:blue;" href="co1.php? rno=<?php echo $rno; ?>">Check Out</a></td>
                    </tr>
                    <?php
                }
             ?>
         </table>
    </div>
    <div class="admin-room-details">
         <h1 style="color:blue; text-align:center;">Non Ac room details</h1>
         <table>
             <tr>
                     <th width="25%" height="50px">Room No</th>
                     <th width="25%" height="50px">Room Type</th>
                     <th width="25%" height="50px">Price</th>
                     <th width="25%" height="50px">Status</th>
                     <th width="25%" height="50px">Option</th>
             </tr>
             <?php
                $qry="SELECT * FROM `nonac`";
                $run=mysqli_query($sql,$qry);
                while( $row=mysqli_fetch_assoc($run))
                {
                    $rno=$row['roomno'];
                    $rtype=$row['roomtype'];
                    $price=$row['price'];
                    $status=$row['status'];

                    ?>
                    <tr>
                    <td width="25%" height="50px"><center><?php echo $rno ?></center></td>
                     <td width="25%" height="50px"><center><?php echo $rtype ?></center></td>
                     <td width="25%" height="50px"><center><?php echo $price ?></center></td>
                     <td width="25%" height="50px"><center><?php echo $status ?></center></td>
                     <td><a style="color:blue;" href="co2.php? rno=<?php echo $rno; ?>">Check Out</a></td>
                    </tr>
                    <?php
                }
             ?>
         </table>
    </div>
</body>
</html>