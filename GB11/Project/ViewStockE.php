<?php
include("config.php");
?>
<?php
session_start();
$se=$_SESSION['em'];
if($se==null){
  
  header("location:index.php?msg=plz login first");
  
}

$message="Admin";
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
              <a href="admin.php"><h1><span style="color:red"><i>C-</i>&nbsp;&nbsp;<i style="color: Black">MAN</i>&nbsp;&nbsp;</span></h1></a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="new_reg.php" id='co' >Add Employee</a></li>
                
                <li role="presentation"><a href="ViewEmp.php" id='co' >View Employee</a></li>
                <li role="presentation"><a href="ViewStockE.php" id='co' style="color: red;">View Stock</a></li>
				
        <li role="presentation"><a href="index.php?logout=true" id='co' >LogOut</a></li>

               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <section id="main-slider" class="no-margin">
    <div class="carousel slide">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(images/extra/employeeBg.jpg);background-attachment:fixed">
     <!-- <h1 style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color:#6f1d1b; text-align:center; padding:30vh; font-size:8vw">WelCome <?php echo $message ?></h1> -->
          <div class="container">
           <form style=" margin:3vw">
          
  <?php
           $query="Select *from stock";
           $data=mysqli_query($con,$query);
           $total=mysqli_num_rows($data);
           if($total!=0)
           {
            ?>
             <table class="table table-sm table-dark" style="background-color: #6d6875; color:#ffb4a2; border-radius:5px 15px">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">Suppier</th>
      <th scope="col">Date of Mfg.</th>
      <th scope="col">Expiry Date</th>
      <th scope="col">Quantity</th>
      <th scope="col">Contact No</th>
      <th scope="col">Operation</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
    while($result=mysqli_fetch_assoc($data))
    {
      echo "<tr>
      <td >".$i++."</td>
      <td >".$result['Pname']."</td>
      <td >".$result['description']."</td>
      <td >".$result['sname']."</td>
      <td >".$result['doM']."</td>
      <td >".$result['doE']."</td>
      <td >".$result['quantity']."</td>
      <td >".$result['contact'].'</td>
      <td>
<button class="btn btn-warning"><a href="delete.php?deleteid='.$result["id"].'"  class="text-light">Delete</a></button></td>
    </tr>';

    }
           }
     ?>      
  </tbody>
</table>

           </form>
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
