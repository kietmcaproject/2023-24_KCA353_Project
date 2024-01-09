<?php
include 'config.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from stock where id=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        header('location:ViewStock.php');
    }
    else
    {
        die(mysqli_error($con));
    }
}
?>