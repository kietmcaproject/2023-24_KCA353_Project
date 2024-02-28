
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
    <title>Card Dtails</title>
</head>
<style>
    body{
        background-color:crimson;
    }
    .payment-container{
        width: 500px;
        height: 400px;
        background-color:pink;
        margin-left: 500px;
        margin-top: 130px;
        border-radius:20px;
    }
    form{
        /* background-color:yellow; */
        padding-top: 20px;
        display: flex;
        align-self: center;
        justify-content:center;
        flex-direction:column;
        padding-bottom: 30px;
       
    }
    .form-payment{
        margin-top: 20px;
        display: flex;
        padding-bottom: 20px;
        align-self: center;
        justify-content: venter;
    }
    .form-payment label,.form-payment input{
          border-radius:10px;
          padding: 2px 0;
    }
    .payment-h1{
         text-align:center;
         padding-top: 10px;
    }
    .payment-btn{
        width: 60%;
        margin-left: 110px;
        margin-top: 20px;
        padding: 5px 0;
        background-color:red;
        border-radius:10px;
        border:1px solid black;
        outline:none;
    }
    .img{
        /* width: 100%; */
        display: flex;
        justify-content:space-evenly;
        align-items:center;
    }
    .img img{
        width: 200px;

    }

</style>
<body>
    <div class="img">
        <img src="img/paytm.png" alt="paytm">
        <img src="img/hdfc.jpg" alt="hdfc">
    </div>
    <div class="payment-container">
        <h1 class="payment-h1">Enter Details</h1>
<form action="" method="post">
          <div class="form-payment">
                <label >Card Number</label>
                <input type="number" name="cardno" class="form-control" required>
           </div>
          <div class="form-payment">
                <label >CVV Number</label>
               <input type="number" name="cvv" class="form-control" max-length="3" required>
          </div>
          
          <button class="payment-btn" name="card-purchase">Proceed For Further Details</button>
          <?php
 if(isset($_POST['card-purchase']))
 {
     $cardno=$_POST['cardno'];
     $cvv=$_POST['cvv'];
     $qry="SELECT * FROM `card details` WHERE `cardno`='$cardno' AND `cvv`='$cvv' ";
     $run=mysqli_query($sql,$qry);
     $row=mysqli_fetch_assoc($run);
     if($row<1)
     {
       
        echo "<script>
        alert('Card no or cvv no not match');
        window.location.href='cartpayment2.php';
        </script>";
     }
     else{
          header('location:cartpayment3.php');
     }
 }
?>
</form>
</div>
</body>
</html>





