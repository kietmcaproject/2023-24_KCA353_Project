<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password update</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform:translate(-50%,-50%);
            background-color:#f0f0f0;
            width: 350px;
            border-radius:5px;
            padding: 20px 25px 30px 25px;
        }
        form h3{
            margin-bottom: 15px;
            color: #38475e;
        }
        form input{
            width: 100%;
            margin-bottom: 20px;
            background-color: transparent;
            border: none;
            border-bottom: 2px solid #30475e;
            border-radius: 0px;
            padding: 5px 0;
            font-weight: 550;
            font-size: 14px;
            outline: none;
        }
        form button{
            font-weight: 550;
            font-size: 15px;
            color: white;
            background-color: #30475e;
            color: white;
            padding: 4px 10px;
            border: none;
            outline: none;
            
        }
    </style>
</head>
<body>
    <?php
      include('connection.php');

      if(isset($_GET['email']) && isset($_GET['reset_token']))
      {
             date_default_timezone_set('Asia/kolkata');
             $date=date("y-m-d");
             $qry="SELECT * FROM `registered_users` WHERE `email`='$_GET[email]' AND `resettoken`='$_GET[reset_token]' AND `resettokenexpire`='$date'";
             $result=mysqli_query($con,$qry);
             if($result)
             {
                  if(mysqli_num_rows($result)==1)
                  {
                      echo"
                        <form method='POST'>
                           <h3>Create New Password</h3>
                           <input type='password' placeholder='New Password' name='password'>
                           <button type='submit' name='updatepassword'>Update</button>
                           <input type='hidden' name='email' value='$_GET[email]'>
                        </form>
                      ";
                  }
                  else{
                    echo"
                      <script>
                        alert('Invalid Or Expire ');
                        window.location.href='index.php';
                      </script>
                    
                    ";
                  }
             }
             else{
                echo"
                <script>
                  alert('Server Down');
                  window.location.href='index.php';
                </script>
                
                ";
             }
      }

    ?>


<?php
  if(isset($_POST['updatepassword']))
  {
      $pass=password_hash($_POST['password'],PASSWORD_BCRYPT);
      $update="UPDATE `registered_users` SET `password`='$pass',`resettoken`=NULL,`resettokenexpire`=NULL WHERE `email`='$_POST[email]'";
      if(mysqli_query($con,$update))
      {
        echo"
                <script>
                  alert('Password updated sucessfully');
                  window.location.href='index.php';
                </script>
                
                ";
        
      }
      else{
        echo"
                <script>
                  alert('Server Down');
                  window.location.href='index.php';
                </script>
                
                ";
      }
  }
?>
</body>
</html>