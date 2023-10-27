<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
     
  body{
    background-color:#000000;
          /* background-image:url("web-1012467_1280.webp"); */
  }
 
  .aboutus
  {
    color:#e0dbc1;
    padding-top:50px;
    font-family: 'Libre Baskerville';
    text-align: center;
    font-weight:900;
    font-size:50px;
    white-space: nowrap;
    overflow: hidden;
  }

.aboutcon
{
  color:white;
  padding-top:30px;
  /* text-align: justify;
  justify-content: center;*/
  margin-left: 10%;
  margin-right: 10%; 
  font-size:30px;
}
.sec1{
  
  text-align:justify;
  position:relative;
  float:right;
} 
.pic1{
  padding-top:10px;
  width:400px;
  height:325px;
}
.sec1 img {
 float: left;
 margin-right: 10px;
}
.sec1 p {
 margin-left:200px;
 padding-left:300px;
}
.sec2{
  text-align:left;
  position:relative;
  float:left;
}
.sec2 img{
float: right;
margin-left: 10px; 
} 
.sec2 p {
  margin-right: 500px;
  text-align:justify;
}


.aboutus span {
display: inline-block;
opacity: 0;
transition: opacity 0.5s, color 0.5s;

}


.word {
display: inline-block;
opacity: 0;
transition: opacity 0.5s;
margin: 0 3px;
}
    </style>
</head>
<body>

<div>
 
<div class="aboutus">
  <span class="word" style="color: #e0dbc1;">Welcome</span>
  <span class="word" style="color: #e0dbc1;">to</span>
  <span class="word" style="color: #e0dbc1;">Project</span>
  <span class="word" style="color: #e0dbc1;">Link</span>
  <span class="word" style="color: #e0dbc1;">Hub</span>
</div>


   <div class="aboutcon" >
    <div class="sec1">
     <img src="pic1.jpg" alt="" class="pic1">
     <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique hic quasi voluptatum sapiente nostrum porro, laboriosam ullam aliquid quae nemo.  
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus facere labore quod nam doloremque error sequi. Laborum, aliquid, quis, similique eaque explicabo dolores blanditiis ullam neque voluptatibus dolor numquam laudantium.
      </p>
    </div>
    <div class="sec2">
     <img src="pic2.jpg" alt="" class="pic1">
     <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique hic quasi voluptatum sapiente nostrum porro, laboriosam ullam aliquid quae nemo.  
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi culpa quo, ad facere cumque molestias explicabo, soluta qui animi pariatur cupiditate accusamus distinctio quas tenetur voluptatibus totam laborum magnam fugiat incidunt, cum amet accusantium iste. Asperiores provident quos placeat! Id repellendus in culpa nostrum repudiandae dicta aliquam iusto commodi est!
      <div style="text-align:right"><a href="login.php">Click here to login</a></div>
      </p>
    </div>
    </div>
  </div>
  


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const words = document.querySelectorAll(".word");
    let delay = 0;

    words.forEach((word) => {
      word.style.transitionDelay = delay + "s";
      delay += 0.5; // Adjust the delay (0.5s) as needed for the desired speed.

      setTimeout(() => {
        word.style.opacity = 1;
      }, delay * 300);
    });
  });
</script>
</body>
</html>