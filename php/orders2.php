<?php

include("./db_connection.php");
$fullName=$_POST["fullname"];
$emailAddress=$_POST["emailaddress"];
$address=$_POST["address"];
$city=$_POST["city"];
$state=$_POST["state"];
$pinCode=$_POST["pincode"];
$cardName=$_POST["cardname"];
$cardNo=$_POST["cardno"];
$expMonth=$_POST["expmonth"];
$expYear=$_POST["expyear"];
$cvv=$_POST["cvv"];
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

$insertQuery = "INSERT INTO `orders`(`FullName`, `EmailAddress`, `Address`, `City`, `State`, `PinCode`, `CardName`, `CardNo`, `ExpYear`, `ExpMonth`, `cvv`, `Items`, `Total_Cost`, `Date/Time`) VALUES 
            ('$fullName', '$emailAddress', '$address', '$city', '$state', '$pinCode','$cardName','$cardNo','$expMonth','$expYear','$cvv','$totalItem','$totalCost', current_timestamp())";

if ($con->query($insertQuery) === TRUE) {
    sleep(1);
    echo "<script>window.location.href = '../after_login/product_description/successfull.php';</script>"; 
    // sleep(6);
    // echo "<script>window.location.href = '../after_login/product_description/cart.php';</script>"; 
    exit();
} else {
    echo"<script>alert('Backend Problem');</script>";
    echo "<script>window.location.href = '../after_login/product_description/cart.php';</script>"; 
    exit();
}

?>
