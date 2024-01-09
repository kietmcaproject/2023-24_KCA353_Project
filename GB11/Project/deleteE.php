<?php
include 'config.php';
if(isset($_GET['deleteEid'])){
    $id=$_GET['deleteEid'];
    $sql="delete from employee2 where id=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        header('location:ViewEmp.php');
    }
    else
    {
        die(mysqli_error($con));
    }
}
?>