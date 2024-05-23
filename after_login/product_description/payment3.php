<?php
// Check if user is logged in
session_start();

// Redirect to login page if user is not logged in
if (isset($_SESSION['userEmail']) and isset($_SESSION['userName'])) {
    $userName= $_SESSION['userName'];
    $userEmail= $_SESSION['userEmail'];

  }
else {
    header('Location: ../login.html');
    exit;
}
?>
<!DOCTYPE html> 
<html lang="en"> 

<head> 
	<meta charset="UTF-8"> 
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0"> 
	<title>Online Payment-Page</title> 
	<link rel="stylesheet" href="../../css/product_description/payment.css"> 
  <!-- <script src="../../js/payment.js"></script> -->

</head> 

<body> 
	<div class="container"> 
		<form action="../../php/orders2.php" method="Post"> 

			<div class="row"> 
				<div class="col" style="padding-right:30px"> 
					<h3 class="title"> Billing Address </h3> 

					<div class="inputBox"> 
						<label for="name"> Full Name: </label> 
						<input name="fullname" type="text" id="name" placeholder="Enter your full name" required style="padding-left:20px"> 
					</div> 

					<div class="inputBox"> 
						<label for="email"> Email: </label> 
						<input name="emailaddress" type="text" id="email" placeholder="Enter email address" required style="padding-left:20px"> 
					</div> 

					<div class="inputBox"> 
						<label for="address"> Address: </label> 
						<input name="address" type="text" id="address" placeholder="Enter address" required style="padding-left:20px"> 
					</div> 

					<div class="inputBox"> 
						<label for="city"> City: </label> 
						<input name="city" type="text" id="city" placeholder="Enter city" required style="padding-left:20px"> 
					</div> 

					<div class="flex"> 

						<div class="inputBox"> 
							<label for="state"> State: </label> 
							<input name="state" type="text" id="state" placeholder="Enter state" required style="padding-left:20px"> 
						</div> 

						<div class="inputBox" style="padding-left:50px;"> 
							<label for="zip"> Pin Code: </label> 
							<input name="pincode" type="number" id="zip" placeholder="176101" required style="padding-left:20px"> 
						</div> 
					</div> 
				</div> 
			</div> 

			<!-- total cost and item -->
			<input type="hidden" name="totalItems" id="totalItems">
            <input type="hidden" name="totalPrice" id="totalPrice">
			<button class="submit_btn" style="border-radius:10px" onclick="location.href='./qr_page.php'">Proceed to Checkout</button> 

		</form> 
	</div> 
</body> 

</html>