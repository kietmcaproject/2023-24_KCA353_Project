<?php
session_start();
$se = $_SESSION['eem'];
if ($se == null) {
    header("location:index.php?msg=please login first");
    exit();
}

$message = "Admin";
include("config.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data


    $email = $_SESSION['eem'];
    $user_pass = mysqli_real_escape_string($con, $_POST['user_pass']);

    $address = mysqli_real_escape_string($con, $_POST['address']);
    $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
    $con_no = mysqli_real_escape_string($con, $_POST['mobile']);

    // Update the database
    $sql = "UPDATE employee2 SET 
            password = '$user_pass',
            mobile = '$con_no',
            pincode='$pincode',
            address='$address'
            WHERE email = '$email'";

    $result = mysqli_query($con, $sql);

    // Check if the update was successful
    if ($result) {
        echo "Update successful!";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

// Fetch employee details based on the email
$query = "SELECT * FROM employee2 WHERE email = '$se'";
$result = mysqli_query($con, $query);

if ($result && $employee = mysqli_fetch_assoc($result)) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>C-Man</title>
        <link rel="icon" type="image/x-icon" href="./chef.png">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet" />
        <style>
            #co:hover {
                color: red;
            }

            input {
                font-weight: bold;
                color: black;
            }
        </style>

    </head>

    <body>
        <header>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-brand">
                                <a href="./employee.php">
                                    <h1><span style="color:red"><i>C-</i>&nbsp;&nbsp;<i style="color: Black">MAN</i>&nbsp;&nbsp;</span></h1>
                                </a>
                            </div>
                        </div>

                        <div class="navbar-collapse collapse">
                            <div class="menu">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"><a href="AddStock.php" id='co'>Add Stock</a></li>
                                    <li role="presentation"><a href="ViewStock.php" id='co'>View Stock</a></li>
                                    <!-- <li role="presentation"><a href="DeleteS.php" id='co' >Delete Stock</a></li>
        <li role="presentation"><a href="UpdateD.php" id='co' >Update Details</a></li> -->
                                    <!-- <li role="presentation"><a href="UpdateFood.php" id='co' >Update Food</a></li> -->
                                    
                                    <li role="presentation" class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id='co'>
                    Others Work <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="AddSupplier.php" id='co' style="color: red;">Add Supplier</a></li>
                  </ul>
                  </li>
                  <li role="presentation"><a href="updateEmployee.php" style="color: red;" id='co'>Profile</a></li>
                                    <li role="presentation"><a href="index.php?logout=true" id='co'>LogOut</a></li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <section id="main-slider" class="no-margin">
            <div class="item active" style="background-image: url(images/extra/employeeBg.jpg);background-size:cover;background-repeat:no-repeat;background-attachment:fixed">
                <div class="container">
                    <?php
                    // Start the session
                    include("config.php");


                    // Check if the email is set in the session
                    if (!isset($_SESSION['eem'])) {
                        echo "User not authenticated. Redirecting to login page...";
                        header("Location: index.php");
                        exit();
                    }

                    $email = $_SESSION['eem'];

                    // Assume you have a database connection established


                    // Check the connection
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        exit();
                    }

                    // Fetch employee details based on the email
                    $query = "SELECT * FROM employee2 WHERE email = '$email'";
                    $result = mysqli_query($con, $query);

                    if ($result && $employee = mysqli_fetch_assoc($result)) {
                    ?>
                        <form class="well form-horizontal" action="" method="post" id="contact_form" style="background-color: #723d46;" onsubmit="return showSuccessAlert();">
                            <fieldset>
                                <!-- Form Name -->
                                <legend>
                                    <center>
                                        <h2 style="color: #dedbd2; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"><b>UPDATE DETAILS</b></h2>
                                    </center>
                                </legend><br>

                                <!-- Text input -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input name="first_name" placeholder="First Name" class="form-control" disabled type="text" value="<?php
                                                                                                                                                echo $employee['name'];
                                                                                                                                                ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label">Email</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input name="user_name" placeholder="EMail" class="form-control" disabled type="text" value="<?php echo $employee['email']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Dob</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input name="dob" placeholder="DOB" class="form-control" disabled type="text" value="<?php echo $employee['dob']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Address</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input name="address" placeholder="Address" class="form-control" type="text" value="<?php echo $employee['address']; ?>">
                                        </div>
                                    </div>
                                </div>


                                <!-- Text input -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Password</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input name="user_pass" placeholder="Password" class="form-control" type="password" value="<?php echo $employee['password']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">PinCode</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input name="pincode" placeholder="PinCode" class="form-control" type="text" value="<?php echo $employee['pincode']; ?>">
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-md-4 control-label">Contact No.</label>
                                    <div class="col-md-4 inputGroupContainer">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                            <input name="mobile" placeholder="+91" class="form-control" type="text" value="<?php echo isset($employee['mobile']) ? $employee['mobile'] : ''; ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-4"><br>
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-success" name="submit">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    <?php
                    } else {
                        echo "Employee not found!";
                    }

                    // Close the database connection
                    mysqli_close($con);
                    ?>
                </div>
            </div>
        </section>

        <section id="conatcat-info">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                            <div class="pull-left">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <h2>Have a question or need help?</h2>
                                <p>+0123 456 70 80</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.container-->
        </section>
        <!--/#conatcat-info-->

        <footer>
            <div class="footer" style="background-color:grey">
                <div class="container">
                    <div class="social-icon">
                        <div class="col-md-4">
                            <ul class="social-network">
                                <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 col-md-offset-4">
                        <div class="copyright" style="color:black;font-weight:bold;">
                            &copy; All Rights Reserved.
                            <div class="credits">
                                <a href="#" style="color:black;font-weight:bold;">Made </a> By <a href="#" style="color:black;font-weight:bold;">Anmol && Gaurav</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pull-right">
                    <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
                </div>
            </div>
        </footer>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-2.1.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/functions.js"></script>
        <script>
            function showSuccessAlert() {
                // Add logic here to check if the update was successful
                // For example, you can set a variable in your updateEmployeeProcess.php and check it here
                var updateSuccessful = true; // Change this based on your logic

                if (updateSuccessful) {
                    alert("Update successful!");
                    return true; // Allow the form submission
                } else {
                    // If the update was not successful, you can show an error alert or return false to prevent form submission
                    alert("Update failed. Please try again.");
                    return false; // Prevent the form submission
                }
            }
        </script>

    </body>

    </html>
<?php
} else {
    echo "Employee not found!";
}

// Close the database connection
mysqli_close($con);
?>