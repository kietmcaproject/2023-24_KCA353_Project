<?php
session_start();
$se = $_SESSION['eem'];
if ($se == null) {
  header("location:index.php?msg=plz login first");
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Get form data
  $supplierName = $_POST['supplierName'];
  $mobileNo = $_POST['mobileNo'];
  $address = $_POST['address'];

  $residentAddress = $_POST['residentAddress'];

  // Database connection
  $con = mysqli_connect("localhost", "root", "", "project");

  // Insert data into the 'supplier' table
  $sql = "INSERT INTO supplier (supplier_name, mobile_no, address,  resident_address) VALUES ('$supplierName', '$mobileNo', '$address','$residentAddress')";

  if (mysqli_query($con, $sql)) {
    header("location:AddSupplier.php?msg=Supplier added successfully");
  } else {
    header("location:AddSupplier.php?msg=Error adding supplier");
  }
}
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
    }

    b {
      color: white;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
    }

    footer {
      margin-top: auto;
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
                
                <li role="presentation" class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id='co'>
                    Others Work <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a href="AddSupplier.php" id='co' style="color: red;">Add Supplier</a></li>
                  </ul>
                  </li>
                  <li role="presentation"><a href="updateEmployee.php" id='co'>Profile</a></li>
                  <li role="presentation"><a href="index.php?logout=true" id='co'>LogOut</a></li>



              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <section id="add-supplier" style="background-image: url('./veggies.jpg'); background-size:cover;background-repeat:no-repeat;background-attachment:fixed; height:90vh">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 " style="margin-top: 13%; margin-left: +15%;">
          <center>
            <div style="width: 100%; height:10%; background-color:white;">

            </div>
          </center>
          <form class="well form-horizontal" action="" method="post" style="background-color: #c6c5b9; color:#dee2e6;width:50vw;height:60vh;">
            <fieldset>
              <?php
              if (isset($_GET['msg'])) {
                echo "<h4>" . $_GET['msg'] . "</h4>";
              }
              ?>
              <legend>
                <center>
                  <h2 style="color: #003049;"><b>Add Supplier</b></h2>

                </center>
              </legend>

              <div>
                <div><img src="./man.jpg" alt="not Available" width="40%" height="100%" style="float: left; border-radius:40% 0%; z-index:1px;"></div>
                <div style="float: right; margin:2%; color:#003049">
                  <div class="form-group">
                    <label class="col-md-4 control-label">Supplier Name</label>
                    <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="supplierName" placeholder="Supplier Name" class="form-control" type="text" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label">Mobile No.</label>
                    <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                        <input name="mobileNo" placeholder="Mobile No." class="form-control" type="text" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label">Shop Address</label>
                    <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="address" placeholder="Shop Address" class="form-control" type="text" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-4 control-label">Resident Address</label>
                    <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input name="residentAddress" placeholder="Resident Address" class="form-control" type="text" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-8"><br>
                      <button class="btn btn-warning" name="submit">Submit</button>
                    </div>
                  </div>
                </div>
              </div>

            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="footer" style="background-color:grey;">
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

              <a href="#" style="color:brown;font-weight:bold;">Made </a> By <a href="#" style="color:black;font-weight:bold;">GAURAV and ANMOL</a>
            </div>
          </div>
        </div>
      </div>

      <div class="pull-right">
        <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
      </div>
    </div>
  </footer>
  <script src="js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/functions.js"></script>
</body>

</html>