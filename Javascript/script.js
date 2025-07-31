// Quiz Master JavaScript - Simple validation and dynamic behavior

// Form Validation 
function validateForm() {
    const email = document.querySelector('input[type="email"]');
    const password = document.querySelector('input[type="password"]');
    
    if (email && !email.value.includes('@')) {
        alert('Please enter a valid email');
        return false;
    }
    
    if (password && password.value.length < 6) {
        alert('Password must be at least 6 characters');
        return false;
    }
    
    return true;
}

// Dynamic Behavior 
document.addEventListener('DOMContentLoaded', function() {
    // Button hover effects
    const buttons = document.querySelectorAll('button');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.backgroundColor = '#555';
        });
        button.addEventListener('mouseleave', function() {
            this.style.backgroundColor = '';
        });
    });
    
    // Quiz answer highlighting
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            document.querySelectorAll('.answer-option').forEach(option => {
                option.style.backgroundColor = '';
            });
            this.parentElement.style.backgroundColor = '#lightblue';
        });
    });
});
