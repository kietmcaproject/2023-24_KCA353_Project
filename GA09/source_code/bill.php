<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .bill-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #dee2e6;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="bill-container">
    <h2 class="text-center mb-4">Invoice</h2>

    <div class="mb-4">
        <strong>Bill To:</strong>
        <!-- Include customer details here -->
    </div>

    <table>
        <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Retrieve product details from the database or session
        $productName = "Sample Product"; // Replace with actual product name
        $price = 100.00; // Replace with actual product price

        // Display product details in the table
        echo "<tr>";
        echo "<td>{$productName}</td>";
        echo "<td>{$price}</td>";
        echo "</tr>";
        ?>
        </tbody>
    </table>

    <div class="mt-4">
        <strong>Total Amount:</strong>
        <?php
        // Calculate and display the total amount
        $totalAmount = $price; // For now, consider only one product
        echo "<span class='float-end'>$ {$totalAmount}</span>";
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
