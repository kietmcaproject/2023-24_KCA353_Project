<?php
include('header.php');
include('dbcon.php');
session_start();

?>
<style>
    .food-nav{
        display: flex;
        width: 100%;
        margin-top: 30px;
        position: sticky;
        top:0px;
        background-color:crimson;
        border-radius:50px;
        
    }
    .food-nav ul{
        display: flex;
        padding: 10px;
        align-items: center;
        justify-content: center;
        margin-left: 50px;
    }
    .food-nav ul li{
        list-style: none;
        padding: 10px;
        text-align:center;
        margin-left: 70px;
    }
    .food-nav ul li:hover{
        background-color:white;
        color:white;
        border-radius:10px;
    }
    .food-nav ul li a{
        text-decoration: none;
        font-size:20px;
        text-align:center;
        color:black;
        font-weight:700;
    }
    .food-h{
        text-align:center;
    }
</style>
<nav class="food-nav">
    <ul>
        
        <li><a href="#south">South-Indian</a></li>
        <li><a href="#italian">Italian</a></li>
        <li><a href="#mah">Maharashtrian</a></li>
        <li><a href="#punjabi">Punjabi</a></li>
        <li><a href="#chinese">Chinese</a></li>
        <li><a href="#deserts">Deserts</a></li>
    </ul>
</nav>

<div class="container">
    <!-- ----------------------------------- South Indian-------------------------- -->
    <h1 class="food-h">South-Indian</h1>
    <div class="row" id="south">
    
        <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
            <div class="card">
                <img src="img/dosa.png" alt="">
                <div class="card-body">
                    <h5 class="card-title">Dosa</h5>
                    <p class="card-text">Price : Rs 100</p>
                   <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                   <input type="hidden" name="item_name" value="Dosa">
                   <input type="hidden" name="price" value="100">
                </div>
            </div>
            </form>
        </div>

        <div class="col-lg-3">
            <form action="manage_cart.php" method="POST">
            <div class="card">
                <img src="img/idli.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title">Idli Sambhar</h5>
                    <p class="card-text">Price : Rs 80</p>
                   <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                   <input type="hidden" name="item_name" value="Idli">
                   <input type="hidden" name="price" value="80">
                </div>
            </div>
            </form>
        </div>

        <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
            <div class="card">
                <img src="img/masakadosa.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title">Masala Dosa</h5>
                    <p class="card-text">Price : Rs 120</p>
                   <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                   <input type="hidden" name="item_name" value="Masala Dosa">
                   <input type="hidden" name="price" value="120">
                </div>
            </div>
            </form>
        </div>
        <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
            <div class="card">
                <img src="img/cheesedosa.jpg" alt="cheese dosa">
                <div class="card-body">
                    <h5 class="card-title">Cheese Dosa</h5>
                    <p class="card-text">Price : Rs 120</p>
                   <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                   <input type="hidden" name="item_name" value="Cheese Dosa">
                   <input type="hidden" name="price" value="120">
                </div>
            </div>
            </form>
        </div>

        <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
            <div class="card">
                <img src="img/onion.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title">Onion Utthapa</h5>
                    <p class="card-text">Price : Rs 110</p>
                   <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                   <input type="hidden" name="item_name" value="onion Utthapa">
                   <input type="hidden" name="price" value="110">
                </div>
            </div>
            </form>
        </div>
        <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
            <div class="card">
                <img src="img/vadasambhar.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title">Vada Sambhar</h5>
                    <p class="card-text">Price : Rs 120</p>
                   <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                   <input type="hidden" name="item_name" value="Vada Sambhar">
                   <input type="hidden" name="price" value="120">
                </div>
            </div>
            </form>
        </div>
       
      

    </div>
    <!-- ================================== Italian===================================== -->
    <h1 class="food-h">Italian</h1>
    <div class="row" id="italian">
       
        <div class="col-lg-3">
           
        <form action="manage_cart.php" method="POST">
            <div class="card">
                <img src="img/chillipasta.jpg" alt="pasta">
                <div class="card-body">
                    <h5 class="card-title">Chilli Pasta</h5>
                    <p class="card-text">Price : Rs 200</p>
                   <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                   <input type="hidden" name="item_name" value="Chili Pasta">
                   <input type="hidden" name="price" value="200">
                </div>
            </div>
            </form>
        </div>

        <div class="col-lg-3">
            <form action="manage_cart.php" method="POST">
            <div class="card">
                <img src="img/burger.jpg" alt="Burger">
                <div class="card-body">
                    <h5 class="card-title">Veg Cheese Burger</h5>
                    <p class="card-text">Price : Rs 110</p>
                   <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                   <input type="hidden" name="item_name" value="Burger">
                   <input type="hidden" name="price" value="110">
                </div>
            </div>
            </form>
        </div>

        <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
            <div class="card">
                <img src="img/pasta.png" alt="pasta">
                <div class="card-body">
                    <h5 class="card-title">Pasta</h5>
                    <p class="card-text">Price : Rs 160</p>
                   <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                   <input type="hidden" name="item_name" value="Pasta">
                   <input type="hidden" name="price" value="160">
                </div>
            </div>
            </form>
        </div>
        <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
            <div class="card">
                <img src="img/pizza.jpg" alt="">
                <div class="card-body">
                    <h5 class="card-title">Pizza</h5>
                    <p class="card-text">Price : Rs 250</p>
                   <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                   <input type="hidden" name="item_name" value="Pizza">
                   <input type="hidden" name="price" value="250">
                </div>
            </div>
            </form>
        </div>

        <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
            <div class="card">
                <img src="img/margereta.jpg" alt="margereta">
                <div class="card-body">
                    <h5 class="card-title">Margereta</h5>
                    <p class="card-text">Price : Rs 150</p>
                   <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                   <input type="hidden" name="item_name" value="Margereta">
                   <input type="hidden" name="price" value="150">
                </div>
            </div>
            </form>
        </div>
        <div class="col-lg-3">
        <form action="manage_cart.php" method="POST">
            <div class="card">
                <img src="img/capsi.jpg" alt="capsi">
                <div class="card-body">
                    <h5 class="card-title">New Capsi Pizza</h5>
                    <p class="card-text">Price : Rs 160</p>
                   <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                   <input type="hidden" name="item_name" value="Capsi Pizza">
                   <input type="hidden" name="price" value="160">
                </div>
            </div>
            </form>
            
        </div>
       
      
        
    </div>
    <!-- ------------------------------------Mah------------------------------------------- -->
    <h1 class="food-h">Maharashtrian</h1>
    <div class="row" id="mah">
       
       <div class="col-lg-3">
          
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/handi.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Veg Handi</h5>
                   <p class="card-text">Price : Rs 100</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Handi">
                  <input type="hidden" name="price" value="100">
               </div>
           </div>
           </form>
       </div>

       <div class="col-lg-3">
           <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/maratha.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Veg Maratha</h5>
                   <p class="card-text">Price : Rs 140</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Maratha">
                  <input type="hidden" name="price" value="140">
               </div>
           </div>
           </form>
       </div>

       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/mah.png" alt="">
               <div class="card-body">
                   <h5 class="card-title">maharashtrian specian Thali</h5>
                   <p class="card-text">Price : Rs 360</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="maharshtra thali">
                  <input type="hidden" name="price" value="360">
               </div>
           </div>
           </form>
       </div>
       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/sandwich.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Sandwich</h5>
                   <p class="card-text">Price : Rs 100</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="sandwich">
                  <input type="hidden" name="price" value="100">
               </div>
           </div>
           </form>
       </div>

       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/panner.png" alt="">
               <div class="card-body">
                   <h5 class="card-title">Paneer Butter Masala</h5>
                   <p class="card-text">Price : Rs 150</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Paneer">
                  <input type="hidden" name="price" value="150">
               </div>
           </div>
           </form>
       </div>
       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/frenchfries.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">French Fries</h5>
                   <p class="card-text">Price : Rs 150</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="French Fries">
                  <input type="hidden" name="price" value="150">
               </div>
           </div>
           </form>
           
       </div>
      
     
       
   </div>
   <!-- ---------------------------------------punjabi------------------------------------ -->
   <h1 class="food-h">Punjabi</h1>
   <div class="row" id="punjabi">
       
       <div class="col-lg-3">
          
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/paneer-tikka.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Paneer Tikka</h5>
                   <p class="card-text">Price : Rs 220</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Tikka">
                  <input type="hidden" name="price" value="220">
               </div>
           </div>
           </form>
       </div>

       <div class="col-lg-3">
           <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/shai.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Shai Paneer</h5>
                   <p class="card-text">Price : Rs 110</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Shai Paneer">
                  <input type="hidden" name="price" value="110">
               </div>
           </div>
           </form>
       </div>

       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/paratha.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Paneer Paratha</h5>
                   <p class="card-text">Price : Rs 160</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Paneer Paratha">
                  <input type="hidden" name="price" value="160">
               </div>
           </div>
           </form>
       </div>
       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/paneer3.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Paneer Butter Masala</h5>
                   <p class="card-text">Price : Rs 150</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Paneer">
                  <input type="hidden" name="price" value="150">
               </div>
           </div>
           </form>
       </div>

       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/panner.png" alt="">
               <div class="card-body">
                   <h5 class="card-title">Paneer Gravy</h5>
                   <p class="card-text">Price : Rs 50</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Paneer Gravy">
                  <input type="hidden" name="price" value="50">
               </div>
           </div>
           </form>
       </div>
       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/thartarat.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Veg Thartarat</h5>
                   <p class="card-text">Price : Rs 150</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Thartarat">
                  <input type="hidden" name="price" value="150">
               </div>
           </div>
           </form>
           
       </div>
      
     
       
   </div>
   <!-- ------------------------------------------chinese-------------------------- -->
   <h1 class="food-h">Chinese</h1>
   <div class="row" id="chinese">
       
       <div class="col-lg-3">
          
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/paneerchilli.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Paneer Chili</h5>
                   <p class="card-text">Price : Rs 120</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Paneer Chili">
                  <input type="hidden" name="price" value="120">
               </div>
           </div>
           </form>
       </div>

       <div class="col-lg-3">
           <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/manchu.png" alt="">
               <div class="card-body">
                   <h5 class="card-title">Manchurion</h5>
                   <p class="card-text">Price : Rs 110</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Manchurion">
                  <input type="hidden" name="price" value="110">
               </div>
           </div>
           </form>
       </div>

       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/sezwan.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Sezwan Rice</h5>
                   <p class="card-text">Price : Rs 160</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Sezwan">
                  <input type="hidden" name="price" value="160">
               </div>
           </div>
           </form>
       </div>
       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/nood.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Veg Dry Noodles</h5>
                   <p class="card-text">Price : Rs 120</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Dry Noodels">
                  <input type="hidden" name="price" value="120">
               </div>
           </div>
           </form>
       </div>

       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/momo.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Boiled Momos</h5>
                   <p class="card-text">Price : Rs 170</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Momos">
                  <input type="hidden" name="price" value="170">
               </div>
           </div>
           </form>
       </div>
       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/hakka.jpg" alt="hakks">
               <div class="card-body">
                   <h5 class="card-title">Paneer Butter Masala</h5>
                   <p class="card-text">Price : Rs 110</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Hakka">
                  <input type="hidden" name="price" value="110">
               </div>
           </div>
           </form>
           
       </div>
      
     
       
   </div>
   <!-- ---------------------------------------------deserts---------------------------------- -->
   <h1 class="food-h">Deserts</h1>
   <div class="row" id="deserts">
       
       <div class="col-lg-3">
          
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/faluda.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Faluda</h5>
                   <p class="card-text">Price : Rs 100</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Faluda">
                  <input type="hidden" name="price" value="100">
               </div>
           </div>
           </form>
       </div>

       <div class="col-lg-3">
           <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/chocochips.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Choco Chips Ice-cream</h5>
                   <p class="card-text">Price : Rs 70</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Chocochips">
                  <input type="hidden" name="price" value="70">
               </div>
           </div>
           </form>
       </div>

       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/cmilkshake.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Chocolate Milkshake</h5>
                   <p class="card-text">Price : Rs 110</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Chocolate Milk">
                  <input type="hidden" name="price" value="110">
               </div>
           </div>
           </form>
       </div>
       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/mangomilk.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Mango Milk Shake</h5>
                   <p class="card-text">Price : Rs 150</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Mango Milk">
                  <input type="hidden" name="price" value="150">
               </div>
           </div>
           </form>
       </div>

       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/vanila.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Vanilla Ice-cream</h5>
                   <p class="card-text">Price : Rs 50</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Vanila icecream">
                  <input type="hidden" name="price" value="50">
               </div>
           </div>
           </form>
       </div>
       <div class="col-lg-3">
       <form action="manage_cart.php" method="POST">
           <div class="card">
               <img src="img/strawberry.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">Strawberry Ice-Cream</h5>
                   <p class="card-text">Price : Rs 170</p>
                  <button type="submit" name="add_to_cart" class="btnn">Add to Cart</button>
                  <input type="hidden" name="item_name" value="Strawberry ice-cream">
                  <input type="hidden" name="price" value="170">
               </div>
           </div>
           </form>
           
       </div>
      
     
       
   </div>
</div>
</body>
</html>