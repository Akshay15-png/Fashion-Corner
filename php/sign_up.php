<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "fashion-corner";

// Establish database connection
$con = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($con->connect_error) {
    die("Connection Failed: " . $con->connect_error);
}

$userName = $_POST['username'];
$userEmail = $_POST['useremail'];
$userPass = $_POST['userpass'];
$passEncrypt = md5($userPass);

// Check email already exists 
$checkQuery = "SELECT * FROM `login_details` WHERE `Email` = '$userEmail'";
$result = $con->query($checkQuery);

if ($result->num_rows > 0) {
    // redirect back signup page with error message
    echo"<script>alert('Email already exists')</script>";
    echo "<script>window.location.href = '../login.html';</script>";
    exit();
}

// Email is not registered
$insertQuery = "INSERT INTO `login_details` (`Name`, `Email`, `Password`, `Date/Time`) 
                VALUES ('$userName', '$userEmail', '$passEncrypt', current_timestamp())";

if ($con->query($insertQuery) === TRUE) {
    sleep(1);
    header("Location: ../login2.html"); 
    exit();
} else {
    echo"<script>alert('Backend Problem')</script>";
    echo "<script>window.location.href = '../login.html';</script>"; 
    exit();
}

$con->close();
?>
