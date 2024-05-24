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

$userItem = $_POST['item'];
$userCustomization = $_POST['customization'];
$userName = $_POST['name'];
$userEmail = $_POST['email'];
$userPhone = $_POST['phone'];

// Check data already exists 
$checkQuery = "SELECT * FROM `booking_details` WHERE `Email` = '$userEmail' AND `Item` = '$userItem' ";
$result = $con->query($checkQuery);

if ($result->num_rows > 0) {
    // not inserting data
    echo "<script>window.location.href = '../after_login/main.php';</script>"; 
    exit();
}

// IF data is not exist in db's booking_details table
$insertQuery = "INSERT INTO `booking_details` (`Item`, `Description`, `Name`, `Email`,`Phone`, `Date/Time`) 
                VALUES ('$userItem', '$userCustomization', '$userName', '$userEmail', '$userPhone', current_timestamp())";

if ($con->query($insertQuery) === TRUE) {
    sleep(1);
    echo "<script>window.location.href = '../after_login/main.php';</script>"; 
    exit();
} else {
    echo"<script>alert('Backend Problem')</script>";
    echo "<script>window.location.href = '../after_login/main.php';</script>"; 
    exit();
}

$con->close();
?>
