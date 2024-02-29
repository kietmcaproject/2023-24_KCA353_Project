
<?php
include "nav.php";
include "db.php";
$menteeId = $_GET["id"];
// Assuming you have set 'id' and 'username' in your session
session_start();
$mentor_id = $_SESSION['username']; // Change 'username' to the actual key in your session



// Fetch data from the 'req_res' table with columns 'request' and 'response'
$sql = "SELECT id, request, response FROM req_res WHERE id=? AND mentor_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $menteeId, $mentor_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $requestsData = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $requestsData = array(); // If no requests found, set to an empty array
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Requests</title>
</head>
<body>
    <header>
        <!-- Your header content here -->
    </header>
    <br>
    <hr>
    <main>
        <div class="container">
            <h2>Your Requests:</h2>

            <table class="table">
                <thead>
                    <tr>
                        <!-- <th>ID</th> -->
                        <th>Mentee ID</th>
                        <th>Request</th>
                        <!-- <th>Response</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requestsData as $request) : ?>
                        <tr>
                            <!-- <td><?php echo $request['id']; ?></td> -->
                            <td><?php echo $menteeId; ?></td>
                            <td><?php echo $request['request']; ?></td>
                            <!-- <td><?php echo $request['response']; ?></td> -->
                            <td>
                            <td>
    <button type="button" class="btn btn-info" onclick="redirectToChat('<?php echo $menteeId;?>')">
        Send Messages
    </button>
</td>

<script>
    function redirectToChat(menteeId) {
        // Assuming you want to pass the menteeId to chat.php
        window.location.href = 'sendres.php?id=' + menteeId;
    }
</script>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <!-- Your footer content here -->
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Include your custom JavaScript file if needed -->
</body>
</html>
