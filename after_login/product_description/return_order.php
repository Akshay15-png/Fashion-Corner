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
<html>
  <head>
    <meta charset="utf-8" />
    <!-- <meta name="viewport" content="initial-scale=1, width=device-width" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


    <link rel="stylesheet" href="../../css/index-global.css" />
    <link rel="stylesheet" href="../../css/product_description/return_order.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mplus 1p:wght@400;500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM Serif Display:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster:wght@400&display=swap"/>

    <!-- including jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../js/home-slider.js"></script>
    <script src="../../js/clothes_click.js"></script>
    <script src="../../js/loading.js"></script>
    <script src="../../js/profile.js"></script>

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

    <style>
      @font-face {
        font-family: "Mplus 1p Bold";
        src: url("../../assets/mplus-1p-bold.ttf");
        font-weight: 700;
      }
    </style>


  </head>
  <body>

<!-- loading circle -->
<section class="full_body">
<div id="loading-overlay">
  <div id="loading-spinner"></div>
</div>

<div class="index-page">

  <!-- nav bar -->
  <section class="nav-bar">
          <button class="hover-functioning1" onclick="location.href='../main.php'">
            <img class="fashion-corner-1-1" alt="logo" src="../../assets/fashion-corner-1-1@2x.png"/>
          </button>

          <button class="hover-functioning2" onclick="location.href='./cart.php'">
            <img src="../../assets/cart_logo.png" class="cart_logo" alt="cart" >
          </button>

          <!-- profile button -->
          <div class="dropdown">
            <button  class="hover-functioning3" onclick="toggleDropdown()">
                <img src="../../assets/user_profile_icon.png" class="profile_logo" alt="profile" >
            </button>
            <div id="dropdownMenu" class="dropdown-content">
                <span id="welcomeMessage">Welcome,<?php echo " $userName !"?></span>
                <a href="./orders_list.php" class="profile-links">Orders History</a>
                <a href="./cart.php" class="profile-links">Cart</a>
                <a href="./return_order.php" class="profile-links">Return</a>
                <a class="profile-links" onclick="logout()" >Logout</a>
            </div>
          </div>

      <!-- menu button -->
      <button class="hover-functioning4">
          <div class="navbar">
            <div class="container nav-container">
                <input class="checkbox" type="checkbox" name="" id="menu-toggle" />
                <div class="hamburger-lines">
                  <span class="line line1"></span>
                  <span class="line line2"></span>
                  <span class="line line3"></span>
                </div>  

                <div class="menu-items" >
                  
                  <li id="back-arrow"><a href="./return_order.php"
                  
                  style="font-size: xx-large;" >➜</a></li>
                  <li><a href="../main.php" style="font-size: xx-large;"  >Home</a></li>
                  <li><a href="../about2.php" style="font-size: xx-large;" >About</a></li>
                  <li><a href="../contact2.php" style="font-size: xx-large;" >Contact</a></li>
                  <li><a href="../../booking2.html" style="font-size: xx-large;" >Booking</a></li>
                  <li><a href="../../privacy_policy.html" style="font-size: xx-large;" >Policy</a></li>
                </div>

                <div class="menu-items">
                      <img class="menu-social-button1" alt="twitter" src="../../assets/ellipse-4@2x.png" onclick="login_twitter()"/>
                      <img class="menu-social-button2" alt="instagram" src="../../assets/ellipse-3@2x.png"  onclick="login_instagram()"/>
                      <img class="menu-social-button3" alt="facebook" src="../../assets/ellipse-2@2x.png" onclick="login_facebook()"/>
                </div>
              </div>
            </div>
          </div>   
      </button>
  </section>
  <p class="back_button" onclick="back_button()" style="font-size: xx-large;transform:rotate(180deg);" >➜</p>

    <div class="container_return">
        <div class="form-container">
            <h2>Return Order</h2>
            <p>Enter you Order ID to return your order( <i style="font-weight:600;font-size:medium">found in the outside of package box or in<a href="orders_list.php" style="text-decoration:none;color:blue;"> order history</a> section</i>)</p>
            <form action="../../php/return.php" method="POST">
                <label for="orderID">Order ID: <span style="color:red;">*</span></label><br>
                <input type="text" id="orderID" name="orderID" placeholder="Enter your order ID" required>
                <button type="submit" class="button_return" id="return_order_button">Return</button>
            </form>
            <div id="alertBox" class="alert hide">This is an alert message.</div> 
        </div>
    </div>


  </body>
</html>
<!-- back button -->
<script>
  function back_button() {
    location.href='../main.php';
 
  }
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

