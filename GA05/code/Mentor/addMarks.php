<?php 
include "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Marks</title>
    <!-- Link to Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
 
        <h2>Add Marks</h2>
        <form action="processMarks.php" method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>

            <div class="form-group">
                <label for="ct1_marks">CT1 Marks:</label>
                <input type="number" class="form-control" id="ct1_marks" name="ct1_marks" required>
            </div>

            <div class="form-group">
                <label for="ct2_marks">CT2 Marks:</label>
                <input type="number" class="form-control" id="ct2_marks" name="ct2_marks" required>
            </div>

            <div class="form-group">
                <label for="pue_marks">PUE Marks:</label>
                <input type="number" class="form-control" id="pue_marks" name="pue_marks" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Marks</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js scripts (required for Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
