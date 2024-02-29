<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller</title>
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section>
        <div class="container mt-2" style="padding-top:8rem;" >
            <div class="row">
                <div class="col-12 col-sm-8 col col-md-5">
                    <div class="card border-0 shadow p-3 mb-5 rounded ml-5 bg-dark text-white"  style="width: 22rem;">
                        <div class="card-body ">
                            <h3 class="text-center" data-font-size="25">
                                Seller Sign Up
                            </h3>
                            <hr>
                            <form method="post">
                                
                                <input type="text" name="name" placeholder="Enter Name" required class="form-control my-4 py-2">  
                                <input type="text" name="uname" placeholder="Enter Username"  required class="form-control my-4 py-2">
                                <input type="password" name="password" placeholder="Enter Password" required class="form-control my-4 py-2">
                                <input type="number" name="contact" placeholder="Enter Phone Number" required class="form-control my-4 py-2">
                                
                                <div class="text-center mt-3">
                                    <button type='submit' class='btn btn-outline-secondary'>Register</button>&nbsp;&nbsp;&nbsp;
                                    <button type='reset' class='btn btn-outline-secondary'>Reset</button>
                                    
                                    <hr>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                <img src="Images/login.png" alt="Online Bidding" width="400">
            </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php 
include "dbcon.php";
if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    
    $sql = "INSERT INTO seller VALUES ('$username','$password','$name','$contact')";

    if(mysqli_query($con, $sql)) {
        echo "Data inserted successfully";
        header("location: index.php?msg=Registration Successful. Please login!");
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
