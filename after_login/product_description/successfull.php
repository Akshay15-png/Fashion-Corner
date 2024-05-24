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
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 120px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 50px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        position: relative;
        top: 80px;
        font-size: 200px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    
    <!-- loding spinner -->
    <style>
        /* CSS styles for loading  */
        #loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999; /* Ensure overlay is on top */
        visibility: hidden; /* Initially hidden */
        }

        #loading-spinner {
        width: 50px;
        height: 50px;
        border: 3px solid #f3f3f3; /* Light gray border */
        border-top: 3px solid #58db34; /* Blue border on top (loading animation) */
        border-radius: 50%; /* Circular shape */
        animation: spin 1s linear infinite; /* Spin animation */
        }

        @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
        }
    </style>
    <body>
        <!-- loading circle -->
        <div id="loading-overlay">
        <div id="loading-spinner"></div>
        </div>

      <div class="card">
      <div style="border-radius:200px; height:400px; width:400px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
      </div>
    </body>
</html>
<script>
     let cart = localStorage.getItem("cart");
        if (cart) {
            cart = JSON.parse(cart);
        } else {
            cart = [];
        }
        // clear whole cart
        function clearCart() {
            localStorage.removeItem("cart");
            document.getElementById('loading-overlay').style.visibility = 'visible';
            setTimeout(() => {
                window.location.href=('./cart.php'); 
            }, 5000); 
            }
        window.addEventListener("load", clearCart);
</script>
        <!-- alert message -->
        <script>
          document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('subscribed_form');
            var alertBox = document.getElementById('alertBox');
        
            // Show the alert
            function showAlert(message) {
                alertBox.textContent = message;
                alertBox.classList.remove('hide');
                setTimeout(hideAlert, 3000); // Hide after 3 seconds (adjust as needed)
            }
        
            // Hide the alert
            function hideAlert() {
                alertBox.classList.add('hide');
            }
        
            // Add event listener to the form submit event
            form.addEventListener('submit', function(event) {
                // Check if the form is valid
                if (!form.checkValidity()) {
                    event.preventDefault(); // Prevent form submission if not valid
                    form.reportValidity(); // Show validation messages
                } else {
                    event.preventDefault(); // Prevent form submission to show alert
                    showAlert('We will notify you on the latest updates.');
                    // After showing the alert, submit the form after a delay (adjust as needed)
                    setTimeout(function() {
                        form.submit();
                    }, 3000); // Submit after 3 seconds (adjust as needed)
                }
            });
        });
        
        </script>