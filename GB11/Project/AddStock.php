<?php
session_start();
$se = $_SESSION['eem'];
if ($se == null) {
  header("location:index.php?msg=plz login first");
}

$message = "Employee";

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Get the current value of $val from the form
  $val = $_POST['serial_no'];

  // Increment the serial number
  $val++;

  // Get other form data
  $name = $_POST['PName'];
  $des = $_POST['Des'];
  $b = $_POST['supplier'];
  $c = $_POST['Mdate'];
  $d = $_POST['Edate'];
  $e = $_POST['qty'];
  $f = $_POST['contact_no'];

  // Database connection
  $con = mysqli_connect("localhost", "root", "", "project");

  // Insert data into the database
  $sql = "INSERT INTO stock (Pname, description, sname, doM, doE, quantity, contact) VALUES ('$name', '$des', '$b', '$c', '$d', '$e', '$f')";

  if (mysqli_query($con, $sql)) {
    header("location:AddStock.php?msg=Registration Successfully");
  } else {
    header("location:AddStock.php?msg=Error!!!!!!!!!!!!!");
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


                <li role="presentation"><a href="AddStock.php" id='co' style="color:red;">Add Stock</a></li>
                <li role="presentation"><a href="ViewStock.php" id='co'>View Stock</a></li>
                
                <li role="presentation" class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id='co'>
        Others Work <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="AddSupplier.php" id='co'>Add Supplier</a></li>
        
    </ul>
</li>           
<li role="presentation"><a href="updateEmployee.php" id='co'>Profile</a></li>
                <li role="presentation"><a href="index.php" id='co'>LogOut</a></li>



              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>


  <section id="contact-page" style="background-image: url('./addS.jpg') ;background-attachment:fixed; background-size:cover " ><br><br><br><br>
    <br><br> <br>
    <div class="container">

      <div class="container">
        <center>
          <div style="width: 100%; height:10%; background-color:white;">
            <?php if (isset($_GET['msg'])) {

              echo "<h4>" . $_GET['msg'] . "</h4>";
            }
            ?>
          </div>
        </center>
        <form class="well form-horizontal" action=" " onsubmit="return validateDates()" method="post" id="contact_form" style="background-color: #ffe6a7; ">
          <fieldset>

            <!-- Form Name -->
            <legend>
              <center>
                <h2 style="color:#1b263b; font-weight:700">Add Stock</h2>
              </center>
            </legend><br>

            <!-- Text input-->
          <div style="float: left;"><img src="./Stock.png" width="40%" height="100%" style="float: left; border-radius:0% 40%; z-index:1px;"></div>
            <div style="float: right; width:80% ;margin-top:-40%;margin-right:-15%;color:black">
            <div class="form-group">
              <label class="col-md-4 control-label">Product Name</label>
              <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input name="PName" placeholder="Product Name" class="form-control" type="text">
                </div>
              </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
              <label class="col-md-4 control-label">Desciption</label>
              <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                  <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                      <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                      <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                    </svg></span>
                  <input name="Des" placeholder="" class="form-control" type="text">
                </div>
              </div>
            </div>

            <div class="form-group">
  <label class="col-md-4 control-label">Supplier</label>
  <div class="col-md-4 selectContainer">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
      <select name="supplier" class="form-control selectpicker">
        <option value="">Select the Supplier</option>
        <?php
        // Database connection
        $con = mysqli_connect("localhost", "root", "", "project");

        // Fetch suppliers from the database
        $query = "SELECT * FROM supplier";
        $result = mysqli_query($con, $query);

        // Check if there are any rows in the result
        if (mysqli_num_rows($result) > 0) {
          // Loop through each row and generate the options
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['supplier_id'] . "'>" . $row['supplier_name'] . "</option>";
          }
        }
        ?>
      </select>
    </div>
  </div>
</div>

            <!-- Text input-->

            <div class="form-group">
              <label class="col-md-4 control-label">Date of Manufacturing</label>
              <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                  <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                    </svg></span>
                  <input name="Mdate" placeholder="" class="form-control" id="manufacturingDate" type="date">
                </div>
              </div>
            </div>

            <!-- Text input-->

            <div class="form-group">
              <label class="col-md-4 control-label">Expire Date</label>
              <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                  <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                      <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                    </svg></span>
                  <input name="Edate" placeholder="Password" class="form-control" id="expiryDate" type="date">
                </div>
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-4 control-label">Quantity</label>
              <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                  <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
                      <path d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z" />
                    </svg></span>
                  <input name="qty" placeholder="" class="form-control" type="text">
                </div>
              </div>
            </div>



            <!-- Text input-->

            <div class="form-group">
              <label class="col-md-4 control-label">Contact No.</label>
              <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                  <input name="contact_no" placeholder="+91" class="form-control" type="text">
                </div>
              </div>
            </div>

            <!-- Select Basic -->

            <!-- Success message -->
            <!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div> -->

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label"></label>
              <div class="col-md-4"><br>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button class="btn btn-warning" name="submit">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
              </div>
            </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div><!-- /.container -->
    <!--/.row-->
    <br></div><br><br>
    <!--/.container-->
  </section>
  <!--/#contact-page-->

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
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Company
              -->
              <a href="#" style="color:black;font-weight:bold;">Made </a> By <a href="#" style="color:black;font-weight:bold;">GAURAV and ANMOL</a>
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
  <!-- Add this script to validate Date of Manufacturing and Date of Expiry -->
  <script>
    function validateDates() {
      // Retrieve form inputs
      const productName = document.getElementById("PName").value;
      const description = document.getElementById("Des").value;
      const supplier = document.getElementById("supplier").value;
      const manufacturingDate = new Date(document.getElementById("manufacturingDate").value);
      const expiryDate = new Date(document.getElementById("expiryDate").value);
      const today = new Date();

      // Validate Product Name, Description, and Supplier
      if (productName.trim() === '' || description.trim() === '' || supplier === '') {
        alert("Please fill out all the required fields.");
        return false;
      }

      // Validate Date of Manufacturing and Expiry Date
      if (manufacturingDate > today) {
        alert("Manufacturing date cannot be in the future.");
        return false;
      }

      if (manufacturingDate > expiryDate) {
        alert("Expiry date must be after manufacturing date.");
        return false;
      }

      // Calculate the difference in months between manufacturing and expiry date
      const monthsDifference = (expiryDate.getFullYear() - manufacturingDate.getFullYear()) * 12 +
        (expiryDate.getMonth() - manufacturingDate.getMonth());

      // Validate if the difference is greater than two months
      const minDifferenceMonths = 2;

      if (monthsDifference < minDifferenceMonths) {
        alert(`The difference between manufacturing and expiry date must be more than ${minDifferenceMonths} months.`);
        return false;
      }

      // If all validations pass, the form will submit
      return true;
    }
  </script>



  <script src="js/jquery-2.1.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/functions.js"></script>

</body>

</html>