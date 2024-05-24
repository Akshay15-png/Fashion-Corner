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

