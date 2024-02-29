<?php 
include "nav.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Links</title>
    <!-- Link to Bootstrap CSS for styling (optional) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h2>Profile Links</h2>
        <form action="processSocial.php" method="post">
        <div class="form-group">
                <label for="leetcode_link">LAB ID:</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="Enter Student LAB ID" required>
            </div>

            <div class="form-group">
                <label for="leetcode_link">LeetCode Link:</label>
                <input type="text" class="form-control" id="leetcode_link" name="leetcode_link" placeholder="Enter your LeetCode profile link" required>
            </div>

            <div class="form-group">
                <label for="linkedin_link">LinkedIn Link:</label>
                <input type="text" class="form-control" id="linkedin_link" name="linkedin_link" placeholder="Enter your LinkedIn profile link" required>
            </div>

            <div class="form-group">
                <label for="github_link">GitHub Link:</label>
                <input type="text" class="form-control" id="github_link" name="github_link" placeholder="Enter your GitHub profile link" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Links</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js scripts (required for Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
