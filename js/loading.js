// loading circle and jump to login page
function login() {
    // Show loading 
    document.getElementById('loading-overlay').style.visibility = 'visible';

    // Simulate a 2-second delay before redirecting to login.html
    setTimeout(() => {
        window.open('./login.html', '_blank'); 
    }, 2000); 
}


// loading circle and jump to mail
function login_mail() {
    // Show loading 
    document.getElementById('loading-overlay').style.visibility = 'visible';

    // Simulate a 2-second delay before redirecting to login.html
    setTimeout(() => {
        window.open('mailto:fashioncorner@telegmail.com', '_blank'); 
    }, 2000); 
}

// loading circle and jump to facebook
function login_facebook() {
    // Show loading 
    document.getElementById('loading-overlay').style.visibility = 'visible';

    // Simulate a 2-second delay before redirecting to login.html
    setTimeout(() => {
        window.open('https://www.facebook.com', '_blank'); 
    }, 2000); 
}

// loading circle and jump to instagram
function login_instagram() {
    // Show loading 
    document.getElementById('loading-overlay').style.visibility = 'visible';

    // Simulate a 2-second delay before redirecting to login.html
    setTimeout(() => {
        window.open('https://www.instagram.com/akshay212046/', '_blank'); 
    }, 2000); 
}

// loading circle and jump to twitter
function login_twitter() {
    // Show loading 
    document.getElementById('loading-overlay').style.visibility = 'visible';

    // Simulate a 2-second delay before redirecting to login.html
    setTimeout(() => {
        window.open('https://twitter.com/akshaydaisuke?lang=en', '_blank'); 
    }, 2000); 
}
// loading circle and jump to linkedin
function login_linkedin() {
    // Show loading 
    document.getElementById('loading-overlay').style.visibility = 'visible';

    // Simulate a 2-second delay before redirecting to login.html
    setTimeout(() => {
        window.open('https://www.linkedin.com/in/akshay-katoch-36a86b23a', '_blank'); 
    }, 2000); 
}

// loading.js

function showLoading() {
    document.getElementById('loading-overlay').style.display = 'flex';
}
