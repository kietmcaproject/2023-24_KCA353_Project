<?php
include('dbcon.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart info</title>
</head>
<style>
    *{
        padding: 0;
        margin: 0;
    }
    body{
        
    }
    #image-payment::before{
        position: absolute;
    content: "";
    height: 100%;
    width: 100%;
    z-index: -1;
    opacity: 0.89;
    background: url('img/slider1.jpg') center center/cover no-repeat;
    }
    form{
        display: flex;
        align-items:center;
        justify-content:center;
        padding-top: 250px;

    }
    .form-input-container{
        display: flex;
        flex-direction:column;
        justify-content:center;
        border:5px solid black;
        border-radius:10px;
        width: 40%;
    }
    .form-group{
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content:center;
        flex-direction:column;
    }
    .form-group input{
        margin-left: 20px;
        text-align:center;
        width: 60%;
    }
    .form-group label{
        font-size:20px;
        color:yellow;
    }
    .cart-btn{
        margin-bottom: 20px;
        width:50%;
       margin-left: 160px;
       padding: 5px 0;
       background-color:green;
       border-radius:10px;
    }

</style>
<body>
    <div id="image-payment">
<form action="" method="POST">
    <div class="form-input-container">
                   <div class="form-group">
                       <label >Full Name</label>
                       <input type="text" name="fullname" class="form-control" required>
                   </div>
                   <div class="form-group">
                       <label >Phone No</label>
                       <input type="number" name="phone" class="form-control" required>
                   </div>
                   <div class="form-group">
                       <label >Your  Address</label>
                       <input type="text" name="addresss" class="form-control" required>
                   </div>
                  
                  
                   <button class="cart-btn" name="purchase">Make Purchase</button>
     </div>
               </form>
               </div>
</body>
</html>
<?php
if(isset($_POST['purchase']))
{
    $fullname=$_POST['fullname'];
    $phone=$_POST['phone'];
    $address=$_POST['addresss'];
    $qry="INSERT INTO `food`(`id`, `full_name`, `phone`, `address`) VALUES ('','$fullname','$phone','$address')";
    $run=mysqli_query($sql,$qry);
    if($run)
    {
        header('location:cartpayment2.php');
        
    }
    else{
        ?>
               <script>
                   alert("not info");
               </script>
         <?php
    }
}
?>

