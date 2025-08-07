<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz List - BrainBoosters</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        .quiz-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .quiz-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .quiz-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.2s ease;
        }

        .quiz-card:hover {
            transform: translateY(-5px);
        }

        .quiz-card h3 {
            color: #1a365d;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .quiz-card p {
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .quiz-btn {
            background: #4299e1;
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s ease;
        }

        .quiz-btn:hover {
            background: #3182ce;
            transform: translateY(-1px);
        }

        .quiz-btn.easy {
            background: #48bb78;
        }

        .quiz-btn.easy:hover {
            background: #38a169;
        }

        .quiz-btn.medium {
            background: #ed8936;
        }

        .quiz-btn.medium:hover {
            background: #dd6b20;
        }

        .welcome-msg {
            background: #c6f6d5;
            color: #38a169;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Brain Boosters</h1>
        <nav>
            <a href="Index.php">Home</a>
            <a href="Login.php">Logout</a>
        </nav>
    </header>

    <main>
        <div class="quiz-container">
            <div class="welcome-msg">
                <h2>🎉 Welcome! Choose a Quiz to Start</h2>
                <p>Test your math skills with our simple quizzes</p>
            </div>

            <div class="quiz-grid">
                <!-- Quiz 1: Easy Math -->
                <div class="quiz-card">
                    <h3>🔢 Easy Math Quiz</h3>
                    <p>Simple addition and subtraction problems. Perfect for beginners!</p>
                    <p><strong>Questions:</strong> 5 | <strong>Time:</strong> No limit</p>
                    <a href="quiz1.php" class="quiz-btn easy">Start Easy Quiz</a>
                </div>

                <!-- Quiz 2: Medium Math -->
                <div class="quiz-card">
                    <h3>🧮 Medium Math Quiz</h3>
                    <p>Multiplication and division problems. A bit more challenging!</p>
                    <p><strong>Questions:</strong> 5 | <strong>Time:</strong> No limit</p>
                    <a href="quiz2.php" class="quiz-btn medium">Start Medium Quiz</a>
                </div>
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <p style="color: #666;">More quizzes coming soon! 🚀</p>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 BrainBoosters</p>
    </footer>
</body>
</html>
