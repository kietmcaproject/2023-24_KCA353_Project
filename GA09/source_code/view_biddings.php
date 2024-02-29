<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auction Bids</title>
  <style>
    th {
      background-color: #4CAF50;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    body {
      font-family: 'Arial', sans-serif;
      font-size: 16px;
      line-height: 1.6;
    }

    h2 {
      text-align: center;
    }

    tr:hover {
      background-color: #ddd;
    }

    table {
      margin: 20px 0;
    }

    th,
    td {
      padding: 12px;
    }

    table {
      width: 80%;
      margin: 20px auto;
    }
  </style>
</head>

<body>

  <h2 style="text-align:center">Auction Bids</h2>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Product ID</th>
        <th>Bid Amount</th>
        <th>Bid Time</th>
        <th>User ID</th>
      </tr>
    </thead>
    <tbody>
      <?php

      include "dbcon.php";

      // Check connection
      if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }

      // Query to fetch bids from the database
      $sql = "SELECT * FROM bids";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["product_id"] . "</td>
                    <td>" . $row["bid_amount"] . "</td>
                    <td>" . $row["bid_time"] . "</td>
                    <td>" . $row["user_id"] . "</td>
                  </tr>";
        }
      } else {
        echo "<tr><td colspan='5'>No bids found</td></tr>";
      }

      $con->close();
      ?>
    </tbody>
  </table>

</body>

</html>