<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Company-HTML Bootstrap theme</title>
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
              <a href="index.php"><h1><span style="color:red"><i>C-</i>&nbsp;&nbsp;<i style="color: Black">MAN</i>&nbsp;&nbsp;</span><i style="color: red">System</i></h1></a>
            </div>
          </div>

          <div class="navbar-collapse collapse">
            <div class="menu">
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="index.php" id='co' >Home</a></li>
                <!-- <li role="presentation"><a href="about.php" id='co' >About Us</a></li> -->
                
                <li role="presentation"><a href="contactus.php" id='co' style="color: red;" >Contact Us</a></li>
				        <li role="presentation"><a href="reg.php" id='co' >Sign Up</a></li>
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
        <div class="item active" style="background-image: url(./msg.jpg);background-attachment:fixed">
          <div class="container">
            <div class="row slide-margin">
              <div class="col-sm-12">
                    <p class="animation animated-item-3" style="color:red"></p>
				  <div class="form-control" style="height:400px;width:950px;font-weight:bold;background-color:rgba(220,120,50,0.4); box-shadow:10px 10px 5px 10px grey;">
					<form action="contact1.php" method='POST'>
					<h2 style="color: black">Message to Us</h2>
					
				  <input type="text" name='t1' class='form-control' placeholder="Email Id"/><br>
				  <input type="text" name='t2' class='form-control' placeholder="Name"/><br>
          <input type="text" name='t3' class='form-control' min="1234567890" max="9999999999" placeholder="Contact no"/><br>
          <input type="text" name='t4' class='form-control' placeholder="Message"/><br>
         

				  <button class='btn btn-info' >SUBMIT</button>
              </div>

                 </div>

              <div class="col-sm-6 hidden-xs animation animated-item-4">
                <div class="slider-img">
                  
				  </div>
              </div>

            </div>
          </div>
        </div>
        <!--/.item-->
      </div>
      <!--/.carousel-inner-->
    </div>
    <!--/.carousel-->
  </section>
  <!--/#main-slider-->

  
 
 
  
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
    <div class="footer" style="background-color:gray">
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
             
              <a href="#" style="color:black;font-weight:bold;">Made </a> By <a href="#" style="color:black;font-weight:bold;">Gaurav And Anmol</a>
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
