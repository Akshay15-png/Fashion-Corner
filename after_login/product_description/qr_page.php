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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UPI QR Code Generator</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
  <style>
  body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f9;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

.container {
  /* max-width: 400px; */
  padding: 20px;
  background: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center;
  border-radius: 8px;
}

h1 {
  margin-bottom: 20px;
  align-items: center;
}

.form input {
  display: block;
  /* width: 100%; */
  padding: 10px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  padding: 10px 20px;
  background: #007bff;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background: #0056b3;
}

#qrCode {
  margin-top: 20px;
  padding: 20px 20px 20px 20px;

}
p{
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  font-size: large;
  font-weight: 700;
  color: green;
}
  </style>
</head>
<body>
  <div class="container">
    <h1>Scan to Pay</h1>
    <div id="cartItemsContainer"></div>
    <div id="qrCode"></div>
    <p>(<span id="totalItems"></span>) items : ₹ <span id="totalPrice">.00</span></p>
  </div>
  <!-- generate qr code -->
  <script>
    // Get cart from local storage
    let cart = localStorage.getItem("cart");
    if (cart) {
        cart = JSON.parse(cart);
    } else {
        cart = [];
    }
    const totalItemsElement = document.getElementById("totalItems");
    const totalPriceElement = document.getElementById("totalPrice");

    let cartItemsContainer = document.getElementById('cartItemsContainer');
    cartItemsContainer.innerHTML = ""; // Clear previous content
    let totalPrice = 0;
    let totalItems = 0;
    cart.forEach(item => {
        totalItems += parseInt(item.quantity);
        totalPrice += parseInt(item.price) * parseInt(item.quantity);
    });
    
    totalItemsElement.textContent = totalItems;
    totalPriceElement.textContent = totalPrice.toFixed(2);


    function generateQR() {
        let amount = totalPrice;

        if (!amount) {
            alert('Something is wrong in QR code generation');
            return;
        }

        // Clear any existing QR code
        document.getElementById('qrCode').innerHTML = "";

        // Format UPI link with parameters for money transfer
        let qrText = 'upi://pay?pa=' + encodeURIComponent('akshaydaisuke@oksbi') + '&am=' + amount + '&cu=INR';

        // Generate QR code
        new QRCode(document.getElementById('qrCode'), {
            text: qrText,
            width: 200,
            height: 200,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    }
    generateQR();
  </script>
</body>
</html>
