<?php
require_once('db.php');
session_start();

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Store in database
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password]);
        
        // Auto-login after registration
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        
        // Redirect to Quiz_list.php
        header('Location: Quiz_list.php');
        exit();
        
    } catch(Exception $e) {
        $message = '<div class="error-message">Username already exists!</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BrainBoosters</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        .register-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 4rem 2rem;
        }

        .register-form h2 {
            text-align: center;
            margin-bottom: 2.5rem;
            color: #1a365d;
            font-size: 2.5rem;
        }

        .form-group {
            margin-bottom: 2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.75rem;
            color: #2d3748;
            font-weight: 500;
            font-size: 1.1rem;
        }

        .form-group input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1.1rem;
            transition: border-color 0.2s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4299e1;
        }

        .btn-primary {
            background: #48bb78;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            width: 100%;
            margin-bottom: 1.5rem;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background: #38a169;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #4299e1;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            width: 100%;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.2s ease;
        }

        .btn-secondary:hover {
            background: #3182ce;
            transform: translateY(-1px);
            text-decoration: none;
        }

        .divider {
            text-align: center;
            margin: 2rem 0;
            color: #718096;
            font-size: 1.1rem;
        }

        .error-message {
            color: #e53e3e;
            background: #fed7d7;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 1rem;
        }

        .success-message {
            color: #38a169;
            background: #c6f6d5;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Brain Boosters</h1>
        <nav>
            <a href="Index.php">Home</a>
            <a href="Login.php">Login</a>
        </nav>
    </header>

    <main>
        <div class="register-container">
            <form id="registerForm" class="register-form" method="POST" action="Register.php">
                <h2>Create Account</h2>
                
                <?php echo $message; ?>

                <!-- Error message div for JavaScript -->
                <div id="error-message" class="error-message" style="display: none;"></div>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>

                <button type="submit" name="register" class="btn-primary">Create Account</button>
                
                <div class="divider">Already have an account?</div>
                
                <a href="Login.php" class="btn-secondary">Login Here</a>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 BrainBoosters</p>
    </footer>

    <script>
        // JavaScript form validation
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            // Get form values
            const username = document.getElementById('username').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            
            // Get error message div
            const errorDiv = document.getElementById('error-message');
            
            // Reset error message
            errorDiv.style.display = 'none';
            errorDiv.innerHTML = '';
            
            let errors = [];
            
            // Validation checks
            if (!username) {
                errors.push('Username is required');
            }
            
            if (!email) {
                errors.push('Email is required');
            } else if (!isValidEmail(email)) {
                errors.push('Please enter a valid email address');
            }
            
            if (!password) {
                errors.push('Password is required');
            } else if (password.length < 6) {
                errors.push('Password must be at least 6 characters long');
            }
            
            if (password !== confirmPassword) {
                errors.push('Passwords do not match');
            }
            
            // If there are errors, show them and prevent form submission
            if (errors.length > 0) {
                e.preventDefault(); // Stop form from submitting
                
                errorDiv.innerHTML = errors.join('<br>');
                errorDiv.style.display = 'block';
                
                // Scroll to error message
                errorDiv.scrollIntoView({ behavior: 'smooth' });
            }
        });
        
        // Email validation function
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>
</body>
</html>
