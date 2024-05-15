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
$check="SELECT * from login_details where Email = '$userEmail' AND Password ='$passEncrypt'";
$result=$con->query($check);
if ($result->num_rows > 0) {
    session_start();
    $checkName="SELECT Name from login_details where Email = '$userEmail'";
    $name=$con->query($checkName)->fetch_assoc();
    $_SESSION["userName"]=$name["Name"];
    $_SESSION["userEmail"]=$userEmail;
    echo "<script>window.location.href = '../after_login/main.php'</script>";
}
else {
    echo "<script>alert('Invalid username or password')</script>";
    echo "<script>window.location.href = '../login.html';</script>";
}


$con->close();
?>