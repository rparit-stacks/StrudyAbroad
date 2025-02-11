document.addEventListener('DOMContentLoaded', () => {
    // Mobile Menu Functionality
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const closeMenuButton = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const body = document.body;

    function toggleMenu() {
        mobileMenu.classList.toggle('active');
        body.classList.toggle('overflow-hidden');
    }

    mobileMenuButton.addEventListener('click', toggleMenu);
    closeMenuButton.addEventListener('click', toggleMenu);

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (mobileMenu.classList.contains('active') && 
            !mobileMenu.contains(e.target) && 
            !mobileMenuButton.contains(e.target)) {
            toggleMenu();
        }
    });

    // Form submission
    const leadForm = document.getElementById('lead-form');
    const formConfirmation = document.getElementById('form-confirmation');

    leadForm.addEventListener('submit', function(e) {
        e.preventDefault();
        // Display confirmation message
        formConfirmation.style.display = 'block';
        // Reset form fields
        leadForm.reset();
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768 && mobileMenu.classList.contains('active')) {
            toggleMenu();
        }
    });
});

  // Mobile interaction handling
  if (window.innerWidth <= 768) {
    const timelineItems = document.querySelectorAll('.admission-timeline-item');
    
    timelineItems.forEach(item => {
        const content = item.querySelector('.admission-content');
        const number = item.querySelector('.admission-number');
        
        number.addEventListener('click', () => {
            // Close all other contents
            timelineItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.querySelector('.admission-content').style.display = 'none';
                }
            });
            
            // Toggle current content
            if (content.style.display === 'none') {
                content.style.display = 'block';
            } else {
                content.style.display = 'none';
            }
        });
    });
}


// List of countries
const countries = [
    "United States", "United Kingdom", "Canada", "Australia", "Germany",
    "France", "Japan", "India", "China", "Brazil", "Spain", "Italy",
    "Netherlands", "Sweden", "Norway", "Denmark", "Finland", "Ireland",
    "New Zealand", "Singapore", "South Korea", "Switzerland"
];

// Populate country select
const countrySelect = document.getElementById('country');
countries.sort().forEach(country => {
    const option = document.createElement('option');
    option.value = country;
    option.textContent = country;
    countrySelect.appendChild(option);
});

// Form submission handling
document.getElementById('leadForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Collect form data
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);
    
    // Example POST request
    fetch('db.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Success:', data);
        showPopup('Form submitted successfully! We will contact you soon.');
    })
    .catch((error) => {
        console.error('Error:', error);
        showPopup('Form submission failed. Please try again.');
    });
});

// Function to show popup
function showPopup(message) {
    const popup = document.getElementById('popup');
    const popupContent = popup.querySelector('.form--popup-content p');
    popupContent.textContent = message;
    popup.style.display = 'block';
}

// Close popup when clicking on the close button
document.querySelector('.form--close-btn').addEventListener('click', function() {
    document.getElementById('popup').style.display = 'none';
});

// Close popup when clicking outside of the popup content
window.addEventListener('click', function(event) {
    const popup = document.getElementById('popup');
    if (event.target === popup) {
        popup.style.display = 'none';
    }
});


// Add wave animation
const wave = document.querySelector('.footer--wave-shape');
let position = 0;

function animateWave() {
    position -= 0.5;
    wave.style.transform = `translateX(${position}px)`;
    
    if (position <= -1200) {
        position = 0;
    }
    
    requestAnimationFrame(animateWave);
}

animateWave();