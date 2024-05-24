<?php
include("./db_connection.php");

function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

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
$productID=$_POST["productID"];
$productName=$_POST["productName"];
$productImage=$_POST["productImage"];
$totalItem=$_POST["totalItems"];
$totalCost=$_POST["totalPrice"];
$orderID = generateRandomString();

// check data already exists 
$checkQuery = "SELECT * FROM `orders` WHERE `EmailAddress` = '$emailAddress' AND `Items` = '$totalItem' AND `Total_Cost` = '$totalCost' AND `Status` ='Active'  ";
$result = $con->query($checkQuery);

if ($result->num_rows > 0) {
    // not inserting data
    echo "<script>alert('Order already placed');</script>";
    echo "<script>window.location.href = '../after_login/product_description/cart.php';</script>"; 
    exit();
}

$insertQuery = "INSERT INTO `orders`(`orderID`,`FullName`, `EmailAddress`, `Address`, `City`, `State`, `PinCode`, `CardName`, `CardNo`, `ExpYear`, `ExpMonth`, `cvv`, `productID`, `productName`, `productImage`, `Items`,`Status`,`Total_Cost`, `TimeStamp`) VALUES 
            ('$orderID','$fullName', '$emailAddress', '$address', '$city', '$state', '$pinCode','$cardName','$cardNo','$expMonth','$expYear','$cvv', '$productID' ,'$productName' ,'$productImage','$totalItem','Active','$totalCost', current_timestamp())";

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
