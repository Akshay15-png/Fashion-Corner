document.addEventListener('DOMContentLoaded', function() {
    var alertBox = document.getElementById('alertBox');
    var trackOrderButton = document.getElementById('trackOrderButton');

    // Show the alert
    function showAlert(message) {
        alertBox.textContent = message;
        alertBox.classList.remove('hide');
        setTimeout(hideAlert, 3000); // Hide after 3 seconds (adjust as needed)
    }

    // Hide the alert
    function hideAlert() {
        alertBox.classList.add('hide');
    }

    // Function to open a random link
    function openRandomLink() {
        const orderElement = document.getElementById('track-order-input');
        const orderValue = orderElement.value.trim();

        if (orderValue === '' || orderValue.length !== 9) {
            showAlert('Incorrect Order Id');
            return false; 
        }

        const links = [
            "https://www.google.co.in/maps/place/Barnoh,+Himachal+Pradesh+174303/@31.5061548,76.2657926,14z/data=!3m1!4b1!4m6!3m5!1s0x391ad0bb905f1211:0x366ae94389ad87f9!8m2!3d31.5061569!4d76.2863922!16s%2Fg%2F12hkm36km?entry=ttu",
            "https://www.google.co.in/maps/place/Taunsa,+Punjab/@30.9948533,76.4081729,10.25z/data=!4m6!3m5!1s0x391aacacf1274a53:0x6226d90dcff78574!8m2!3d31.0102386!4d76.4592007!16s%2Fg%2F12hnfy2_4?entry=ttu",
            "https://www.google.co.in/maps/place/Jaipur,+Rajasthan/@28.3717156,73.7767146,5.21z/data=!4m6!3m5!1s0x396c4adf4c57e281:0xce1c63a0cf22e09!8m2!3d26.9124336!4d75.7872709!16zL20vMDE2NzIy?entry=ttu",
            "https://www.google.co.in/maps/place/Chaukhutiya,+Uttarakhand+263656/@30.0525535,79.1761192,9.21z/data=!4m6!3m5!1s0x3909fd166aab0793:0xc269ecfc633788e1!8m2!3d29.883896!4d79.3488816!16s%2Fm%2F05zlgbf?entry=ttu",
            "https://www.google.co.in/maps/place/Nainital,+Uttarakhand/@29.3824486,79.4346711,14z/data=!3m1!4b1!4m6!3m5!1s0x39a0a1bc28fd9d61:0x7cae7ba916987db3!8m2!3d29.3924139!4d79.4533773!16zL20vMDE4Y2s5?entry=ttu",
            "https://www.google.co.in/maps/place/Ahmednagar,+Maharashtra/@19.1103224,74.7426734,12z/data=!3m1!4b1!4m15!1m8!3m7!1s0x3bcfc41e9c9cd6f9:0x1b2f22924be04fb6!2sMaharashtra!3b1!8m2!3d19.7514798!4d75.7138884!16zL20vMDU1dnI!3m5!1s0x3bdcb05d46788921:0x6677e92c1a5181b6!8m2!3d19.0948287!4d74.7479789!16zL20vMDFwNjNx?entry=ttu",
            "https://www.google.co.in/maps/place/Satara,+Maharashtra/@18.7486067,72.8418262,7.5z/data=!4m6!3m5!1s0x3bc239be08d96bbd:0x5f4adf559fb4b19a!8m2!3d17.6804639!4d74.018261!16zL20vMDNoNXIz?entry=ttu",
            "https://www.google.co.in/maps/place/Kolhapur,+Maharashtra/@16.7984292,73.9559181,8.5z/data=!4m6!3m5!1s0x3bc1000cdec07a29:0xece8ea642952e42f!8m2!3d16.7049873!4d74.2432527!16zL20vMDF4cG4y?entry=ttu",
            "https://www.google.co.in/maps/place/Old+Dandeli,+Dandeli,+Karnataka+581325/@15.4283456,74.4707157,8.75z/data=!4m15!1m8!3m7!1s0x3bc1000cdec07a29:0xece8ea642952e42f!2sKolhapur,+Maharashtra!3b1!8m2!3d16.7049873!4d74.2432527!16zL20vMDF4cG4y!3m5!1s0x3bbf2013bd84cb99:0x44a7efeb332459ef!8m2!3d15.2361191!4d74.6172819!16zL20vMDl2azF3?entry=ttu",
            "https://www.google.co.in/maps/place/Channarayapatna,+Karnataka/@13.0627296,76.1454608,8.75z/data=!4m6!3m5!1s0x3ba5594accfa07f5:0xbe7e9f358e9188bc!8m2!3d12.9035322!4d76.3897978!16zL20vMGdnbWhj?entry=ttu",
            "https://www.google.co.in/maps/place/Bihar/@25.9039195,85.8070058,7z/data=!3m1!4b1!4m6!3m5!1s0x39ed5844f0bb6903:0x57ad3fed1bbae325!8m2!3d25.9644427!4d85.2722472!16zL20vMDI5MHJi?entry=ttu",
            "https://www.google.co.in/maps/place/Sikkim/@27.5982011,88.4665955,9z/data=!3m1!4b1!4m6!3m5!1s0x39e6a56a5805eafb:0xa4c4b857c39b5a04!8m2!3d27.3516407!4d88.3239309!16zL20vMDExaHEx?entry=ttu"
        ];

        const randomIndex = Math.floor(Math.random() * links.length);
        const randomLink = links[randomIndex];

        showAlert('Your order is being tracked.');
        setTimeout(function() {
            window.open(randomLink, '_blank');
        }, 3000); // Proceed after 3 seconds (adjust as needed)
    }

    // Add event listener to the track order button
    trackOrderButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default action
        openRandomLink();
    });
});
