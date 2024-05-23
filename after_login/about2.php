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

  <link rel="stylesheet" href="../css/about-global.css" />
  <link rel="stylesheet" href="../css/about2.css" />
  <!-- <link rel="stylesheet" href="../css/about.css" /> -->
  <!-- <link rel="stylesheet" href="../css/main.css" /> -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Mplus 1p:wght@400;500&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM Serif Display:wght@400&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lobster:wght@400&display=swap" />

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

<body>
  <div class="about-us-page">

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
                    
                    <li id="back-arrow"><a href="./about2.php" style="font-size: xx-large;" >➜</a></li>
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

    <!-- about section -->

    <section class="about-us6">
      <section class="team">
        <div class="team-info">
          
          <!-- dev & design -->
          <div class="developerdesigner">
            <img class="developer-icon" alt="" src="../assets/developer@2x.png" />
            <p class="harshit-joshi">Harshit Joshi </p>
            <b class="developer-designer">Developer & Designer</b><br>
            <img class="twitter-icons" alt="" src="../assets/twitter@2x.png"  onclick="login_twitter()" style="cursor: pointer;left: 105px;"/>
            <img class="linkedin-icon" alt="" src="../assets/linkedin@2x.png" onclick="login_linkedin()" style="cursor: pointer;left: 175px;"/>
            
          </div>

          <!-- co-founder -->
          <div class="co-founder">
            <b class="co-founder1">CO-Founder</b>
            <img class="developer-icon" alt="" src="../assets/cofounder@2x.png" />
            <p class="farah-hawa">Farah Hawa</p>
            <img class="twitter-icons" alt="" src="../assets/twitter@2x.png"  onclick="login_twitter()" style="cursor: pointer;left: 105px;"/>
            <img class="linkedin-icon" alt="" src="../assets/linkedin@2x.png" onclick="login_linkedin()" style="cursor: pointer;left: 175px;"/>
          </div>

          <!-- founder -->
          <div class="founder">
            <b class="founder1">Founder</b>
            <img class="developer-icon" alt="" src="../assets/founder@2x.png" />
            <p class="ansh-bhawnani">Ansh Bhawnani</p>
            <img class="twitter-icons" alt="" src="../assets/twitter@2x.png"  onclick="login_twitter()" style="cursor: pointer;left: 102px;"/>
            <img class="linkedin-icon" alt="" src="../assets/linkedin@2x.png" onclick="login_linkedin()" style="cursor: pointer;left: 175px;"/>
          </div>
        </div>
        <b class="team-praise">Meet our visionary team.</b>
        <h2 class="the-team">The Team</h2>
      </section>
      <!-- line -->
      <img class="about-us-child" alt="" src="../assets/line-4@2x.png" />
      

      <b class="para-3">
        <p class="but-our-commitment">
          At Fashion Corner, we understand that every individual is unique, and so are their fashion preferences.
          That's why we offer a wide range of customization options, allowing you to create clothing that truly reflects
          your personality. From choosing your favorite colors and fabrics to adding personalized embroidery or prints,
          the possibilities are endless. With our easy-to-use customization tools, you can unleash your creativity and
          design clothing that is one-of-a-kind.
          <br><br>
          But our commitment goes beyond just providing great clothing. We're dedicated to delivering an exceptional
          shopping experience from start to finish. Our user-friendly website makes it easy to browse, customize, and
          order your favorite clothing items with just a few clicks. And with our fast and reliable shipping, you can
          enjoy your new wardrobe additions in no time.
          <br><br>
          Thank you for choosing Fashion Corner as your go-to destination for all your clothing needs. Whether you're
          looking for the latest fashion trends or want to create your own unique style, we're here to help you look and
          feel your best every day. <br><br><br><br>Join our community of fashion enthusiasts and experience the difference with Fashion
          Corner.
        </p>
        <p class="but-our-commitment">&nbsp;</p>

      </b>
      <div class="para-2">
        <img class="image-icon" alt="" src="../assets/image@2x.png" />

        <b class="para-2a">
          <p>
            Our journey began with a passion for fashion and a vision to revolutionize the way people shop for clothing
            online. Founded by a team of fashion enthusiasts, Fashion Corner aims to break the boundaries of traditional
            fashion by offering a platform where you can not only discover the latest trends but also personalize and
            customize your clothing to suit your individual taste. Driven by a relentless pursuit of innovation, we
            continuously strive to redefine the fashion landscape, offering an unparalleled shopping experience that
            empowers you to express your unique style. At Fashion Corner, we believe that fashion should be inclusive
            and accessible to all. That's why we're dedicated to offering a diverse range of sizes, styles, and
            customization options to cater to every individual, regardless of their shape, size, or personal
            preferences. Our team is not just passionate about fashion; we're also committed to sustainability and
            ethical practices. <br> <br> With a finger on the pulse of the latest trends and an eye for timeless
            elegance, our team of designers works tirelessly
            to curate collections that inspire and delight. From classic essentials to cutting-edge statement pieces, we
            have something for every wardrobe and every occasion. Beyond just selling clothing, we strive to foster a
            community of like-minded fashion enthusiasts who share our passion for style and self-expression. Join us on
            our journey as we continue to push the boundaries of what's possible in the world of fashion.
          </p>

        </b>
      </div>
      <h2 class="para-1">
        <p class="but-our-commitment">
          Welcome to Fashion Corner , your ultimate destination for
          high-quality, customizable clothing that reflects your unique style
          and personality. At Fashion Corner, we believe that fashion is not
          just about what you wear, but how you express yourself through
          clothing. That's why we're dedicated to providing you with a diverse
          range of clothing options that allow you to stand out from the crowd
          and make a statement.
        </p>


      </h2>
      <h2 class="heading4">
        <p class="about-us7">About Us</p>
      </h2>
      
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