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
    <link rel="stylesheet" href="../../css/product_description/page1Product1.css" />
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
    <div id="loading-overlay">
      <div id="loading-spinner"></div>
    </div>

    <div class="index-page">
      
   
      
      <!-- nav bar -->
      <section class="nav-bar" id="nav-bar">
          <a href="../main.php">
            <img class="fashion-corner-1-1" alt="logo" style="cursor: pointer;" src="../../assets/fashion-corner-1-1@2x.png" onclick="window.location.href='../main.php'"/>
          </a>

          <button class="hover-functioning4">
            <img src="../../assets/cart_logo.png" class="cart_logo" alt="cart" >
          </button>

          <!-- profile button -->
          <div class="dropdown">
            <button  class="hover-functioning4" onclick="toggleDropdown()">
                <img src="../../assets/user_profile_icon.png" class="profile_logo" alt="profile" >
            </button>
            <div id="dropdownMenu" class="dropdown-content">
                <span id="welcomeMessage">Welcome,<?php echo " $userName !"?></span>
                <a href="#" class="profile-links">Orders</a>
                <a href="#" class="profile-links">Cart</a>
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
                      
                      <li id="back-arrow"><a href="./page1Product1.php?ID=
                          <?php 
                            include '../../php/db_connection.php' ;
                            if (isset($_GET['ID'])) {
                            $productId = intval($_GET['ID']);}
                             echo $productId ?>"
                      
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


      <!-- description section -->

            <?php
            include '../../php/db_connection.php' ;

            if (isset($_GET['ID'])) {
                $productId = intval($_GET['ID']);
        
                $sql = "SELECT * FROM product_details WHERE ID = $productId";
                $result = $con->query($sql);
        
                // Display product details
                if ($result->num_rows > 0) {
                    $product = $result->fetch_assoc();
                    echo "<span class='products_details'>";
                    echo '<img class="product_image" src="' . $product['Image'] . '" alt="'.$product['Name'].'">';
                    echo '<img class="product_size_chart" src="' . $product['size_chart'] . '" alt="'.$product['Name'].'">';
                    echo '<h2 class="product_heading">' . $product['Name'] . '</h2>';
                    echo '<h2 class="product_description_heading">Description</h2>';
                    echo '<div class="product_description">' . $product['Description'] . '</div>';
                    echo '<div class="product_description_footer1">Manufactured by :';
                    echo '<span class="product_description_footer2">Fashion Clothing Pvt Ltd , Dheera</span></div>';
                    echo '<h1 class="product_price1">₹</h1><h2 class="product_price">' . $product['Price'] . '.00 
                    </h2><h3 class="product_price3">' . $product['Old_Price'] . '</h3><h1 class="product_price2">' . $product['Save'] . '</h1><h5 class="product_price4">(incl. of all taxes)</h5>';
                    echo "</span>";
                } else {
                    echo 'Product not found.';
                }
            } else {
                echo 'Product ID not specified.';
            }
        
            // Close the database connection
            $con->close();
            ?>




      <!-- footer -->
      <footer class="footer">
        <div class="social-media-parent social-media-icon">
          <div class="social-media">
            
              <img class="twitter-icon" alt="twitter-logo" src="../../assets/ellipse-4@2x.png" onclick="login_twitter()"/>
              <img class="insta-icon" alt="" src="../../assets/ellipse-3@2x.png"  onclick="login_instagram()"/>
              <img class="facebook-icon" alt="" src="../../assets/ellipse-2@2x.png" onclick="login_facebook()"/>
              <img class="email-icon" alt="" src="../../assets/ellipse-1@2x.png"  onclick="login_mail()"/>

          </div>
        </div>

        <div class="footer-links">
          <div class="links">
            <div class="cookie-policy">
              <a id="cookie-policies" href="../../privacy_policy.html"> Cookie Policy </a>
            </div>
            <div class="terms-of-service">
              <a id="terms-conditions" href="../../privacy_policy.html"> Terms of Service </a>
            </div>
            <div class="privacy-policy">
              <a id="privacy-policies" href="../../privacy_policy.html"> Privacy Policy </a>
            </div>
          </div>
          <div class="tailor-shop-all">
            © 2024 Fashion Corner. All rights reserved.
          </div>
        </div>
        <img class="footer-child" alt="" src="../../assets/line-2@2x.png" />
        
        <img class="subscribe-child" alt="" src="../../assets/line-3@2x.png" style="padding-left: 75px;" />
      </footer>  
    </div>
    
  </body>
</html>
