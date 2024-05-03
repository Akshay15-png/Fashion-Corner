<?php
$db_host="localhost";
$db_user= "root";
$db_pass= "";
$db_name= "fashion-corner";

$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if ($con->connect_error) {
    die("Connection Failed. ".mysqli_connect_error());
}

$userEmail=$_POST['useremail'];
$userPass=$_POST['userpass'];
$passEncrypt=md5($userPass);
$check="SELECT Password from login_details where Email = '$userEmail'";
$result=$con->query($check);
echo $result;



$con->close();
?>