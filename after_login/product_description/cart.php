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
    <link rel="stylesheet" href="../../css/product_description/cart.css" />
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
                  
                  <li id="back-arrow"><a href="./cart.php"
                  
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

  <!-- cart section -->
<section>
  <p class="back_button" onclick="back_button()" style="font-size: xx-large;transform:rotate(180deg);" >➜</p>
    <!-- empty whole cart -->
  <button id="clearCartButton" ><p style="font-size: 20px;position:relative;top: -15px;cursor: pointer;" class="clear_txt">clear</p></button>
  <!-- cart -->
  <h1 id="shopping_cart_heading"> Shopping Cart</h1>
  
<div class="proceed_to_buy">
    <img class="green_tick" src="../../assets/green_tick.png"></img>
    <p class="proceed_txt eligible"style="color:#067d62;">Your order is eligible for FREE Delivery.</p>
    <p class="proceed_txt choose"> Choose free delivery option at checkout.</p>

    <!-- total items and price -->
    <div id="cartSummary">
      <p class="total_item_no">Subtotal (<span id="totalItems">0</span> items) :</p>
      <p class="total_price_no">₹<span id="totalPrice">0.00</span></p>
    </div>

    <!-- gift -->
    <div class="div_pack_gift"><input type="checkbox" name="gift" id="pack_as_gift">This order contains a gift</div>
    
    <button id="buyFromCartButton" onclick="proceed_tobuy_item()">Proceed to Shop</button>
    <div id="cartItemsContainer"></div>
</div>

<!-- shows all items in cart -->
  <div id="cartItems"></div>
    
</section>
    
</body>
</html>

<script>
        // get cart from localstorage
        let cart = localStorage.getItem("cart");
        if (cart) {
            cart = JSON.parse(cart);
        } else {
            cart = [];
        }

        // display cart items
        function displayCartItems() {
            const cartItemsContainer = document.getElementById("cartItems");
            const totalItemsElement = document.getElementById("totalItems");
            const totalPriceElement = document.getElementById("totalPrice");
            const buyButton = document.getElementById('buyFromCartButton');
            cartItemsContainer.innerHTML = "";

            if (cart.length === 0) {
                buyButton.disabled = true;
                buyButton.addEventListener('mouseover', function() {
                    this.style.cursor = 'not-allowed';
                });
                buyButton.title = "Your cart is empty";
                cartItemsContainer.innerHTML="Your cart is empty";
                return;
            }
 
            cartItemsContainer.innerHTML = ""; // Clear previous content
            let totalItems = 0;
            let totalPrice = 0;
            cart.forEach(item => {
                
                totalItems += parseInt(item.quantity);
                totalPrice += parseInt(item.price) * parseInt(item.quantity);

                const cartItemElement = document.createElement("div");
                cartItemElement.classList.add("cart-item");           //class name for div

                const imageElement = document.createElement("img");
                imageElement.src = item.image;
                imageElement.alt = item.name;
                imageElement.classList.add("item-image");             //class name for image

                const detailsElement = document.createElement("div");
                const deleteButtonId = `clearItemButton_${item.id}`;
                detailsElement.classList.add("cart-item-details");      //class name for div
                detailsElement.innerHTML = `<strong>${item.name}</strong><br><br><span class="stock">In Stock</span><br><span class="incl_all_tx" >Eligible for free shipping</span><div></div><span class="cart_price"> ₹ ${item.price}.00 </span><br><span class="incl_all_tx" id="incls_tx">(incl. of all taxes)</span> <div class="quantity">Qty (${item.quantity})</div> <button id="${deleteButtonId}" class="clearItemButton" onclick="delete_item_from_cart('${deleteButtonId}')">Delete</button>`;

                cartItemElement.appendChild(imageElement);
                cartItemElement.appendChild(detailsElement);
                cartItemsContainer.appendChild(cartItemElement);
                cartItemsContainer.appendChild(cartItemElement);
            });

              // Update total items and total price in the DOM
                totalItemsElement.textContent = totalItems;
                totalPriceElement.textContent = totalPrice.toFixed(2);
        }

        // Display cart items on page load
        displayCartItems();

        // clear whole cart
        document.getElementById("clearCartButton").addEventListener("click", function() {
            localStorage.removeItem("cart");
            location.reload();
            
        });

        // delete item logic
        function delete_item_from_cart(deleteButtonId) {
                let cart = JSON.parse(localStorage.getItem("cart")) || [];
                // item 1
                if(deleteButtonId=="clearItemButton_21311"){
                  const productIdToRemove = '21311'; 
                  // const productIdToRemove = deleteButtonId.split('_')[1];
                  console.log("Cart before removal:", cart);
                  console.log("IDs before removal:", cart.map(item => item.id));
                  cart = cart.filter(item => item.id !== productIdToRemove);
                  console.log("Cart after removal:", cart);
                  localStorage.setItem("cart", JSON.stringify(cart));
                  location.reload();
                }
                
                // item 2
                else if(deleteButtonId=="clearItemButton_21312"){
                  const productIdToRemove = '21312'; 
                  // const productIdToRemove = deleteButtonId.split('_')[1];
                  console.log("Cart before removal:", cart);
                  console.log("IDs before removal:", cart.map(item => item.id));
                  cart = cart.filter(item => item.id !== productIdToRemove);
                  console.log("Cart after removal:", cart);
                  localStorage.setItem("cart", JSON.stringify(cart));
                  location.reload();
                }

                // item 4
                else if(deleteButtonId=="clearItemButton_21314"){
                  const productIdToRemove = '21314'; 
                  // const productIdToRemove = deleteButtonId.split('_')[1];
                  console.log("Cart before removal:", cart);
                  console.log("IDs before removal:", cart.map(item => item.id));
                  cart = cart.filter(item => item.id !== productIdToRemove);
                  console.log("Cart after removal:", cart);
                  localStorage.setItem("cart", JSON.stringify(cart));
                  location.reload();
                }

                // item 6
                else if(deleteButtonId=="clearItemButton_21316"){
                  const productIdToRemove = '21316'; 
                  // const productIdToRemove = deleteButtonId.split('_')[1];
                  console.log("Cart before removal:", cart);
                  console.log("IDs before removal:", cart.map(item => item.id));
                  cart = cart.filter(item => item.id !== productIdToRemove);
                  console.log("Cart after removal:", cart);
                  localStorage.setItem("cart", JSON.stringify(cart));
                  location.reload();
                }

                // item 7
                else if(deleteButtonId=="clearItemButton_21317"){
                  const productIdToRemove = '21317'; 
                  // const productIdToRemove = deleteButtonId.split('_')[1];
                  console.log("Cart before removal:", cart);
                  console.log("IDs before removal:", cart.map(item => item.id));
                  cart = cart.filter(item => item.id !== productIdToRemove);
                  console.log("Cart after removal:", cart);
                  localStorage.setItem("cart", JSON.stringify(cart));
                  location.reload();
                }

                // item 10
                else if(deleteButtonId=="clearItemButton_21320"){
                  const productIdToRemove = '21320'; 
                  // const productIdToRemove = deleteButtonId.split('_')[1];
                  console.log("Cart before removal:", cart);
                  console.log("IDs before removal:", cart.map(item => item.id));
                  cart = cart.filter(item => item.id !== productIdToRemove);
                  console.log("Cart after removal:", cart);
                  localStorage.setItem("cart", JSON.stringify(cart));
                  location.reload();
                }

                // item 11
                else if(deleteButtonId=="clearItemButton_21321"){
                  const productIdToRemove = '21321'; 
                  // const productIdToRemove = deleteButtonId.split('_')[1];
                  console.log("Cart before removal:", cart);
                  console.log("IDs before removal:", cart.map(item => item.id));
                  cart = cart.filter(item => item.id !== productIdToRemove);
                  console.log("Cart after removal:", cart);
                  localStorage.setItem("cart", JSON.stringify(cart));
                  location.reload();
                }

                // item 13
                else if(deleteButtonId=="clearItemButton_21323"){
                  const productIdToRemove = '21323'; 
                  // const productIdToRemove = deleteButtonId.split('_')[1];
                  console.log("Cart before removal:", cart);
                  console.log("IDs before removal:", cart.map(item => item.id));
                  cart = cart.filter(item => item.id !== productIdToRemove);
                  console.log("Cart after removal:", cart);
                  localStorage.setItem("cart", JSON.stringify(cart));
                  location.reload();
                }

                // item 14
                else if(deleteButtonId=="clearItemButton_21324"){
                  const productIdToRemove = '21324'; 
                  // const productIdToRemove = deleteButtonId.split('_')[1];
                  console.log("Cart before removal:", cart);
                  console.log("IDs before removal:", cart.map(item => item.id));
                  cart = cart.filter(item => item.id !== productIdToRemove);
                  console.log("Cart after removal:", cart);
                  localStorage.setItem("cart", JSON.stringify(cart));
                  location.reload();
                }

                // item 15
                else if(deleteButtonId=="clearItemButton_21325"){
                  const productIdToRemove = '21325'; 
                  // const productIdToRemove = deleteButtonId.split('_')[1];
                  console.log("Cart before removal:", cart);
                  console.log("IDs before removal:", cart.map(item => item.id));
                  cart = cart.filter(item => item.id !== productIdToRemove);
                  console.log("Cart after removal:", cart);
                  localStorage.setItem("cart", JSON.stringify(cart));
                  location.reload();
                }

                // item 16
                else if(deleteButtonId=="clearItemButton_21326"){
                  const productIdToRemove = '21326'; 
                  // const productIdToRemove = deleteButtonId.split('_')[1];
                  console.log("Cart before removal:", cart);
                  console.log("IDs before removal:", cart.map(item => item.id));
                  cart = cart.filter(item => item.id !== productIdToRemove);
                  console.log("Cart after removal:", cart);
                  localStorage.setItem("cart", JSON.stringify(cart));
                  location.reload();
                }

                // item 17
                else if(deleteButtonId=="clearItemButton_21327"){
                  const productIdToRemove = '21327'; 
                  // const productIdToRemove = deleteButtonId.split('_')[1];
                  console.log("Cart before removal:", cart);
                  console.log("IDs before removal:", cart.map(item => item.id));
                  cart = cart.filter(item => item.id !== productIdToRemove);
                  console.log("Cart after removal:", cart);
                  localStorage.setItem("cart", JSON.stringify(cart));
                }
                else{
                  
                  location.reload();
                }
          };

</script>

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