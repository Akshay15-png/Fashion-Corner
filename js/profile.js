// Function to toggle dropdown visibility
function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdownMenu");
    var currentDisplayStyle = dropdownMenu.style.display;

    // Check if the dropdown is currently visible
    if (currentDisplayStyle === "block" || currentDisplayStyle === "") {
        // Hide the dropdown if it's visible
        dropdownMenu.style.display = "none";
    } else {
        // Show the dropdown if it's hidden
        dropdownMenu.style.display = "block";
    }
}

function logout() {
    document.getElementById('loading-overlay').style.visibility = 'visible';
    setTimeout(() => {
        window.location.href = "../php/logout.php";
    }, 2000);
}

