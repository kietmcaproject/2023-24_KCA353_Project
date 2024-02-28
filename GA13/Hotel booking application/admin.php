<?php
include('header.php');
include('dbcon.php');
?>


<div class="adminlogin">
    <div class="admin-box">
        <div class="admin-text">
            <h1>Admin Login</h1>
            <form action="" method="post">
            <table>
             <tr>
                 <td width="50%" height="50px">Username</td>
                 <td width="50%" height="50px"> <input type="text" name="un" id="username"  title="Enter Username"></td>
             </tr>
             <tr>
                 <td width="50%" height="50px">Password</td>
                 <td width="50%" height="50px"> <input type="Password" name="ps" id="password" title="Enter Password"></td>
             </tr>
             <tr>
                 <td colspan="2"><input type="submit" name="sub" id="btn" value="Login"></td>
             </tr>
            </form>
            <?php
                
                if(isset($_POST['sub']))
                {
                    $username=$_POST['un'];
                    $password=$_POST['ps'];
                    $qry="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
                    $run=mysqli_query($sql,$qry);
                    $row=mysqli_num_rows($run);
                    if($row <1)
                    {
                        ?>
                        <script>
                            alert('Username or password not match !!');
                            window.open('admin.php','_self');
                        </script>
                        <?php
                    }
                    else{
                        header('location:admin/admindash.php');
                    }
                }

            ?>

        </div>
    </div>
</div>
</body>
</html>