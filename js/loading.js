// loading circle and jump to login page
function login() {
    // Show loading 
    document.getElementById('loading-overlay').style.visibility = 'visible';

    setTimeout(() => {
        window.open('./login.html', '_blank'); 
    }, 2000); 
}


// loading circle and jump to mail
function login_mail() {
    // Show loading 
    document.getElementById('loading-overlay').style.visibility = 'visible';
    
    setTimeout(() => {
        window.open('https://mail.google.com/mail/?view=cm&fs=1&to=fashioncorner@telegmail.com&su=Subject&body=Body%20text', '_blank'); 
    }, 2000); 
}

// loading circle and jump to facebook
function login_facebook() {
    // Show loading 
    document.getElementById('loading-overlay').style.visibility = 'visible';
    
    setTimeout(() => {
        window.open('https://www.facebook.com', '_blank'); 
    }, 2000); 
}

// loading circle and jump to instagram
function login_instagram() {
    // Show loading 
    document.getElementById('loading-overlay').style.visibility = 'visible';
    
    setTimeout(() => {
        window.open('https://www.instagram.com/akshay212046/', '_blank'); 
    }, 2000); 
}

// loading circle and jump to twitter
function login_twitter() {
    // Show loading 
    document.getElementById('loading-overlay').style.visibility = 'visible';
    
    setTimeout(() => {
        window.open('https://twitter.com/akshay__0', '_blank'); 
    }, 2000); 
}
// loading circle and jump to linkedin
function login_linkedin() {
    // Show loading 
    document.getElementById('loading-overlay').style.visibility = 'visible';
    
    setTimeout(() => {
        window.open('https://www.linkedin.com/in/akshay-katoch-36a86b23a', '_blank'); 
    }, 2000); 
}


// loading.js

function showLoading() {
    document.getElementById('loading-overlay').style.display = 'flex';
}

// add cart
function cart_adding() {
    // Show loading 
    document.getElementById('loading-overlay').style.visibility = 'visible';

    setTimeout(() => {
        // location.href=('./cart.php'); 
        location.reload();
        alert("Item added in cart") 
    }, 1000);
}

function proceed_tobuy_item() {
    document.getElementById('loading-overlay').style.visibility = 'visible';
    setTimeout(() => {
        location.href = `./choose_payment_method.php`;
        }, 1000);
    }


