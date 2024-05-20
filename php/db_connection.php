<?php
    $db_host="localhost";
    $db_user= "root";
    $db_pass= "";
    $db_name= "fashion-corner";

    $con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
    
    if ($con->connect_error) {
    die("Connection Failed. ".mysqli_connect_error());
    }
?>