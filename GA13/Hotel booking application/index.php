<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurent Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="left-nav">
            <img src="img/logo.png" alt="logo">
        </div>
        <div class="right-nav">
            <ul>
                <li class="item"><a href="index.php">Home</a></li>
                <li class="item"><a href="about.php">About Us</a></li>
                <li class="item"><a href="room.php">Rooms</a></li>
                <li class="item"><a href="food.php">Food</a></li>
                <li class="item"><a href="contact.php">Contact Us</a></li>
                <li class="item"><a href="cart.php">Cart</a></li>
                <li class="item"><a href="admin.php">Admin</a></li>
                <li class="item"><a href="bookinghall.php">Booking</a></li>
                <li class="item"><a href="feedback.php">Feedback</a></li>
               
                
            </ul>
        </div>
        <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
                echo "
                <div class='user'>

                    $_SESSION[username] - <a href='logout.php'>LOGOUT</a>
                </div>
                ";
            }
            else{
                echo "
                <div class='sign-in-up'>
                <button type='button' onclick=\"popup('login-popup')\">Login</button>
                <button type='button' onclick=\"popup('register-popup')\">Register</button>
                </div>
                ";
            }
        ?>
    </nav>

    <!-- -------------- login ------------------------------- -->
    <div class="popup-container" id="login-popup">
        <div class=" popup">
            <form action="login_register.php" method="POST">
                <h2>
                    <span>User Login</span>
                    <button type="reset" onclick="popup('login-popup')">X</button>
                </h2>
                <input type="text" placeholder="E-mail or Username" name="email_username" required>
                <input type="password" placeholder="Password" name="password" required>
                <button type="submit" class="login-btn" name="login">Login</button>
            </form>
            <div class="forgot-btn">
                <button type="button" onclick="forgotPopup()">Forgot Password</button>
            </div>
        </div>
    </div>


    <div class="popup-container" id="register-popup">
        <div class="register popup">
            <form action="login_register.php" method="POST">
                <h2>
                    <span>User REGISTER</span>
                    <button type="reset" onclick="popup('register-popup')">X</button>
                </h2>
                <input type="text" placeholder="FULL NAME"  name="fullname" required>
                <input type="text" placeholder="User Name" name="username" required>
                <input type="email" placeholder="E-Mail"  name="email" required>
                <input type="password" placeholder="Password"  name="password" required>
                <button type="submit" class="register-btn" name="register">Register</button>
            </form>
        </div>
    </div>

    <div class="popup-container" id="forgot-popup">
        <div class="forgot popup">
            <form action="forgotpassword.php" method="POST">
                <h2>
                    <span>Reset Password</span>
                    <button type="reset" onclick="popup('forgot-popup')">X</button>
                </h2>
                <input type="email" placeholder="E-mail" name="email">
                
                <button type="submit" class="reset-btn" name="send-reset-link">Send Link</button>
            </form>
            
        </div>
    </div>
    <!-- <?php
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
      {
         echo"<h1 style='text-align:center; margin-top:200px'>Welcome - $_SESSION[username]</h1>";
      }
    ?> -->

    <!-- ----------  Home --------------------- -->
    <section id="home">
        <h1 class="h1">Welcome to Restaurent Management System</h1>
        <p class="p">Hotel rooms have <span class="span">everything you need for a pleasant stay</span> : large comfortable beds covered with special bedspreads that get made by themselves, and bathrooms that are clean and shiny.</p><br>
        <p class="p">Hotel rooms are known for having terraces with <span class="span">views that are perfect for enjoyment</span> views that are perfect for enjoyment.</p>

    </section>

    <section id="rooms-right">
        <div class="paras">
          <p class="sectionTag">A.C Delux Room</p>
          <p class="sectionsubTag font">We have the best services provider in Room Management. with 24 hours room services and 24 hours check-out. We provide world class services in very low cost. i.e. 1100rs.</p>
          
          <p class="price">Price per room : 1100Rs/-</p>
          <a href="room.php"><button class="price-btn" >Book A Room</button></a>
          </div>
          <div class="thumbnail">
          <img src="img/deluxroom.jpg" alt="delux" class="imgFluid">
          </div>
    </section>

    <section id="rooms-left">
        <div class="paras">
          <p class="sectionTag">A.C. Room</p>
          <p class="sectionsubTag font">We have the best services provider in Room Management. with 24 hours room services and 24 hours check-out. We provide world class services in very low cost. i.e. 900rs.</p>
          <p class="price">Price per room : 900Rs/-</p>
          <a href="room.php"><button class="price-btn">Book A Room</button></a>
          </div>
          <div class="thumbnail">
           <img src="img/ac4.jpg" alt="delux" class="imgFluidd">
          </div>
    </section>

    <section id="rooms-right">
        <div class="paras">
          <p class="sectionTag">Non A.C. Room</p>
          <p class="sectionsubTag font">We have the best services provider in Room Management. with 24 hours room services and 24 hours check-out. We provide world class services in very low cost. i.e. 700rs.</p>
          <p class="price">Price per room : 700Rs/-</p>
            <a href="room.php"><button class="price-btn">Book A Room</button></a>
          </div>
          <div class="thumbnail">
          <img src="img/nonacroom.jpg" alt="delux" class="imgFluid">
          </div>
    </section>

    <!-- -------------------------food ------------------------ -->
    <section id="services-container">
        <h1 class="h-primary center">Our Speciality</h1>
        <div id="services">
            <div class="box">
                <a href="food.php"><img src="img/our_services/manchu.png" alt="manchurion"></a>
               <h2 class="h-secondary center">Chinese</h2>
               <p class="center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, assumenda magni sequi maxime ullam magnam minima porro tempore enim sed quidem sint provident facere fugiat facilis qui saepe quia? Aut, repudiandae?
                   Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisicing elit. Quas nulla sit, perspiciatis temporibus unde
               </p>
            </div>
            <div class="box">
                 <a href="food.php"><img src="img/our_services/pasta.png" alt="pasta"></a>
                <h2 class="h-secondary center">Italian</h2>
                <p class="center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, assumenda magni sequi maxime ullam magnam minima porro tempore enim sed quidem sint provident facere fugiat facilis qui saepe quia? Aut, repudiandae?Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas nulla sit, perspiciatis temporibus unde </p>
             </div>
             <div class="box">
             <a href="food.php"><img src="img/our_services/mah.png" alt="maharshtrian"></a>
                <h2 class="h-secondary center">Maharashtrian</h2>
                <p class="center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, assumenda magni sequi maxime ullam magnam minima porro tempore enim sed quidem sint provident Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure mollitia aliquid labore illum ipsa aliquam ad, commodi voluptatum libero minima nesciunt autem quis minus nostrum.</p>
             </div>
        </div>

        <div id="services">
            <div class="box">
            <a href="food.php"><img src="img/our_services/panner.png" alt="panner"></a>
               <h2 class="h-secondary center">Punjabi</h2>
               <p class="center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, assumenda magni sequi maxime ullam magnam minima porro tempore enim sed quidem sint provident facere fugiat facilis qui saepe quia? Aut, repudiandae?
                   Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus reiciendis saepe error modi quo vel!
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit.
               </p>
            </div>
            <div class="box">
            <a href="food.php"><img src="img/our_services/dosa.png" alt="dosa"></a>
                <h2 class="h-secondary center">South-Indian</h2>
                <p class="center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, assumenda magni sequi maxime ullam magnam minima porro tempore enim sed quidem sint provident facere fugiat facilis qui saepe quia? Aut, repudiandae?Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas nulla sit, perspiciatis temporibus unde </p>
             </div>
             <div class="box">
             <a href="food.php"><img src="img/our_services/faluda.png" alt="faluda"></a>
                <h2 class="h-secondary center">Deserts</h2>
                <p class="center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem, assumenda magni sequi maxime ullam magnam minima porro tempore enim sed quidem sint provident Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure mollitia aliquid labore illum ipsa aliquam ad, commodi voluptatum libero minima nesciunt autem quis minus nostrum.</p>
             </div>
        </div>
       
    </section>

    
    <section id="booking-hall">
        <h1 class="h1">Party And Marriage Halls</h1>
        <button id="book-btn"><a href="bookinghall.php"> Book A Hall Now</a></button>

    </section>












    <!-- -------------------------Footer ---------------------------- -->

    <section id="footer" class="section footer">
        <div class="container">
            <div class="footer-container">
                <div class="footer-center">
                <h3>ABOUT US</h3>
                <p>The majority of independent <br> properties are losing out <br> on a lot of business for <br> one very simple reason: <br> their hotel websites are poorly <br> designed.</p>
                </div>
                <div class="footer-center">
                    <h3>USEFULL LINKS</h3>
                    <a href="room.php">Rooms</a>
                    <a href="contact.php">Contact Us</a>
                    <a href="food.php">Food</a>
                    <a href="booking.php">Booking</a>
                    <a href="index.php">Home</a>
                </div>
                <div class="footer-center">
                    <h3>CONTACT INFO</h3>
                    <p>South-Kondwa,Pune, <br>Maharashtra,Pin-414001 <br>+91 7821893289 <br>www.restaurentms.com</p>
                </div>
                <div class="footer-center">
                    <h3>OPENING HOURS</h3>
                    <div>
                        <span>
                            <i></i>
                        </span>
                        Monday: 7:AM - 12Pm
                    </div>
                  
                    <div>
                        <span>
                            <i></i>
                        </span>
                        Tue-Wed: 7:Am - 12Pm
                    </div>
                    <div>
                        <span>
                            <i></i>
                        </span>
                        Thur-Fri: 7:Am - 12Pm
                    </div>
                    <div>
                        <span>
                            <i></i>
                        </span>
                        Sat-Sun: 7:Am - 12Pm
                    </div>


                </div>
            </div>
        </div>
    </section>
    

    <script>
        function popup(popup_name)
        {
             get_popup=document.getElementById(popup_name);
             if(get_popup.style.display=="flex")
            {
                get_popup.style.display="none";
            }
            else{
                get_popup.style.display="flex";
            }
        }

        function forgotPopup()
        {
            document.getElementById('login-popup').style.display="none";
            document.getElementById('forgot-popup').style.display="flex";
        }
    </script>
</body>
</html>