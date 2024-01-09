<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>C-MAN</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" /><style>
  #co:hover{color:red;}
  input
  {
    font-weight: bold;
    color: black;

  }

  
<?php
if(isset($_REQUEST['submit']))
  {
   
  $aaa=$_POST['fname'];
  $aa=$_POST['lname'];
  $a=$aaa." ".$aa;
  $b=$_POST['mno'];
  $c=$_POST['email'];
  $d=$_POST['add'];
  $e=$_POST['dob'];
  $f=$_POST['pcode'];
  $h=$_POST['pass'];
  
  
  $con=mysqli_connect("localhost","root","","project");
  $sql="insert into employee2(name,mobile,email,address,dob,pincode,password) values('$a','$b','$c','$d','$e','$f','$h')";
    if(mysqli_query($con,$sql))
    {     
      header("location:reg.php?msg=Registration Successfully");      
    }   
else{header("location:reg.php?msg=Error!!!!!!!!!!!!!");      
    }   
  }   
?>
  </style>
</head>

<body style="background-image: url(bgreg.jpg);">
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
                
                <li role="presentation"><a href="contactus.php" id='co' >Contact Us</a></li>
               
				<li role="presentation" style="color: red;"><a href="reg.php" id='co' style="color: red;" >SIGN UP </a></li>
        

               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>

  
<br>
<br>
<br>
<br>
<br>
<br>
<section style="background-image: url(./addS.jpg); margin-top:-45px;background-attachment:fixed;">
<center>
<div class="container" >
<br>
<div style="width: 100%; height:10%; background-color:white;">
<?php if(isset($_GET['msg']))

{

	echo "<h4>".$_GET['msg']."</h4>";
}
  ?>
  </div>



    <form class="well form-horizontal" action=" " method="post"  id="contact_form" style="background-color: #ffc300;" onsubmit="return validateform()">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Registration Form</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">First Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="fname" placeholder="First Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Last Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="lname" placeholder="Last Name" class="form-control"  type="text">
    </div>
  </div>
</div>

  <div class="form-group"> 
  
  
</div>
  
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Mobile No</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg></span>
  <input  name="mno" placeholder="+91" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >E-Mail</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
</svg></span>
  <input name="email" placeholder="E-Mail" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Address</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
</svg></span>
  <input name="add" placeholder="Address" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">DOB</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg></i></span>
  <input name="dob" placeholder="DOB" class="form-control"  type="date">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Pin Code</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-browser-safari" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm.25-14.75v1.5a.25.25 0 0 1-.5 0v-1.5a.25.25 0 0 1 .5 0Zm0 12v1.5a.25.25 0 1 1-.5 0v-1.5a.25.25 0 1 1 .5 0ZM4.5 1.938a.25.25 0 0 1 .342.091l.75 1.3a.25.25 0 0 1-.434.25l-.75-1.3a.25.25 0 0 1 .092-.341Zm6 10.392a.25.25 0 0 1 .341.092l.75 1.299a.25.25 0 1 1-.432.25l-.75-1.3a.25.25 0 0 1 .091-.34ZM2.28 4.408l1.298.75a.25.25 0 0 1-.25.434l-1.299-.75a.25.25 0 0 1 .25-.434Zm10.392 6 1.299.75a.25.25 0 1 1-.25.434l-1.3-.75a.25.25 0 0 1 .25-.434ZM1 8a.25.25 0 0 1 .25-.25h1.5a.25.25 0 0 1 0 .5h-1.5A.25.25 0 0 1 1 8Zm12 0a.25.25 0 0 1 .25-.25h1.5a.25.25 0 1 1 0 .5h-1.5A.25.25 0 0 1 13 8ZM2.03 11.159l1.298-.75a.25.25 0 0 1 .25.432l-1.299.75a.25.25 0 0 1-.25-.432Zm10.392-6 1.299-.75a.25.25 0 1 1 .25.433l-1.3.75a.25.25 0 0 1-.25-.434ZM4.5 14.061a.25.25 0 0 1-.092-.341l.75-1.3a.25.25 0 0 1 .434.25l-.75 1.3a.25.25 0 0 1-.342.091Zm6-10.392a.25.25 0 0 1-.091-.342l.75-1.299a.25.25 0 1 1 .432.25l-.75 1.3a.25.25 0 0 1-.341.09ZM6.494 1.415l.13.483a.25.25 0 1 1-.483.13l-.13-.483a.25.25 0 0 1 .483-.13ZM9.86 13.972l.13.483a.25.25 0 1 1-.483.13l-.13-.483a.25.25 0 0 1 .483-.13ZM3.05 3.05a.25.25 0 0 1 .354 0l.353.354a.25.25 0 0 1-.353.353l-.354-.353a.25.25 0 0 1 0-.354Zm9.193 9.193a.25.25 0 0 1 .353 0l.354.353a.25.25 0 1 1-.354.354l-.353-.354a.25.25 0 0 1 0-.353ZM1.545 6.01l.483.13a.25.25 0 1 1-.13.483l-.483-.13a.25.25 0 1 1 .13-.482Zm12.557 3.365.483.13a.25.25 0 1 1-.13.483l-.483-.13a.25.25 0 1 1 .13-.483Zm-12.863.436a.25.25 0 0 1 .176-.306l.483-.13a.25.25 0 1 1 .13.483l-.483.13a.25.25 0 0 1-.306-.177Zm12.557-3.365a.25.25 0 0 1 .176-.306l.483-.13a.25.25 0 1 1 .13.483l-.483.13a.25.25 0 0 1-.306-.177ZM3.045 12.944a.299.299 0 0 1-.029-.376l3.898-5.592a.25.25 0 0 1 .062-.062l5.602-3.884a.278.278 0 0 1 .392.392L9.086 9.024a.25.25 0 0 1-.062.062l-5.592 3.898a.299.299 0 0 1-.382-.034l-.005-.006Zm3.143 1.817a.25.25 0 0 1-.176-.306l.129-.483a.25.25 0 0 1 .483.13l-.13.483a.25.25 0 0 1-.306.176ZM9.553 2.204a.25.25 0 0 1-.177-.306l.13-.483a.25.25 0 1 1 .483.13l-.13.483a.25.25 0 0 1-.306.176Z"/>
</svg></span>
  <input name="pcode" placeholder="Pin" class="form-control" type="text">
    </div>
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label">Password</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg></span>
  <input name="pass" placeholder="Password" class="form-control" type="password">
    </div>
  </div>
</div>

<!-- Select Basic -->

<!-- Success message -->

<!-- Button -->
<div class="form-group" style="background-color: fb8500;">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button class="btn btn-warning" name="submit" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->
    </center>
    <hr>
    </section>
<!-- Ends Here  --> 


  
  <section id="conatcat-info" style="margin-top:-10px ;">
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
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Company
              -->
              <a href="#" style="color:black;font-weight:bold;">Made </a> By <a href="#" style="color:black;font-weight:bold;">ANMOL && GAURAV</a>
            </div>
          </div>
        </div>
      </div>

      <div class="pull-right">
        <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
      </div>
    </div>
  </footer>
  <script>  
function validateform(){  
var password=document.myform.t2.value;  
var pin=document.myform.t6.value;  
  
 if(password.length<10){  
  alert("mobile no must be 10 Digits.");  
  return false;  
  } else if(password.length>10){  
  alert("mobile no must be 10 Digits.");  
  return false;  
  }   else if(pin.length<6){  
  alert("pincode must be 6 Digits.");  
  return false;  
  } else if(pin.length>6){  
  alert("pincode must be 6 Digits.");  
  return false;  
  }   
}  
</script>



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
