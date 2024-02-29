<?php 
$menteeId = $_GET['id'];
session_start();
$mentorId = $_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 50%;
            margin-top: 50px;
        }

        .card {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #info-response {
            resize: none;
        }
    </style>
    <title>Mentor Chat</title>
</head>
<body>
    <div class="container">
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Chat Response</h2>
                <!-- Form for mentor response -->
                <form action="processRes.php" method="post">
                    <div class="mb-3">
                        <label for="info-response" class="form-label">Response:</label>
                        <textarea id="info-response" name="response" class="form-control" rows="5" cols="50" required></textarea>
                    </div>
                    <!-- Include hidden input field for necessary data -->
                    <input type="hidden" name="id" value="<?php echo $menteeId;?>">
                    <button type="submit" name="submit-response" class="btn btn-success">Submit Response</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
