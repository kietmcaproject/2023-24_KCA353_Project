<?php
session_start();
include "..//db_conn.php";

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
          $username = test_input($_POST['username']);
          $password = test_input($_POST['password']);
          $role = test_input($_POST['role']);

          if((empty($username))){
            header("Location: ../login.php?error= User Name is Requires");    
          }
          
          else if((empty($password))){
            header("Location: ../login.php?error= Password is Requires");    
          }
        
          else{
            //Hashing the password
            //$password = md5($password);
            $sql = "Select * from users where username='$username' and password='$password' ";
            $result = mysqli_query($conn,$sql);
            

            if(mysqli_num_rows($result)===1)
            {
                $row=mysqli_fetch_assoc($result);
                if($row['password']===$password && $row['role']==$role){
                    $_SESSION['name']=$row['name'];
                    $_SESSION['id']=$row['id'];
                    $_SESSION['role']=$row['role'];
                    $_SESSION['username']=$row['username'];
                    if($_SESSION['role']=='faculty')
                          header("Location: ../Deshboardf.php");
                    else  header("Location: ../Deshboard.php");

                }
                else{
                    header("Location: ../login.php?error= Password is Requires");    
                }
            }
            else{
                header("Location: ../login.php?error= Incorrect user name or password");    
                
            }
          }
          
    }
    else{
        header("Location: ../login.php");
    }
?>