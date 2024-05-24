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
    <title>Choose Payment Method</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap'); 
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .payment-container {
            background-color: white;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            height: 700px;
        }
        .section {
            margin-top: 50px;
        }
        .section h3 {
            margin-bottom: 15px;
            font-size: 20px;
            color: #555;
        }
        .payment-option {
            display: flex;
            align-items: center;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 18px;
            color: black;
        }
        .payment-option:hover {
            background-color: #f7f7f7;
            cursor: pointer;
        }
        .payment-option input {
            margin-right: 10px;
            cursor: pointer;
        }
        .payment-option label {
            flex: 1;
            cursor: pointer;
        }
        .continue-button {
            margin-top: 40px;
            width: 100%;
            padding: 15px;
            background-color: #df8e14;
            border: 1px solid #a88734;
            border-radius: 5px;
            font-size: 20px;
            cursor: pointer;
            color: white;
        }
        .continue-button:hover {
            background-color: rgb(1, 143, 34);
            transition: all 0.2s linear; 
        }
    </style>
</head>
<body>

<div class="payment-container">
    <div class="section">
        <h3>CREDIT & DEBIT CARDS</h3>
        <div class="payment-option" id="used_card_for_payment">
            <input type="radio" id="creditCard" name="paymentMethod" value="Credit or Debit Card">
            <label for="creditCard">Credit or debit card</label>
        </div>
        <div class="payment-option" id="used_upi_for_payment">
            <input type="radio" id="upiApps" name="paymentMethod" value="Other UPI Apps">
            <label for="upiApps">UPI Apps <br><small>Google Pay, PhonePe, Paytm and more</small></label>
        </div>
    </div>
    <div class="section">
        <h3>MORE WAYS TO PAY</h3>
        <div class="payment-option">
            <input type="radio" id="emi" name="paymentMethod" value="EMI" disabled>
            <label for="emi" style="color:#acacac;">EMI <br><small>Currently unavailable for this payment</small></label>
        </div>
        <div class="payment-option">
            <input type="radio" id="netBanking" name="paymentMethod" value="Net Banking" disabled>
            <label for="netBanking" style="color:#acacac;">Net Banking<br><small>Currently unavailable for this payment</small></label>
        </div>
        <div class="payment-option">
            <input type="radio" id="used_cash_for_payment" name="paymentMethod" value="Cash on Delivery">
            <label for="used_cash_for_payment">Cash on Delivery/Pay on Delivery </label>
        </div>
    </div>
    <button class="continue-button" onclick="submitPayment()">Continue</button>
</div>

<script>
    function submitPayment() {
        const selectedPayment = document.querySelector('input[name="paymentMethod"]:checked');
        if (selectedPayment) {
            switch (selectedPayment.id) {
                case 'creditCard':
                    window.location.href = './payment.php';
                    break;
                case 'upiApps':
                    window.location.href = './payment2.php';
                    break;
                case 'used_cash_for_payment':
                    window.location.href = './payment3.php';
                    break;
                default:
                    alert('Please select a valid payment method.');
            }
        } else {
            alert('Please select a payment method.');
        }
    }
</script>

</body>
</html>
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