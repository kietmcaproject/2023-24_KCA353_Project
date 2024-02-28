<?php
include('connection.php');
session_start();
//for login
if(isset($_POST['login']))
{
   $qry="SELECT * FROM `registered_users` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
   $result=mysqli_query($con,$qry);
   if($result)
   {
      if(mysqli_num_rows($result)==1)
      {
            $result_fetch=mysqli_fetch_assoc($result);
            if(password_verify($_POST['password'],$result_fetch['password']))
            {
                //if password matched
                $_SESSION['logged_in']=true;
                $_SESSION['username']=$result_fetch['username'];
                header("location:index.php");
            }
            else{
                echo"
                <script>
                  alert('Incorrect Password');
                  window.location.href='index.php';
                </script>
                
                ";
            }
      }
      else{
        echo"
        <script>
          alert('Incorrect Email Or Username');
          window.location.href='index.php';
        </script>
        
        ";
      }
   }
   else{
    echo"
    <script>
      alert('Cannot run');
      window.location.href='index.php';
    </script>
    
    ";
   }
}
else{

}

//for registeration
if(isset($_POST['register']))
{
    $user_exist_query="SELECT * FROM `registered_users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
    $result=mysqli_query($con,$user_exist_query);
    if($result)
    {
        if(mysqli_num_rows($result)>0){   // itwill be executed if username or email is already taken
            $result_fetch=mysqli_fetch_assoc($result);
            //username already registered
            if($result_fetch['username']==$_POST['username'])
            {
                echo"
                 <script>
                    alert('$result_fetch[username] Username Already Taken');
                    window.location.href='index.php';
                 </script>
                
                ";
            }
            else{
                //email already taken
                echo"
                 <script>
                    alert('$result_fetch[email] E-mail Already Taken');
                    window.location.href='index.php';
                 </script>
                
                ";
            }
        }
        else{ // it will be excuted if no one has taken username or email
            $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
            $qry="INSERT INTO `registered_users`(`name`, `username`, `email`, `password`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password')";
            if(mysqli_query($con,$qry))
            {
                //if data insert successfully
                echo"
                   <script>
                      alert('Registeration Successfull');
                      window.location.href='index.php';
                  </script>
           
               ";

            }
            else{
                //if data cannot be inserted
                echo"
                  <script>
                       alert('Cannot run');
                       window.location.href='index.php';
                   </script>
           
                  ";
            }
        }
    }
    else{
        echo"
           <script>
             alert('Cannot run');
             window.location.href='index.php';
           </script>
           
           ";
    }
}
?>