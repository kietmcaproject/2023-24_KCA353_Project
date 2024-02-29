<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Products</title>
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
            color: #ffffff;
        }

        #form {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            color: #000000;
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
            <div class='col-md-12'>
                <h1 class='heading'>Delete Products</h1>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-8" id="form">
                <!-- Form to delete products -->
                <form method="post" action="">
                    <div class="form-group">
                        <label for="id">Select Product to Delete:</label>
                        <select name="id" class='form-control'>
                            <!-- Fetch and display product options from the database -->
                            <?php
                            include "dbcon.php";

                            $result = mysqli_query($con, "SELECT id, product_name FROM products");

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='{$row['id']}'>{$row['product_name']}</option>";
                            }

                            ?>
                        </select>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-danger" type="submit" name="delete">DELETE PRODUCT</button>
                    </div>
                </form>

                <?php
                // Handle product deletion
                if (isset($_POST['delete']) && isset($_POST['id'])) {
                    $id = $_POST['id'];

                    // Perform the delete operation
                    $delete_query = "DELETE FROM products WHERE id = $id";

                    if (mysqli_query($con, $delete_query)) {
                        // Product deleted successfully, show alert using JavaScript
                        echo '<script>alert("Product deleted successfully!");</script>';
                    } else {
                        echo '<script>alert("Failed to delete product");</script>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
