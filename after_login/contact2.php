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
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="../css/index-global.css" />
    <link rel="stylesheet" href="../css/contact2.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mplus 1p:wght@400;500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM Serif Display:wght@400&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster:wght@400&display=swap"/>

    <!-- including jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/home-slider.js"></script>
    <script src="../js/clothes_click.js"></script>
    <script src="../js/loading.js"></script>
    <script src="../js/track_order.js"></script>
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
  <body>
    <div class="index-page">

      <!-- loading circle -->
      <div id="loading-overlay">
        <div id="loading-spinner"></div>
      </div>
      
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
                <a href="#" class="profile-links">Return</a>
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
                    
                    <li id="back-arrow"><a href="./contact2.php" style="font-size: xx-large;" >➜</a></li>
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
      
     <!-- main -->
     <main class="contacts-us">
        <section>
        <section class="description">
          <div class="when-you-contact-container">
            <p class="when-you-contact-customer-serv"><br>
              When you contact Customer Service your personal data will be
              processed in accordance with our 
              <a class="privacy-notice" href="../privacy_policy.html" target="_blank" >
                <span class="privacy-notice1">Privacy Notice</span> </a>.
            </p>
            <p class="when-you-contact-customer-serv"> </p>
            <p class="when-you-contact-customer-serv">
              All product returns come at an environmental cost and each
              returned package leaves a significant trail of emissions. Fashion
              Corner encourages you to be a contributor towards climate positive
              fashion. Kindly refer to our product details and size guide to
              avoid inconvenience of returns.
            </p>
          </div>
          <div class="contact-info">
            <p class="when-you-contact-customer-serv">
              <span
                >You can chat with our Virtual assistant 24/7 for answers to
                frequently asked questions. You’ll be put through to a live
                agent if you need more help, during below opening hours.</span
              >
              <b class="call-us">&nbsp;</b>
            </p>
            <br>
                <div class="border-for-details">
                    <p class="when-you-contact-customer-serv" >
                    <b class="call-us">Call us</b>
                    <div> 1234-567-8910 <div style="font-size:20px;"> Free of charge</div></div>
                    </p>
                    <p class="when-you-contact-customer-serv">&nbsp;</p>
                    <p class="opening-hours">
                    <b>Opening Hours</b>
                    </p>
                    <p class="when-you-contact-customer-serv">
                    <b>&nbsp;</b>
                    </p>
                    <p class="when-you-contact-customer-serv">
                    <b>Phone</b>
                    <div>Monday – Sunday: 8.00 – 22.00</div>
                    </p>
                    <p class="when-you-contact-customer-serv">
                    <b class="call-us">Chat</b>
                    <div>Monday – Sunday: 8.00 – 22.00</div>
                    <b>  </b>
                    </p>
                    <p class="opening-hours">
                    <b>Email</b>
                    </p><br>
                    <p class="when-you-contact-customer-serv">fashioncorner@telegmail.com</p>
                </div>
          </div>
        </section>
        
        <!-- return order section -->
        <div class="return-order">
          <div class="return-order-child"></div>
          <button class="return-order-button" onclick="login()">
            <div class="return-order-item"></div>
            <b class="return2">Return</b>
          </button>
          <div class="register-returns-easily-container">
            <p class="when-you-contact-customer-serv">
              Register returns easily online. All you need is the order number
              found in the order confirmation email, and the email address used
              when placing your order.
            </p>
            <p class="when-you-contact-customer-serv">&nbsp;</p>
            <p class="when-you-contact-customer-serv">
              The return request must be raised with us within 15 days from the
              date you receive your parcel.
            </p>
          </div>
          <b class="i-want-to">I WANT TO RETURN SOMETHING</b>
          <img class="return-icon" alt="" src="../assets/return@2x.png" />
        </div>

        <!-- track order section -->
        <div class="track-order" >
          <div class="return-order-child"></div>
          <button class="track-order-button" onclick="openRandomLink()">
            <div class="track-order-item"></div>
            <b class="track-order1">Track Order</b>
          </button>
          
          <div class="track-order-inner"></div>

          <div class="">
            <input class="subscribe-us-child eg-312657432980" type="text" placeholder="e.g. 31rc5a8k0" id="track-order-input"  maxlength="9" required/>
          </div>

          <div class="order-no-container">
            <span>Order Id. </span>
            <span class="span">*</span>
          </div>
          <div class="enter-the-order">
            Enter the order number found in the order confirmation email
          </div>
          <b class="i-want-to1">I WANT TO KNOW WHERE MY ORDER IS</b>
          <img class="location-icon" alt="" src="../assets/location@2x.png" />
        </div>
        
        <section class="headings1">
          <h1 class="second-heading1">
            <p class="when-you-contact-customer-serv">
              How can we help you today?
            </p>
          </h1>
          <h1 class="heading4">WE’D LOVE TO HEAR FROM YOU</h1>
        </section>
      </main>

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
    