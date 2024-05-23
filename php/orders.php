<?php
include("./db_connection.php");
$fullName=$_POST["fullname"];
$emailAddress=$_POST["emailaddress"];
$address=$_POST["address"];
$city=$_POST["city"];
$state=$_POST["state"];
$pinCode=$_POST["pincode"];
$totalItem=$_POST["totalItems"];
$totalCost=$_POST["totalPrice"];

// check data already exists 
$checkQuery = "SELECT * FROM `orders` WHERE `EmailAddress` = '$emailAddress' AND `Items` = '$totalItem' AND `Total_Cost` = '$totalCost'   ";
$result = $con->query($checkQuery);

if ($result->num_rows > 0) {
    // not inserting data
    echo "<script>alert('Order already placed');</script>";
    echo "<script>window.location.href = '../after_login/product_description/cart.php';</script>"; 
    exit();
}

$insertQuery = "INSERT INTO `orders`(`FullName`, `EmailAddress`, `Address`, `City`, `State`, `PinCode`, `Items`, `Total_Cost`, `Date/Time`)
                VALUES ('$fullName', '$emailAddress', '$address', '$city', '$state', '$pinCode', '$totalItem','$totalCost', current_timestamp())";

if ($con->query($insertQuery) === TRUE) {
    sleep(1);
    echo "<script>window.location.href = '../after_login/product_description/qr_page.php';</script>"; 
    // sleep(6);
    echo "<script>window.location.href = '../after_login/product_description/cart.php';</script>"; 
    exit();
} else {
    echo"<script>alert('Backend Problem')</script>";
    echo "<script>window.location.href = '../after_login/product_description/cart.php';</script>"; 
    exit();
}
?>
