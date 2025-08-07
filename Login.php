<?php
require_once('db.php');
session_start();

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Check database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();
    
    if ($user) {
        // Login success - set session and go to quizzes
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        
        header('Location: Quiz_list.php');
        exit();
    } else {
        $message = '<div class="error-message">Wrong username or password!</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BrainBoosters</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        .login-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 4rem 2rem;
        }

        .login-form h2 {
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
            background: #4299e1;
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
            background: #3182ce;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #68d391;
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
            background: #48bb78;
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
    </style>
</head>
<body>
    <header>
        <h1>Brain Boosters</h1>
        <nav>
            <a href="Index.php">Home</a>
        </nav>
    </header>

    <main>
        <div class="login-container">
            <form class="login-form" method="POST" action="Login.php">
                <h2>Login</h2>
                
                <?php echo $message; ?>
                
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" name="login" class="btn-primary">Login</button>
                
                <div class="divider">Don't have an account?</div>
                
                <a href="Register.php" class="btn-secondary">Register Now</a>
            </form>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 BrainBoosters</p>
    </footer>
</body>
</html>
