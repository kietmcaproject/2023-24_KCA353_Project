<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="mystyle.css" type="text/css">
    <style>
        body{
                background-image:url("web-1012467_1280.webp");
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center 
    align-items-center"
    style="min-height:100vh; color:white">
        <form class="border shadow p-3 rounded" 
            action="php/check-login.php"
            method="post"
            style="width:450px;">
            <h1 class="text-center p-3">LOGIN</h1>
            <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
                  <?=$_GET['error']?>
            </div>
            <?php } ?>
        <div class="mb-3">
        <label for="username" 
            class="form-label"><b>Username </b></label>
        <input type="text" 
            class="form-control" 
            name="username"
            id="username">
        </div>
       
        <div class="mb-3">
        <label for="password" 
            class="form-label"><b>Password</b></label>
        <input type="password" 
            class="form-control" 
            name="password"
            id="password">
        </div>
        
        <div class="mb-1">
        <label  class="form-label"><b>Select User Type</b></label>
        
        </div>
        <select class="form-select mb-3"
            name="role" 
            aria-label="Default select example">
            <option selected value="student">Student</option>
            <option value="faculty">Faculty</option>
         
            </select>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>