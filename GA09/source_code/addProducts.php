<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.css">
    <style>
        body {
            background-color: #17181a;
        }

        .heading {
            font-family: Century Gothic;
            font-size: 40px;
            text-align: center;
            margin-top: 20px;
        }

        #form {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
        }

        label {
            font-weight: bold;
        }

        .btn {
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <?php include('adminNav.php') ?>
    <div class="container">
        <div class='row'>
            <div class='col-md-12' style="color : #ffffff">
                <h1 class='heading'>Products</h1>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-8" id="form">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <select name="ptype" class='form-control'>
                            <option>Choose Category</option>
                            <option value="electronics">Electronics</option>
                            <option value="clothing">Clothing</option>
                            <option value="shoes">Shoes</option>
                            <option value="watches">Watches</option>
                            <option value="books">Books</option>
                            <option value="toys">Toys</option>
                            <option value="furniture">Furniture</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pname" value="" class='form-control' placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="brand" value="" class='form-control' placeholder="Brand Name">
                    </div>
                    <div class="form-group">
                        <textarea name="desc" value="" placeholder="Description" rows="4" class='form-control'></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" name="bprice" class='form-control' value="" placeholder="Base Price">
                    </div>
                    <div class="form-group">
                        <input type="number" name="qty" value="" class='form-control' placeholder="Quantity">
                    </div>
                    <div class="form-group">
                        <input type="text" name="sname" value="" class='form-control' placeholder="Seller Name">
                    </div>
                    <div class="form-group">
                        <input type="number" name="expiration_days" class="form-control" placeholder="Expiration Days">
                    </div>
                    <div class="form-group">
                        <label for="poster">Insert Product Image</label>
                        <input type="file" name="poster" class='form-control'>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit" name="submit">SUBMIT</button>
                        <button class="btn btn-warning" type="reset">CLEAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>

<?php
include "dbcon.php";

if (isset($_POST['ptype'])) {
    $ptype = $_POST['ptype'];
    $pname = $_POST['pname'];
    $brand = $_POST['brand'];
    $desc = $_POST['desc'];
    $bprice = $_POST['bprice'];
    $qty = $_POST['qty'];
    $sname = $_POST['sname'];
    $expiration_days = $_POST['expiration_days'];

    // Calculate expiration date based on current date and provided expiration days
    $current_date = new DateTime();
    $expiration_date = $current_date->modify("+$expiration_days days")->format('Y-m-d H:i:s');

    $folder = "Images";
    move_uploaded_file($_FILES['poster']['tmp_name'], "$folder/" . basename($_FILES['poster']['name']));
    $path = "$folder/" . basename($_FILES['poster']['name']);

    $sql = "INSERT INTO products (product_type, product_name, brand, description, base_price, quantity, seller_name, product_image, expiration_date) VALUES ('$ptype', '$pname', '$brand', '$desc', '$bprice', '$qty', '$sname', '$path', '$expiration_date')";

    if (mysqli_query($con, $sql)) {
        // Product added successfully, show alert using JavaScript
        echo '<script>alert("Product added successfully!");</script>';
    } else {
        echo '<script>alert("Failed to add product");</script>';
    }
}
?>
