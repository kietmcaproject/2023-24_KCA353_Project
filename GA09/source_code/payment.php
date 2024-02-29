
<?php 
include "dbcon.php"; // Include your database connection file

// Start the session
session_start();
$username = $_SESSION['uname'];

// Get the product ID from the query parameter


// Sanitize the input to prevent SQL injection
$productId = mysqli_real_escape_string($con, $_GET["productId"]);

// Fetch product details from the database
$sql = "SELECT product_name, highest_bid_amount FROM products WHERE id = '$productId'";
$result = mysqli_query($con, $sql);

if ($result && $row = mysqli_fetch_assoc($result)) {
    // Product details found
    $productName = $row["product_name"];
    $price = $row["highest_bid_amount"];

    
} else {
    // Product not found, handle the error as needed
    header("Location: error.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #343a40;
            color: white;
        }

        .container {
            margin-top: 50px;
        }

        .form-control {
            background-color: #495057;
            color: white;
        }

        .btn-outline-success {
            color: #28a745;
            border-color: #28a745;
        }

        .btn-outline-success:hover {
            background-color: #28a745;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-white bg-dark">
                <img src="Images/visa4.jpg" alt="Card image" class="card-img-top">
                <div class="card-body">
                    <form method="post" action="pay.php">
                        <!-- ... (rest of your form content) ... -->
                        <form method="post" action="pay.php" class="border p-4 mb-4">
                <div class="mb-3">
                    <label class="form-label">Card type</label>
                    <select name="ctype" class="form-control">
                        <option value="credit">Credit</option>
                        <option value="debit">Debit</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Card Holder Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Card Number</label>
                    <input type="number" name="cno" class="form-control" required>
                </div>

                <div class="mb-3 form-inline">
                    <label class="form-label">Expiry</label>
                    <select name="month" class="form-control ml-2" required>
                    <option value="jan">Jan</option>
                    <option value="feb">Feb</option>
                    <option value="mar">Mar</option>
                    <option value="apr">Apr</option>
                    <option value="may">May</option>
                    <option value="jun">Jun</option>
                    <option value="jul">Jul</option>
                    <option value="agu">Aug</option>
                    <option value="sep">Sep</option>
                    <option value="oct">Oct</option>
                    <option value="nov">Nov</option>
                    <option value="dec">Dec</option>
                    </select>

                    <label class="ml-4">Year</label>
                    <select name="year" class="form-control ml-2" required>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">CVV No:</label>
                    <input type="text" name="cvv" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Amount:</label>
                    <input type="text" name="amount" class="form-control" value="<?php echo $price; ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Product:</label>
                    <input type="text" name="product" class="form-control" value="<?php echo $productName; ?>" readonly>
                </div>
                <input type="hidden" name="username" value="<?php echo $username; ?>">
                
                <input type="hidden" name="productId" value="<?php echo $productId; ?>">

            
                        <div class="mb-3 text-center">
                            <button class="btn btn-outline-success" type="submit" style="width: 50%">PAY</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get form elements
        var form = document.querySelector('form');
        var cardNumberInput = document.querySelector('input[name="cno"]');
        var cvvInput = document.querySelector('input[name="cvv"]');

        // Add submit event listener to the form
        form.addEventListener('submit', function (event) {
            // Validate card number
            if (cardNumberInput.value.length !== 16 || isNaN(cardNumberInput.value)) {
                alert('Please enter a valid 16-digit card number.');
                event.preventDefault(); // Prevent form submission
                return;
            }

            // Validate CVV
            if (cvvInput.value.length !== 3 || isNaN(cvvInput.value)) {
                alert('Please enter a valid 3-digit CVV.');
                event.preventDefault(); // Prevent form submission
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
