<?php
include("config.php");
?>
 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>C-Man</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <!-- <link href="bootstrap/bootstrap-5.3.2-dist/css/bootstrap.min.css" rel="stylesheet"> -->
  
  <link href="css/style.css" rel="stylesheet" />
  <script href="bootstrap/bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
  <style>
    
  #co:hover{color:red;}
  input
  {
    font-weight: bold;
    color: black;

  }
  

/* box model
    border => thickness, style, color
    padding
    margin
*/
.card{
    transition: .5s;
    border: 1px solid lightgray;
    width: 250px;
    padding: 10px;
    margin: 5px;
    border-radius: 14px;
    
    /* filter: brightness(10%); */
}

.card:hover{
    transform: rotate(1deg);
    width: 290px;
    border: 1px solid white;
    border-radius: 20px;
    color: whitesmoke;
    box-shadow: 5px 8px 16px 6px #eee;
     filter: brightness(2); 
}

.card-img{
    width: 100%;
    border-radius: 14px;
    filter: brightness(40%);
}
.flex{
    display:flex;
    justify-content: center;
    flex-wrap: wrap;
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
                <li role="presentation"><a href="ViewStockE.php" id='co' >View Stock</a></li>
				<li role="presentation"><a href="food.php" id='co' style="color: red;">View Food</a></li>
        <li role="presentation"><a href="index.php" id='co' >LogOut</a></li>

               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <section id="main-slider" class="no-margin">
    <div >
      <div class="">
        <div class="item active" style="background-image: url(images/extra/foodbg.jpg);background-attachment:fixed">
     
        <div class="container m-3" style="width:80%;height:80%;margin:4% 8%;border: 4px solid gray; background-color:#f4978e;border-radius:4px 6px; overflow:auto; text-align:center;padding:4%" >
          <!-- <h1 class=" " style="text-align: center;">A Clean &amp; Minimal Landing Template</h1 -->
          <div class="flex">
          <?php
           $query="Select *from food";
           $data=mysqli_query($con,$query);
           $total=mysqli_num_rows($data);
           if($total!=0)
           {
            
    while($result=mysqli_fetch_assoc($data))
    {
      echo '<div class="card">
            <img src='.$result["url"].' class="card-img" alt="">
            <h3>'.$result["title"].'</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat!</p>
           
            <button class="btn btn-primary text-light"><a href="order.php?name='.$result["title"].'" class="text-light" " style="color:whitesmoke">Order Here</a></button>
        </div>';

    
  }
}

      ?>
 
        
    </div>
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
