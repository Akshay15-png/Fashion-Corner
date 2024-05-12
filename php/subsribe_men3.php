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

$userEmail = $_POST['useremail'];

// Check email already exists 
$checkQuery = "SELECT * FROM `subscribers` WHERE `Email` = '$userEmail'";
$result = $con->query($checkQuery);

if ($result->num_rows > 0) {
    // not inserting email
    echo "<script>alert('Subscribed successfully');</script>";
    echo "<script>window.location.href = '../men3.html';</script>"; 
    exit();
}

// IF Email is not exist in db's subscribers table
$insertQuery = "INSERT INTO `subscribers` (`Email`, `Date/Time`) VALUES ('$userEmail', current_timestamp())";

if ($con->query($insertQuery) === TRUE) {
    sleep(1);
    echo "<script>alert('Subscribed successfully');</script>";
    echo "<script>window.location.href = '../men3.html';</script>"; 
    exit();
} else {
    echo"<script>alert('Backend Problem')</script>";
    echo "<script>window.location.href = '../men3.html';</script>"; 
    exit();
}

$con->close();
?>
