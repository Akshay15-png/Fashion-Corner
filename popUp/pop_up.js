// Get references to DOM elements
const openModalBtn = document.getElementById('openModalBtn');
const popupModal = document.getElementById('popupModal');
const closeBtn = document.querySelector('.close-btn');
const popupForm = document.getElementById('popupForm');

// Function to open the modal (popup)
function openModal() {
    popupModal.style.display = 'flex'; // Display the modal as a flex container
}

// Function to close the modal (popup)
function closeModal() {
    popupModal.style.display = 'none'; // Hide the modal
}

// Event listeners
openModalBtn.addEventListener('click', openModal); // Open modal when button is clicked
closeBtn.addEventListener('click', closeModal); // Close modal when close button is clicked

// Close modal if user clicks outside of the modal content
window.addEventListener('click', (event) => {
    if (event.target === popupModal) {
        closeModal();
    }
});

// Submit form data (you can modify this part based on your needs)
popupForm.addEventListener('submit', (event) => {
    event.preventDefault(); // Prevent default form submission behavior
    const name = document.getElementById('name').value;
    alert(`Hello, ${name}! Form submitted successfully.`);
    closeModal(); // Close the modal after form submission (you can customize this behavior)
});
