<?php
session_start();
$se=$_SESSION['eem'];
if($se==null){
  
  header("location:index.php?msg=plz login first");
  
}
include("config.php");
$q = "SELECT * FROM employee2 WHERE email='$se'";
$result = mysqli_query($con, $q);

if ($row = mysqli_fetch_assoc($result)) {
    $adminName = $row['name']; // Assuming the column name is 'admin_name' in your database
    $message = "$adminName";
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
  <link href="css/style.css" rel="stylesheet" /><style>
  #co:hover{color:red;}
  input
  {
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
              <a href="employee.php"><h1><span style="color:red"><i>C-</i>&nbsp;&nbsp;<i style="color: Black">MAN</i>&nbsp;&nbsp;</span></h1></a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">


                <li role="presentation"><a href="AddStock.php" id='co' >Add Stock</a></li>
                <li role="presentation"><a href="ViewStock.php" id='co'>View Stock</a></li>
                <li role="presentation"><a href="updateEmployee.php" id='co'>Profile</a></li>
                <li role="presentation" class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id='co'>
        Others Work <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="AddSupplier.php" id='co'>Add Supplier</a></li>
        
    </ul>
</li>           
                <li role="presentation"><a href="index.php" id='co'>LogOut</a></li>



              </ul>
            </div>
        </div>
      </div>
    </nav>
  </header>

  <section id="main-slider" class="no-margin">
    <div class="carousel slide">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(images/extra/bgreg.jpg);background-attachment:fixed">
        <h1 style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color:#6f1d1b; text-align:center; padding:30vh; font-size:6vw;"> Welcome, <span class="animation animated-item-3" style="color:#001219;border:3px solid white"><?php echo $message ?></span></h1>
          <div class="container">
            
          </div>
          </div>
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
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Company
              -->
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

</body>

</html>
