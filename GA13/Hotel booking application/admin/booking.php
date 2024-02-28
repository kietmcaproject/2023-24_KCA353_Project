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
    .admin-booking{
        background:rgba(255,255,255,0.5); 
        
    }
    .admin-booking h1{
        text-align:center;
        margin-top: 20px;
    }
    body::before{
    position: absolute;
    content: "";
    height: 100%;
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
            <li><a href="aroom.php">Room Details</a></li>
            <li><a href="admindash.php">Admin Dash</a></li>
            
        </ul>
    </div>
    </div>

    <div class="admin-booking">
        <h1 class="admin-book">Welcome Admin To Booking <Section></Section></h1>
        <table>
            <tr>
                    <th width="10%" height="50px">Name</th>
                     <th width="10%" height="50px">Address</th>
                     <th width="10%" height="50px">State</th>
                     <th width="10%" height="50px">City</th>
                     <th width="10%" height="50px">Email</th>
                     <th width="10%" height="50px">Check In Date</th>
                     <th width="10%" height="50px">Check Out Date</th>
                     <th width="10%" height="50px">Members</th>
                     <th width="10%" height="50px">Room Type</th>
                     <!-- <th width="10%" height="50px">No Of rooms</th> -->

            </tr>
            <?php
               $qry="SELECT * FROM `room booking`";
               $run=mysqli_query($sql,$qry);
                
                 while( $row=mysqli_fetch_assoc($run))
                 {
                    $name=$row['name'];
                    $address=$row['address'];
                    $state=$row['state'];
                    $city=$row['city'];
                    $email=$row['email'];
                    $ci=$row['cin'];
                    $co=$row['cout'];
                    $members=$row['members'];
                    $roomtype=$row['roomtype'];
                    // $noofroom=$row['noofroom'];

                    ?>
                    <tr>
                     <td width="10%" height="50px"><center><?php echo $name; ?></center></td>
                     <td width="10%" height="50px"><center><?php echo $address; ?></center></td>
                     <td width="10%" height="50px"><center><?php echo $state; ?></center></td>
                     <td width="10%" height="50px"><center><?php echo $city; ?></center></td>
                     <td width="10%" height="50px"><center><?php echo $email; ?></center></td>
                     <td width="10%" height="50px"><center><?php echo $ci; ?></center></td>
                     <td width="10%" height="50px"><center><?php echo $co; ?></center></td>
                     <td width="10%" height="50px"><center><?php echo $members; ?></center></td>
                     <td width="10%" height="50px"><center><?php echo $roomtype; ?></center></td>
                     <!-- <td width="10%" height="50px"><center></center></td> -->
                     
                 </tr>

                    <?php
                 }
            ?>
        </table>
    </div>
</body>
</html>