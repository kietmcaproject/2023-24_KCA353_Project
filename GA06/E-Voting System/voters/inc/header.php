<?php 
    session_start();
    require_once("../admin/inc/config.php");

    if($_SESSION['key'] != "VotersKey")
    {
        echo "<script> location.assign('../admin/inc/logout.php'); </script>";
        die;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voters Panel - Online Voting System</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    
    <div class="container-fluid">
        <div class="row bg-black text-white">
            <div class="col-1"> 
                <img src="../assets/images/logo.gif" width="80px"/>
            </div>
            <div class="col-11 my-auto">
                <h3> ONLINE VOTING SYSTEM  - <small> Welcome  <?php echo $_SESSION['username']; ?></small> </h3>
            </div>
        </div>

 





