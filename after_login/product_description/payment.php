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
  <script src="../../js/payment.js"></script>
</head> 

<body> 
	<div class="container"> 
		<form action="../../php/orders2.php" method="POST"> 

			<div class="row"> 
				<div class="col" style="padding-right:30px"> 
					<h3 class="title"> Billing Address </h3> 

					<div class="inputBox"> 
						<label for="name"> Full Name: </label> 
						<input type="text" id="name" name="fullname" placeholder="Enter your full name" required style="padding-left:20px"> 
					</div> 

					<div class="inputBox"> 
						<label for="email"> Email: </label> 
						<input type="text" id="email" name="emailaddress" placeholder="Enter email address" required style="padding-left:20px"> 
					</div> 

					<div class="inputBox"> 
						<label for="address"> Address: </label> 
						<input type="text" id="address" name="address" placeholder="Enter address" required style="padding-left:20px"> 
					</div> 

					<div class="inputBox"> 
						<label for="city"> City: </label> 
						<input type="text" id="city" name="city" placeholder="Enter city" required style="padding-left:20px"> 
					</div> 

					<div class="flex"> 

						<div class="inputBox"> 
							<label for="state"> State: </label> 
							<input type="text" id="state" name="state" placeholder="Enter state" required style="padding-left:20px"> 
						</div> 

						<div class="inputBox" style="padding-left:50px;"> 
							<label for="zip"> Pin Code: </label> 
							<input type="number" id="zip" name="pincode" placeholder="123 456" required style="padding-left:20px"> 
						</div> 

					</div> 

				</div> 
				<div class="col" style="padding-left:30px"> 
					<h3 class="title">Payment</h3> 

					<div class="inputBox"> 
						<label for="name"> Card Accepted: </label> 
						<img src="../../assets/master_card.png" alt="credit/debit card image" style="height: 50px;"> 
						<img src="../../assets/visa.png" alt="credit/debit card image" style="height: 50px;"> 
						<img src="../../assets/paypal.png" alt="credit/debit card image" style="height: 50px;"> 
					</div> 

					<div class="inputBox"> 
						<label for="cardName"> Name On Card: </label> 
						<input type="text" id="cardName" name="cardname" placeholder="Enter card name" required style="padding-left:20px"> 
					</div> 

					<div class="inputBox"> 
						<label for="cardNum"> Credit Card Number: </label> 
						<input type="text" id="cardNum" name="cardno" placeholder="1111-2222-3333-4444" maxlength="16" required style="padding-left:20px"> 
					</div> 

					<div class="inputBox"> 
						<label for="">Exp Month:</label> 
						<select name="expmonth" id="" style="padding-left:20px;border-radius:10px;cursor:pointer;"> 
							<option value="">Choose month</option> 
							<option value="January">January</option> 
							<option value="February">February</option> 
							<option value="March">March</option> 
							<option value="April">April</option> 
							<option value="May">May</option> 
							<option value="June">June</option> 
							<option value="July">July</option> 
							<option value="August">August</option> 
							<option value="September">September</option> 
							<option value="October">October</option> 
							<option value="November">November</option> 
							<option value="December">December</option> 
						</select> 
					</div> 


					<div class="flex" > 
						<div class="inputBox" > 
							<label for="">Exp Year:</label> 
							<select name="expyear" id="" style="padding-left:10px;border-radius:10px;cursor:pointer;"> 
								<option value="">Choose Year</option> 
								<option value="2023">2023</option> 
								<option value="2024">2024</option> 
								<option value="2025">2025</option> 
								<option value="2026">2026</option> 
								<option value="2027">2027</option> 
							</select> 
						</div> 

						<div class="inputBox" style="padding-left:45px;"> 
							<label for="cvv">CVV</label> 
							<input type="number" id="cvv" name="cvv" placeholder="1234" maxlength="4" required style="padding-left:20px" > 
						</div> 
					</div> 

				</div> 

			</div> 
			<input type="hidden" name="productID" id="productID">
			<input type="hidden" name="productName" id="productName">
			<input type="hidden" name="productImage" id="productImage">
			<input type="hidden" name="totalItems" id="totalItems">
            <input type="hidden" name="totalPrice" id="totalPrice">
			<input type="submit" value="Proceed to Checkout" class="submit_btn" style="border-radius:10px "> 
		</form> 

	</div> 
</body> 

</html>
<!-- cvv validation -->
<script>
    var cvvInput = document.getElementById("cvv");
    cvvInput.addEventListener("input", function(event) {
      var currentValue = event.target.value;
      if (currentValue.length > 4) {
        event.target.value = currentValue.slice(0, 4);
      }
    });
  </script>

<script>
    let cart = localStorage.getItem("cart");
    if (cart) {
        cart = JSON.parse(cart);
    } else {
        cart = [];
    }

    function displayCartItems() {
		const cartItemsProductID = document.getElementById("productID");
		const cartItemsProductName = document.getElementById("productName");
		const cartItemsProductImage = document.getElementById("productImage");
        let totalItems = 0;
        let totalPrice = 0;
		let itemNames = [];
        cart.forEach(item => {
            totalItems += parseInt(item.quantity);
            totalPrice += parseInt(item.price) * parseInt(item.quantity);

			itemNames.push(item.name); // Add each product name to the array
            cartItemsProductImage.value = item.image;
			cartItemsProductName.value += item.name + ", ";
			cartItemsProductID.value = item.id
        });

        // Set hidden input values
        document.getElementById('totalItems').value = totalItems;
        document.getElementById('totalPrice').value = totalPrice;
    }

    function submitForm() {
        displayCartItems(); // Update hidden input fields before submitting the form
    }

    // Call displayCartItems on page load to initialize hidden fields
    displayCartItems();
</script>
    <!-- alert message -->
    <script>
        var submitButton = document.getElementById('subscribe_successful_button');
        var form = document.getElementById('subscribed_form');
        var alertBox = document.getElementById('alertBox');

        function showAlert(message) {
            alertBox.textContent = message;
            alertBox.classList.remove('hide');
            setTimeout(hideAlert, 3000); // Hide after 3 seconds (adjust as needed)
        }

        function hideAlert() {
            alertBox.classList.add('hide');
        }

        submitButton.addEventListener('click', function(event) {
            event.preventDefault(); 
            setTimeout(function() {
                form.submit();
            }, 2000); 
        });


    </script>