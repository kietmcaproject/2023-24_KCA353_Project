<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Auction</title>
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section>
        <div class="container mt-2" style="padding-top: 4rem;">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-5">
                    <div class="card border-0 shadow p-3 mb-5 rounded ml-5 bg-dark text-white" style="width: 22rem;">
                        <div class="card-body">
                            <h3 class="text-center" data-font-size="25">
                                Login
                            </h3>
                            <hr>
                            <form method="post">
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    name="role" required>
                                    <option selected>Select User Type</option>
                                    <option value="buyer">Buyer</option>
                                    <option value="seller">Seller</option>
                                </select>
                                <input type="text" name="uname" placeholder="Enter Username" required
                                    class="form-control my-4 py-2">
                                <input type="password" name="password" placeholder="Enter Password" required
                                    class="form-control my-4 py-2">

                                <div class="text-center mt-3">
                                    <button type='submit' id="lg"
                                        class='btn btn-outline-secondary'>LOGIN</button>&nbsp;&nbsp;&nbsp;
                                    <button type='reset' class='btn btn-outline-secondary'>RESET</button>
                                    <hr>
                                    <a href="register.php" class="nav-link">New Buyer? Register Here</a>
                                    <br>
                                    <a href="admin.php" class="nav-link">New Seller? Register Here</a>
                                    <hr>
                                </div>
                            </form>

                            <?php
                            include "dbcon.php";
                            $error_message = "";

                            if (isset($_POST['uname'])) {
                                $uname = $_POST['uname'];
                                $password = $_POST['password'];
                                $role = $_POST['role'];

                                $sql = "SELECT password FROM register WHERE username='$uname' UNION SELECT password FROM seller WHERE username='$uname'";
                                $x = mysqli_query($con, $sql);

                                if ($r = mysqli_fetch_assoc($x)) {
                                    $pswd = $r['password'];

                                    if ($pswd == $password) {
                                        session_start();
                                        $_SESSION['uname'] = $uname;
                                        $_SESSION['role'] = $role;  // Add user role to the session
                            
                                        if ($role === 'buyer') {
                                            header("location: main.php?msg=Welcome $uname");
                                        }

                                        if ($role === 'seller') {
                                            header("location: adminmain.php?msg=Welcome $uname");
                                        }
                                    } else {
                                        $error_message = "Invalid Password";
                                    }
                                } else {
                                    $error_message = "Invalid Username";
                                }
                            }
                            ?>

                            <!-- Display error message if any -->
                            <?php if (!empty($error_message)): ?>
                                <div class="alert alert-danger mt-3">
                                    <?php echo $error_message;
                                    $error_message = "";
                                    ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <img src="Images/login.png" alt="Online Bidding" width="400">
                </div>
            </div>
        </div>
    </section>

    <script>
        // Add an event listener for the 'Enter' key press
        document.body.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                // Trigger a click on the login button when 'Enter' is pressed
                document.getElementById('lg').click();
            }
        });
    </script>
</body>

</html>