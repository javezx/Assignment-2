// BrainBooster JavaScript - Simple validation and dynamic behavior

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

// Quiz Functions
function checkAnswers() {
    // Determine which quiz we're on
    let correctAnswers = [];
    let quizTitle = '';
    
    if (document.title.includes('Easy Math Quiz')) {
        correctAnswers = [5, 3, 2, 4, 7];
        quizTitle = 'Easy Math Quiz';
    } else if (document.title.includes('Medium Math Quiz')) {
        correctAnswers = [12, 5, 14, 5, 30];
        quizTitle = 'Medium Math Quiz';
    }
    
    // Get user answers
    const userAnswers = [];
    for (let i = 1; i <= 5; i++) {
        const selected = document.querySelector(`input[name="q${i}"]:checked`);
        if (selected) {
            userAnswers.push(parseInt(selected.value));
        } else {
            alert('Please answer all questions!');
            return;
        }
    }
    
    let score = 0;
    
    // Check each question and highlight
    for (let i = 0; i < 5; i++) {
        const questionNum = i + 1;
        const userAnswer = userAnswers[i];
        const correctAnswer = correctAnswers[i];
        
        // Get all choices for this question
        const choices = document.querySelectorAll(`input[name="q${questionNum}"]`);
        
        choices.forEach(choice => {
            const choiceDiv = choice.closest('.choice');
            const label = choice.nextElementSibling;
            const value = parseInt(choice.value);
            
            // Remove existing classes
            choiceDiv.classList.remove('correct-answer', 'wrong-answer', 'user-choice');
            
            // Highlight correct answer
            if (value === correctAnswer) {
                choiceDiv.classList.add('correct-answer');
                if (!label.textContent.includes('✅')) {
                    label.textContent += ' ✅';
                }
            }
            
            // Highlight user's choice
            if (choice.checked) {
                choiceDiv.classList.add('user-choice');
                if (value !== correctAnswer) {
                    choiceDiv.classList.add('wrong-answer');
                    if (!label.textContent.includes('❌')) {
                        label.textContent += ' ❌';
                    }
                }
            }
            
            // Disable all choices
            choice.disabled = true;
        });
        
        // Count score
        if (userAnswer === correctAnswer) {
            score++;
        }
    }
    
    // Show results
    document.getElementById('final-score').textContent = `Final Score: ${score}/5`;
    
    let message = '';
    if (score === 5) {
        if (quizTitle === 'Easy Math Quiz') {
            message = '🎉 Perfect! You got all questions right!';
        } else {
            message = '🎉 Excellent! You mastered multiplication and division!';
        }
    } else if (score >= 3) {
        if (quizTitle === 'Easy Math Quiz') {
            message = '👍 Good job! Keep practicing!';
        } else {
            message = '👍 Great work! You\'re getting the hang of it!';
        }
    } else {
        if (quizTitle === 'Easy Math Quiz') {
            message = '🤔 Keep trying! Practice makes perfect!';
        } else {
            message = '🤔 Keep practicing! Math gets easier with practice!';
        }
    }
    document.getElementById('score-message').textContent = message;
    document.getElementById('results').style.display = 'block';
    
    // Hide submit button
    document.querySelector('button[onclick="checkAnswers()"]').style.display = 'none';
}

// Dynamic Behavior 
document.addEventListener('DOMContentLoaded', function() {
    // Button hover effects (excluding quiz result buttons)
    const buttons = document.querySelectorAll('button:not(.quiz-result-btn)');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            if (!this.classList.contains('quiz-btn') || !this.closest('#results')) {
                this.style.backgroundColor = '#555';
            }
        });
        button.addEventListener('mouseleave', function() {
            if (!this.classList.contains('quiz-btn') || !this.closest('#results')) {
                this.style.backgroundColor = '';
            }
        });
    });
    
    // Quiz answer highlighting
    const radioButtons = document.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {
            // Remove previous highlighting from same question
            const questionContainer = this.closest('.question');
            if (questionContainer) {
                const choices = questionContainer.querySelectorAll('.choice');
                choices.forEach(choice => {
                    choice.style.backgroundColor = '';
                });
                // Highlight selected choice
                this.closest('.choice').style.backgroundColor = '#e3f2fd';
            }
        });
    });
});
