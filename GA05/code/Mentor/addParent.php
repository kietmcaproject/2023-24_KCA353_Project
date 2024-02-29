<?php 
include "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Parent Details</title>
    <!-- Link to Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h2>Add Parent Details</h2>
        <form action="processParent.php" method="post">
        <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
        
        <div class="form-group">
                <label for="father_name">Father's Name:</label>
                <input type="text" class="form-control" id="father_name" name="father_name" required>
            </div>

            <div class="form-group">
                <label for="mother_name">Mother's Name:</label>
                <input type="text" class="form-control" id="mother_name" name="mother_name" required>
            </div>

            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" id="contact" name="contact" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Parent Details</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js scripts (required for Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
