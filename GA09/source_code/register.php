<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            // Validate Name
            var name = document.forms["registrationForm"]["name"].value;
            if (!/^[a-zA-Z ]+$/.test(name)) {
                alert("Name should contain only letters and spaces.");
                return false;
            }

            // Validate Username
            var username = document.forms["registrationForm"]["uname"].value;
            if (!/^[a-zA-Z0-9_@]+$/.test(username)) {
                alert("Username should contain only letters, numbers, '_', and '@'.");
                return false;
            }

            // Validate Password
            var password = document.forms["registrationForm"]["password"].value;
            if (password.length < 8) {
                alert("Password should be at least 8 characters long.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <section>
        <div class="container mt-2" style="padding-top:8rem;">
            <div class="row">
                <div class="col-12 col-sm-8 col col-md-5">
                    <div class="card border-0 shadow p-3 mb-5 rounded ml-5 bg-dark text-white" style="width: 22rem;">
                        <div class="card-body ">
                            <h3 class="text-center" data-font-size="25">
                                User Sign Up
                            </h3>
                            <hr>
                            <form method="post" name="registrationForm" onsubmit="return validateForm()">
                                <input type="text" name="name" placeholder="Enter Name" required class="form-control my-4 py-2">
                                <input type="text" name="uname" placeholder="Enter Username" required class="form-control my-4 py-2">
                                <input type="password" name="password" placeholder="Enter Password" required class="form-control my-4 py-2">
                                <div class="text-center mt-3">
                                    <button type='submit' class='btn btn-outline-secondary'>Register</button>
                                    <button type='reset' class='btn btn-outline-secondary'>Reset</button>&nbsp;&nbsp;&nbsp;
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
if(isset($_POST['name']))
{
	$name=$_POST['name'];
	$username=$_POST['uname'];
	$password=$_POST['password'];

	$sql= "insert into register values('$name','$username','$password')";
	if(mysqli_query($con,$sql)) 
	{
		echo'<script>alert("Registered Successfully");</script>';
	    header("location:index.php?msg=Registration Successfull. Please login!");
	}
	else{
		echo "error";
	}
}
?>
