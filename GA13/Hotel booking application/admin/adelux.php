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
</head>
<style>
    body{
        background-color:pink;
    }
   
    h1{
        text-align:center;
        margin-top: 20px;
    }
    .delux-insert{
        height: 200px;
        width: 400px;
        border-radius:10px;
        background-color:crimson;
        margin-top: -10px;
        margin-left: 38%;
        
    }
    .delux-insert form{
          display: flex;
          flex-direction:column;
          align-items:center;
          justify-content:center;
          padding-top: 30px;
    }
    .delux-insert form table tr td input{
       padding:4px 0;
       margin-bottom: 10px;
       border-radius:8px;
       padding-left: 10px;
    }
    .delux-insert form table tr td{
        font-size:20px;
    }
    #delux-btn{
        width:80%;
        background-color:blue;
        font-size:16px;
    }
    .imgg{
        display: flex;
        justify-content:space-evenly;
        margin-top: 10px;
    }
    img{
        width: 350px;
        /* margin-left: 100px; */
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
            <li><a href="aroom.php">Booking</a></li>
            <li><a href="aroom.php">Room Details</a></li>
            <li><a href="admindash.php">Admin Dash</a></li>
            
        </ul>
    </div>
    </div>
    <h1 >Delux AC Rooms insert Section</h1>
    <div class="imgg">
    <img src="../img/acroom2.jpg" alt="delux ac">
    <img src="../img/acroom2.jpg" alt="delux ac">
    </div>
   
<div class="delux-insert">
    
    <form action="adelux.php" method="post">
             <table>
                
                <tr>
                   <td>Room No</td>
                   <td><input type="text" name="rno" placeholder="Enter Room No" title="Enter Room No" required></td>
                  
                </tr>
                <tr>
                    <td>Room Type</td>
                    <td><input type="text" name="type" placeholder="Enter Room Type " title="Room Type" required> </td>
                </tr>
                <tr>
                    <td>Room Price</td>
                    <td><input type="text" name="price" placeholder="Enter Room Price " title="Room Price" required> </td>
                </tr>
                
                
                
                <td>
                    <td><input type="submit" id="delux-btn" name="submit" value=Insert></td>
                </td>
            </table>
    </form>
    <?php
      if(isset($_POST['submit']))
      {
          $rno=$_POST['rno'];
          $rtype=$_POST['type'];
          $price=$_POST['price'];
         
          $qry="INSERT INTO `deluxacroom`(`id`, `roomno`, `roomtype`, `price`) VALUES ('','$rno','$rtype','$price')";
          $run=mysqli_query($sql,$qry);
          if($run==true)
          {
            ?>
            <script>
                alert('Data Inserted Successfully');
            </script>
            <?php
          }
          else{
              echo "Not Inserted";
          }

      }
    ?>
</div>
</body>
</html>