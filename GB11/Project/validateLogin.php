<?php
session_start();

// Logout logic
if (isset($_GET['logout'])) {
    // Log out by destroying the session
    session_destroy();
    header("location: index.php?msg=logged out successfully");
    exit();
}

// Login logic
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $u = $_POST['t1'];
    $p = $_POST['t2'];
    $c = $_POST['type'];

    include("config.php");

    if ($c == "employee") {
        $q = "select * from employee2 WHERE email='$u'";
        $result = mysqli_query($con, $q);

        if ($row = mysqli_fetch_assoc($result)) {
            $mail = $row['email'];
            $pass = $row['password'];

            if (($u == $mail) && ($p == $pass)) {
                session_start();
                $_SESSION['eem'] = $mail;
                header("Location: employee.php?msg=welcome Employee");
                exit();
            } else {
                echo "<script>alert('Error: You are not allowed by admin yet');window.location='index.php';</script>";
            }
        } else {
            echo "<script>alert('Error: Faculty Username OR Password not matched');window.location='index.php';</script>";
        }
    } elseif ($c == "admin") {
        $q = "select * from admin WHERE email='$u'";
        $result = mysqli_query($con, $q);

        if ($row = mysqli_fetch_assoc($result)) {
            $mail = $row['email'];
            $pass = $row['password'];

            if (($u == $mail) && ($p == $pass)) {
                session_start();
                $_SESSION['em'] = $mail;
                header("Location: admin.php?msg=welcome Admin");
                exit();
            } else {
                echo "<script>alert('Error: You are not allowed by admin yet');window.location='index.php';</script>";
            }
        } else {
            echo "<script>alert('Error: Faculty Username OR Password not matched');window.location='index.php';</script>";
        }
    }
}
?>