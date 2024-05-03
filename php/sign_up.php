<?php
$db_host="localhost";
$db_user= "root";
$db_pass= "";
$db_name= "fashion-corner";

$con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if ($con->connect_error) {
    die("Connection Failed. ".mysqli_connect_error());
}

$userName=$_POST['username'];
$userEmail=$_POST['useremail'];
$userPass=$_POST['userpass'];
$passEncrypt=md5($userPass);
$insert="INSERT INTO `login_details` (`Name`, `Email`, `Password`, `Date/Time`) VALUES ('$userName', '$userEmail', '$passEncrypt', current_timestamp());";

if($con->query($insert) === TRUE){
    sleep(1);
    header("Location: ../login2.html");
    exit();
}
else{

    header("Location: ../login.html");
    exit();
}

$con->close();
?>