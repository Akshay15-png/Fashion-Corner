<?php
include("./db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orderID = $_POST['orderID'];
    $sql = "SELECT * FROM orders WHERE orderID = '$orderID' ";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // if status is 'Delivered'
        if ($row['Status'] == 'Delivered') {
            $update_status="UPDATE `orders` SET `Status`='Returning' WHERE orderID = '$orderID'";
            if ($con->query($update_status) === TRUE) {
                echo "<script>alert('Order status updated to Returning.');</script>";
                echo "<script>window.location.href = '../after_login/product_description/return_order.php';</script>";
            } else {
                echo "<script>alert('Error updating order status: " . $con->error . "');</script>";
                echo "<script>window.location.href = '../after_login/product_description/return_order.php';</script>";
            }
        }
        // if status is 'Active'
        elseif ($row['Status'] == 'Active') {
            echo "<script>alert('Order is not delivered yet.');</script>";
            echo "<script>window.location.href = '../after_login/product_description/return_order.php';</script>";
        }
        // if status is 'Canceled'
        elseif ($row['Status'] == 'Canceled') {
            echo "<script>alert('Order was canceled before delivery.');</script>";
            echo "<script>window.location.href = '../after_login/product_description/return_order.php';</script>";
        }
        // if status is 'Returned'
        elseif ($row['Status'] == 'Returned') {
            echo "<script>alert('Order was already returned.');</script>";
            echo "<script>window.location.href = '../after_login/product_description/return_order.php';</script>";
        }
        // if status is 'Returning'
        elseif ($row['Status'] == 'Returning') {
            echo "<script>alert('Order is already in returning phase.We will contact you');</script>";
            echo "<script>window.location.href = '../after_login/product_description/return_order.php';</script>";
        }
        else{
            echo "<script>alert('Done');</script>";

        }

    } 
    else {
        echo "<script>alert('Order ID not found. Please check the ID and try again.');</script>";
        echo "<script>window.location.href = '../after_login/product_description/return_order.php';</script>";
    }

    $con->close();
}
?>
