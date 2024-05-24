<?php
// Check if user is logged in
session_start();

// Redirect to login page if user is not logged in
if (isset($_SESSION['userEmail']) and isset($_SESSION['userName'])) {
    $userName= $_SESSION['userName'];
    $userEmail= $_SESSION['userEmail'];
    // echo "welcome $userName";
    // echo "welcome $userEmail";
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


    <link rel="stylesheet" href="../css/index-global.css" />
    <link rel="stylesheet" href="../css/main2.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mplus 1p:wght@400;500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM Serif Display:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster:wght@400&display=swap"/>

    <!-- including jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/home-slider.js"></script>
    <script src="../js/clothes_click.js"></script>
    <script src="../js/loading.js"></script>
    <script src="../js/profile.js"></script>

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
        src: url("../assets/mplus-1p-bold.ttf");
        font-weight: 700;
      }
    </style>
  </head>
  <body style="overflow-x:hidden;">

    <!-- loading circle -->
    <div id="loading-overlay">
      <div id="loading-spinner"></div>
    </div>

    <div class="index-page">
      
      <!-- nav bar -->
      <section class="nav-bar">
          <button class="hover-functioning1" onclick="location.href='./main.php'">
            <img class="fashion-corner-1-1" alt="logo" src="../assets/fashion-corner-1-1@2x.png"/>
          </button>

          <button class="hover-functioning2" onclick="location.href='./product_description/cart.php'">
            <img src="../assets/cart_logo.png" class="cart_logo" alt="cart" >
          </button>

          <!-- profile button -->
          <div class="dropdown">
            <button  class="hover-functioning3" onclick="toggleDropdown()">
                <img src="../assets/user_profile_icon.png" class="profile_logo" alt="profile" >
            </button>
            <div id="dropdownMenu" class="dropdown-content">
                <span id="welcomeMessage">Welcome,<?php echo " $userName !"?></span>
                <a href="./product_description/orders_list.php" class="profile-links">Orders History</a>
                <a href="./product_description/cart.php" class="profile-links">Cart</a>
                <a href="./product_description/return_order.php" class="profile-links">Return</a>
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
                  
                  <li id="back-arrow"><a href="./main2.php" style="font-size: xx-large;" >➜</a></li>
                  <li><a href="./main.php" style="font-size: xx-large;"  >Home</a></li>
                  <li><a href="./about2.php" style="font-size: xx-large;" >About</a></li>
                  <li><a href="./contact2.php" style="font-size: xx-large;" >Contact</a></li>
                  <li><a href="../booking2.html" style="font-size: xx-large;" >Booking</a></li>
                  <li><a href="../privacy_policy.html" style="font-size: xx-large;" >Policy</a></li>
                </div>

                <div class="menu-items">
                      <img class="menu-social-button1" alt="twitter" src="../assets/ellipse-4@2x.png" onclick="login_twitter()"/>
                      <img class="menu-social-button2" alt="instagram" src="../assets/ellipse-3@2x.png"  onclick="login_instagram()"/>
                      <img class="menu-social-button3" alt="facebook" src="../assets/ellipse-2@2x.png" onclick="login_facebook()"/>
                </div>
              </div>
            </div>
          </div>   
  
      </button>
      </section>
      
      
      <!-- items -->
      <section class="clothes-pic1">

        <!-- heading -->
        <div>
          <b class="heading4">
            <p class="mens-clothes1">All Products</p>
            <p class="p6"></p>
          </b>
        </div>

        <!-- products -->
        <div class="products">
          
          <div class="product-1">
            <img class="price-for-photo1" alt="" src="../assets/women-product-1.PNG" onclick="window.location.href='./product_description/page1Product1.php?ID=21320'"/>
            <img class="photo6-icon1" id="photo-1" alt="" src="../assets/custom_resized_a7e046f0-bfea-4517-83d3-b4a73725494b.jpg" style="cursor: pointer;" onclick="window.location.href='./product_description/page1Product1.php?ID=21320'"/>
          </div>
          
          <div class="product-2">
            <img class="price-for-photo-2" alt=""src="../assets/men-2-product-1.PNG"onclick="window.location.href='./product_description/page1Product1.php?ID=21321'"/>
            <img class="photo2-icon1" id="photo-2" alt="" src="../assets/2_f00c9d0f-c345-4707-a607-3ace5ae7d625.jpg" style="cursor: pointer;" onclick="window.location.href='./product_description/page1Product1.php?ID=21321'"/>
          </div>
          
          <div class="product-3">
            <img class="price-for-photo-3" alt="" src="../assets/women-product-3.PNG"onclick="window.location.href='./product_description/page1Product1.php?ID=21322'"/>
            <img class="photo3-icon1" id="photo-3" alt="" src="../assets/DSC00618.jpg" style="cursor: pointer;" onclick="window.location.href='./product_description/page1Product1.php?ID=21322'"/>
          </div>
          
          
          <div class="product-4">
            <img class="price-for-photo-4" alt="" src="../assets/women-product-4.PNG" onclick="window.location.href='./product_description/page1Product1.php?ID=21323'"/>
            <img class="photo6-icon1" id="photo-4" alt="" src="../assets/DSC00750.jpg" style="cursor: pointer;" onclick="window.location.href='./product_description/page1Product1.php?ID=21323'"/>
          </div>
          
          <div class="product-5">
          <img class="price-for-photo-5" alt="" src="../assets/women-product-5.PNG" onclick="window.location.href='./product_description/page1Product1.php?ID=21324'"/>
          <img class="photo5-icon1" id="photo-5" alt="" src="../assets/DSC01002.jpg" style="cursor: pointer;" onclick="window.location.href='./product_description/page1Product1.php?ID=21324'"/>
          </div>
          
          <div class="product-6">
            <img class="price-for-photo-6" alt="" src="../assets/men-3-product-6.PNG" onclick="window.location.href='./product_description/page1Product1.php?ID=21325'"/>
            <img class="photo6-icon1" id="photo-6" alt="" src="../assets/1_3cbdee39-0021-443f-bbd1-64ea279bb79b.jpg" style="cursor: pointer;" onclick="window.location.href='./product_description/page1Product1.php?ID=21325'"/>
          </div>

          <div class="product-7">
            <img class="price-for-photo7" alt="" src="../assets/men-3-product-4.PNG" onclick="window.location.href='./product_description/page1Product1.php?ID=21326'"/>
            <img class="photo7-icon1" id="photo-7" alt="" src="../assets/1_a7148cc9-b352-45fe-adc9-0ac63fe15151.jpg" style="cursor: pointer;" onclick="window.location.href='./product_description/page1Product1.php?ID=21326'"/>
          </div>
          
          <div class="product-8">
            <img class="price-for-photo-8" alt=""src="../assets/women-3-product-3.PNG"onclick="window.location.href='./product_description/page1Product1.php?ID=21327'"/>
            <img class="photo8-icon1" id="photo-8" alt="" src="../assets/20230803-DSC02040.jpg" style="cursor: pointer;" onclick="window.location.href='./product_description/page1Product1.php?ID=21327'"/>
          </div>
          
          <div class="product-9">
            <img class="price-for-photo-9" alt="" src="../assets/men-3-product-3.PNG"onclick="window.location.href='./product_description/page1Product1.php?ID=21328'"/>
            <img class="photo9-icon1" id="photo-9" alt="" src="../assets/1_9577d097-4ce3-46ed-8549-364566b8b00a.jpg" style="cursor: pointer;" onclick="window.location.href='./product_description/page1Product1.php?ID=21328'"/>
          </div>
          
        </div>       
      </section>

      <!-- forward-link -->
      <section class="forward-links1">

        <a href="main.php">
          <button class="st-link1">
            <div class="forward-link-child"></div>
            <div class="div3">1</div>
          </button>
        </a>
        
        
        <a href="main2.php">
          <button class="nd-link1" >
            <div class="forward-link-child"></div>
            <div class="div4">2</div>
          </button>
        </a>

        <a href="main.php">
          <div class="forward-link arrow-link">
            <div class="forward-link-child"></div>
            <img class="forward-link-item" alt="" src="../assets/arrow-1@2x.png" />
          </div>
        </a>
      </section>
      
      <!-- footer -->
      <footer class="footer">
        <div class="social-media-parent social-media-icon">
          <div class="social-media">
            
              <img class="twitter-icon" alt="twitter-logo" src="../assets/ellipse-4@2x.png" onclick="login_twitter()"/>
              <img class="insta-icon" alt="" src="../assets/ellipse-3@2x.png"  onclick="login_instagram()"/>
              <img class="facebook-icon" alt="" src="../assets/ellipse-2@2x.png" onclick="login_facebook()"/>
              <img class="email-icon" alt="" src="../assets/ellipse-1@2x.png"  onclick="login_mail()"/>

          </div>
        </div>

        <div class="footer-links">
          <div class="links">
            <div class="cookie-policy">
              <a id="cookie-policies" href="../privacy_policy.html"> Cookie Policy </a>
            </div>
            <div class="terms-of-service">
              <a id="terms-conditions" href="../privacy_policy.html"> Terms of Service </a>
            </div>
            <div class="privacy-policy">
              <a id="privacy-policies" href="../privacy_policy.html"> Privacy Policy </a>
            </div>
          </div>
          <div class="tailor-shop-all">
            © 2024 Fashion Corner. All rights reserved.
          </div>
        </div>
        <img class="footer-child" alt="" src="../assets/line-2@2x.png" />
        
        <img class="subscribe-child" alt="" src="../assets/line-3@2x.png" style="padding-left: 75px;" />
      </footer>  
    </div>
    
  </body>
</html>
