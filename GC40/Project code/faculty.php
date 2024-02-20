<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Faculty</title>
  <link rel="stylesheet" href="faculty.css" />
  <style>
     .faculty{
            color:red;
        }
    .demo1{
        margin-left: 0px;
        padding: 6px;
        width: 16%;
        font-size: medium;
    }
    .demo2{
        margin-left: 0px;
        padding: 6px;
        width: 17.3%;
    }
    .demo{
        margin-left: 5px;
    }
   .btn{
    background-color: black;
        color: white;
        margin-left: 50px;
        border-radius: 10px;
        font-size: x-large;
        padding: 5px;
        width: 100px;
   }
  </style>
</head>

<body>
  <nav>
    <img src="logot.png" alt="" class="logo" />

    <ul>
      <li><a href="journal.php">Journal Publication</a></li>
      <li><a href="book.php">Book Publication</a></li>
      <li><a href="patent.php">Patents</a></li>
      <li><a href="fdp1.php">FDP</a></li>
      <li><a href="report.php">Reports</a></li>

      <li><a href="faculty.php" class="faculty">Add Faculty</a></li>
      <li><a href="register.php">Registered Faculty</a></li>
      <li><a href="index.php">Home</a></li>
    </ul>
  </nav>

  <div class="container">


    <div class="form1">
      <!--<form action="connect.php" method="get">
          <form onsubmit="myfunction()">-->
      <form action="faculty.php" method="post">
        <label for="id" class="demo"> <b>Faculty Id :</b></label> &emsp;&emsp;&emsp;&emsp;&emsp;<br>
        <input type="text" required class="demo1" id="facultyid" name="facultyid" placeholder="Enter faculty id"/> <br /><br />

        <label for="create-password" class="demo"> <b>Create Password :</b></label> &emsp;&emsp;<br>
        <input type="password" required class="demo1" id="create Password" name="password" placeholder="create your password" /> <br><br>

        <!-- <label for="confirm-password"> <b>Confirm Password :</b></label>   &emsp;
          <input type="password" required class="name2" id="confirm password" /> <br /><br />-->

        <label for="name" class="demo"> <b>Faculty Name :</b></label> &emsp;&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;<br>
        <input type="text" required class="demo1" id="facultyname" name="facultyname" placeholder="Enter faculty name"/><br /><br />

        <label for="designation" class="demo"> <b>Designation :</b></label> &emsp;&emsp;&emsp;&emsp;<br>
        <select id="designation" class="demo2" name="designation">
          <option value="NA">Select your designation</option>
          <option value="Assistant Professor">Assistant Professor</option>
          <option value="Associate Professor">Associate Professor</option>
          <option value="Professor">Professor</option>
          <option value="Head Of Department">Head Of Department</option>
        </select><br /><br />
        <!--<input type="text" required class="name4"> <br><br>-->

        <label for="DOJ" class="demo"> <b>Date Of Joining:</b></label> &emsp; &emsp;<br>
        <input type="date" required class="demo1" id="doj" name="doj" /> <br /><br />

        <label for="department" class="demo"><b>Department :</b></label>&emsp;&emsp;&emsp;&emsp;<br>
        <select id="department" class="demo2" name="department">
          <option value="department">Select your department</option>
          <option value="MCA">MCA</option>
          <option value="MBA">MBA</option>
          <option value="CSE">CSE</option>
          <option value="IT">IT</option>
          <option value="ML">ML</option>
          <option value="CS">CS</option>
          <option value="CSIT">CSIT</option>
          <option value="ME">ME</option>
          <option value="AI-ML">AI-ML</option>
          <option value="B-PHARMA">B-PHARMA</option>
          <option value="M-PHARMA">M-PHARMA</option>
        </select><br /><br />
        <!--<input type="text" required class="name6"> <br><br>-->

        <label for="email" class="demo"> <b>Email Id :</b></label>&emsp; &emsp;&emsp;&emsp;&emsp;&emsp;<br>
        <input type="email" required class="demo1" id="email" name="email" placeholder="Enter faculty email id"/><br /><br />

        <label for="phone" class="demo"> <b>Phone :</b></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<br>
        <input type="number" required class="demo1" id="phoneno" name="mobile" placeholder="Enter faculty phoneno"/>
        <br /><br />
        &emsp;
        <input type="submit" value="Submit" class="btn" name="submit" /> &emsp;
        <!--  <a href="report.php">
        <input type="button" value="View" class="btn" name="view"/></a> -->
      </form>
    </div>
  </div>
  



  <!-- <script>
    
    function myfunction() {
      var facultyid = document.getElementById("facultyid");
      var Password = document.getElementById("create Password");
      var facultyname = document.getElementById("facultyname").value;
      var designation = document.getElementById("designation").value;
      var doj = document.getElementById("doj").value;
      var department = document.getElementById("department").value;
      var emailid = document.getElementById("email").value;
      var phoneno = document.getElementById("phoneno").value;
      document.write("Faculty id = " + facultyid.value + "<br>");
      document.write("Password = " + Password.value + "<br>");
      document.write("Faculty name = " + facultyname + "<br>");
      document.write("Designation = " + designation + "<br>");
      document.write("Date Of Joining = " + doj + "<br>");
      document.write("Department = " + department + "<br>");
      document.write("Email id = " + emailid + "<br>");
      document.write("Phone no = " + phoneno + "<br>");

    }

  </script> -->

</body>

</html>
<?php
$con = mysqli_connect('localhost', 'root', '', 'facultydb');
//echo'Connected successfuly';
if (isset($_POST["submit"])) {
  $facultyid = $_POST["facultyid"];
  $password = $_POST["password"];
  $facultyname = $_POST["facultyname"];
  $designation = $_POST["designation"];
  $doj = $_POST["doj"];
  $department = $_POST["department"];
  $email = $_POST["email"];
  $mobile = $_POST["mobile"];

  $sql = "insert into facultytbl values('$facultyid','$password','$facultyname','$designation','$doj','$department','$email','$mobile')";
  mysqli_query($con, $sql);
  echo "<script> alert('saved successfully')</script>";
}

if (isset($_POST["view"])) {
  $sql="select * from facultytbl";
  $data=mysqli_query($con,$sql);
  while($rows=mysqli_fetch_assoc($data))
  {
    echo $rows["id"];
    echo $rows["password"];
    echo $rows["name"];
    
  }
  }
?>