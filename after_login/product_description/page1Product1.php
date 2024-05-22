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
                <a href="#" class="profile-links">Orders</a>
                <a href="./cart.php" class="profile-links">Cart</a>
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
  <button >
  <p class="back_button" onclick="back_button()" style="font-size: xx-large;transform:rotate(180deg);" >➜</p>
  </button>

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
                // product imaghe
                echo '<div class="products_details_2"><img class="product_image" src="' . $product['Image'] . '" alt="'.$product['Name'].'">';

                // product heading
                echo '<h2 class="product_heading">' . $product['Name'] . '</h2>';
                
                // product size chart
                echo '<span class="available_sizes">Available sizes :</span> ';
                echo '<img class="product_size_chart" src="' . $product['size_chart'] . '" alt="'.$product['Name'].'">';
                
                // product quantity
                echo '<span class="quantity_heading">Quantity :</span> ';
                echo '<div class="quantity_body"><div class="quantity "><button class="minus" aria-label="Decrease">&minus;</button><input type="number" class="input-box" id="quantity_value" name="quantity_value" value="1" min="1" max="10" maxlength="2"><button class="plus" aria-label="Increase">&plus;</button></div></div>';

                // product add to cart
                echo '<button class="add_cart" id="addToCartButton" type="submit" onclick="cart_adding()"><p class="add_cart_text">Add to cart</p><button></div>';
                
                // product description
                echo '<hr class="line_price2"  style="padding-left: 75px;" />';
                echo '<span class="full_product_description"> <h2 class="product_description_heading">Description</h2>';
                echo '<div class="product_description">' . $product['Description'] . '</div>';
                echo '<div class="product_description_footer1">Manufactured by : ';
                echo '<span class="product_description_footer2"> Fashion Clothing Pvt Ltd , Dheera</span></div></span>';
                echo '<hr class="line_price3"  style="padding-left: 75px;" />';
                
                // product price
                echo '<h1 class="product_price1">₹</h1><h2 class="product_price">' . $product['Price'] . '.00 
                </h2><h3 class="product_price3">' . $product['Old_Price'] . '</h3><h1 class="product_price2" >' . $product['Save'] . '</h1><h5 class="product_price4">(incl. of all taxes)</h5>';
                echo '<hr class="line_price"  style="padding-left: 75px;" />';
                echo "</span>";
            } else {
                echo 'Product not found.';
            }
        } else {
            echo 'Product ID not specified.';
        }
        
        $con->close();
        ?>

        <!-- measurement -->
        <div class="measure">
          <img  class="measure_img" src="../../assets/measurement.png" alt="">
        </div>

        <!-- trust -->
        <section class="trust1">
          <div class="mail1">
            <img class="image-6-icon1" alt="" src="../../assets/image-6@2x.png" />

            <b class="fashioncornertelegmailcom1">fashioncorner@telegmail.com</b>
          </div>
          <div class="return2">
            <b class="fashioncornertelegmailcom1">Return with 7 days</b>
            <img class="image-5-icon1" alt="" src="../../assets/image-5@2x.png" />
          </div>
          <div class="truck1">
            <b class="free-fast1">Free & Fast Delivery</b>
            <img class="image-4-icon1" alt="" src="../../assets/image-4@2x.png" />
          </div>
        </section>
      </div>
    </section>
  </body>
        
</html>

<!-- back button -->
<script>
  function back_button() {
    const productid=<?php include '../../php/db_connection.php' ; if (isset($_GET['ID'])) { $productId = intval($_GET['ID']);} echo $productId ?> ;
    if (productid >= 21311 && productid <=21319) {
      location.href='../main.php'
    }
    else{
      location.href='../main2.php'
    }
    
  }
</script>

<!-- quantity -->
<script>
    (function () {
        const quantityContainer = document.querySelector(".quantity");
        const minusBtn = quantityContainer.querySelector(".minus");
        const plusBtn = quantityContainer.querySelector(".plus");
        const inputBox = quantityContainer.querySelector(".input-box");
      
        updateButtonStates();
      
        quantityContainer.addEventListener("click", handleButtonClick);
        inputBox.addEventListener("input", handleQuantityChange);
      
        function updateButtonStates() {
          const value = parseInt(inputBox.value);
          minusBtn.disabled = value <= 1;
          plusBtn.disabled = value >= parseInt(inputBox.max);
        }
      
        function handleButtonClick(event) {
          if (event.target.classList.contains("minus")) {
            decreaseValue();
          } else if (event.target.classList.contains("plus")) {
            increaseValue();
          }
        }
      
        function decreaseValue() {
          let value = parseInt(inputBox.value);
          value = isNaN(value) ? 1 : Math.max(value - 1, 1);
          inputBox.value = value;
          updateButtonStates();
          handleQuantityChange();
        }
      
        function increaseValue() {
          let value = parseInt(inputBox.value);
          value = isNaN(value) ? 1 : Math.min(value + 1, parseInt(inputBox.max));
          inputBox.value = value;
          updateButtonStates();
          handleQuantityChange();
        }
      
        function handleQuantityChange() {
          let value = parseInt(inputBox.value);
          value = isNaN(value) ? 1 : value;
      
          // Execute your code here based on the updated quantity value
          console.log("Quantity changed:", value);
        }
      })();
      
</script>

<!-- cart -->
<script>

        // sold out product IDs
        const restrictedProductIds = [21313, 21315, 21318, 21319, 21322, 21328];

        // get product id from php
        let productId = <?php include '../../php/db_connection.php' ; if (isset($_GET['ID'])) {$productId = intval($_GET['ID']); $sql = "SELECT * FROM product_details WHERE ID = $productId"; $result = $con->query($sql); echo "$product[ID]"; ;} ?>;

        // disable add to cart button 
        let addToCartButton = document.getElementById("addToCartButton");
        if (restrictedProductIds.includes(productId)) {
            addToCartButton.disabled = true;
            addToCartButton.style.cursor = "not-allowed";
            addToCartButton.title = "This product is temporarily out of stock.";
        }


        document.getElementById("addToCartButton").addEventListener("click", function() {
          if (addToCartButton.disabled) {
                alert("This product is temporarily out of stock.");
                return;
          }

            let quantity = document.getElementById("quantity_value").value;
            let product = { name: "<?php
                                    include '../../php/db_connection.php' ;

                                    if (isset($_GET['ID'])) {
                                    $productId = intval($_GET['ID']);
    
                                    $sql = "SELECT * FROM product_details WHERE ID = $productId";
                                    $result = $con->query($sql);
                                    echo "$product[Name]";
                                    }?>",
                                    
                            image: "<?php
                                    include '../../php/db_connection.php' ;

                                    if (isset($_GET['ID'])) {
                                    $productId = intval($_GET['ID']);
                                    
                                    $sql = "SELECT * FROM product_details WHERE ID = $productId";
                                    $result = $con->query($sql);
                                    echo "$product[Image]";
                                    }?>",

                            price: "<?php
                                    include '../../php/db_connection.php' ;

                                    if (isset($_GET['ID'])) {
                                    $productId = intval($_GET['ID']);
                                    
                                    $sql = "SELECT * FROM product_details WHERE ID = $productId";
                                    $result = $con->query($sql);
                                    echo "$product[Actual_Price]";
                                    }?>",
                            id: "<?php
                                    include '../../php/db_connection.php' ;

                                    if (isset($_GET['ID'])) {
                                    $productId = intval($_GET['ID']);
                                    
                                    $sql = "SELECT * FROM product_details WHERE ID = $productId";
                                    $result = $con->query($sql);
                                    echo "$product[ID]";
                                    }?>",
                            quantity: quantity
                          };

            // check for cart in localstorage
            let cart = localStorage.getItem("cart");
            if (cart) {
                cart = JSON.parse(cart);
            } else {
                cart = [];
            }

            // add product to cart
            cart.push(product);

            // save cart to localStorage
            localStorage.setItem("cart", JSON.stringify(cart));

          
        });
</script>

