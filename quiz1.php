<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Math Quiz - BrainBoosters</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="Javascript/script.js"></script>
    <style>
        .quiz-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .question {
            padding: 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .question h2 {
            color: #1a365d;
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .question p {
            font-size: 3rem;
            color: #2d3748;
            margin: 1rem 0;
            font-weight: bold;
        }

        .choice-container {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin: 1rem 0;
        }

        .choice {
            display: flex;
            align-items: center;
            padding: 0.8rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .choice:hover {
            background: #f7fafc;
            border-color: #48bb78;
        }

        .choice input[type="radio"] {
            margin-right: 1rem;
            transform: scale(1.2);
        }

        .choice label {
            font-size: 1.5rem;
            cursor: pointer;
            flex: 1;
        }

        .choice.correct-answer {
            background: #c6f6d5;
            border-color: #38a169;
            color: #38a169;
        }

        .choice.wrong-answer {
            background: #fed7d7;
            border-color: #e53e3e;
            color: #e53e3e;
        }

        .choice.user-choice {
            font-weight: bold;
        }

        #results {
            display: none;
        }

        .quiz-btn {
            background: #48bb78;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1.2rem;
            font-weight: 500;
            cursor: pointer;
            margin: 1rem;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .quiz-btn:hover {
            background: #38a169 !important;
            color: white;
        }

        .quiz-btn:visited {
            color: white;
        }

        #results .quiz-btn {
            margin-top: 1.5rem;
        }

        .result {
            padding: 1rem;
            border-radius: 8px;
            margin: 1rem 0;
            text-align: center;
            font-weight: bold;
        }

        .correct {
            background: #c6f6d5;
            color: #38a169;
        }

        .incorrect {
            background: #fed7d7;
            color: #e53e3e;
        }

        .score {
            background: #bee3f8;
            color: #2b6cb0;
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
            margin: 2rem 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Brain Boosters</h1>
        <nav>
            <a href="Quiz_list.php">Back to Quizzes</a>
        </nav>
    </header>

    <main>
        <div class="quiz-container">
            <h1 style="text-align: center; color: #1a365d;">🔢 Easy Math Quiz</h1>
            
            <form method="POST" action="quiz1.php">
                <!-- Question 1 -->
                <div class="question">
                    <h2>Question 1</h2>
                    <p>2 + 3 = ?</p>
                    <div class="choice-container">
                        <div class="choice">
                            <input type="radio" name="q1" value="5" id="q1a" required>
                            <label for="q1a">5</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q1" value="4" id="q1b">
                            <label for="q1b">4</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q1" value="6" id="q1c">
                            <label for="q1c">6</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q1" value="3" id="q1d">
                            <label for="q1d">3</label>
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="question">
                    <h2>Question 2</h2>
                    <p>7 - 4 = ?</p>
                    <div class="choice-container">
                        <div class="choice">
                            <input type="radio" name="q2" value="2" id="q2a" required>
                            <label for="q2a">2</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q2" value="3" id="q2b">
                            <label for="q2b">3</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q2" value="4" id="q2c">
                            <label for="q2c">4</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q2" value="5" id="q2d">
                            <label for="q2d">5</label>
                        </div>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="question">
                    <h2>Question 3</h2>
                    <p>1 + 1 = ?</p>
                    <div class="choice-container">
                        <div class="choice">
                            <input type="radio" name="q3" value="1" id="q3a" required>
                            <label for="q3a">1</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q3" value="2" id="q3b">
                            <label for="q3b">2</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q3" value="3" id="q3c">
                            <label for="q3c">3</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q3" value="0" id="q3d">
                            <label for="q3d">0</label>
                        </div>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="question">
                    <h2>Question 4</h2>
                    <p>9 - 5 = ?</p>
                    <div class="choice-container">
                        <div class="choice">
                            <input type="radio" name="q4" value="3" id="q4a" required>
                            <label for="q4a">3</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q4" value="4" id="q4b">
                            <label for="q4b">4</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q4" value="5" id="q4c">
                            <label for="q4c">5</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q4" value="6" id="q4d">
                            <label for="q4d">6</label>
                        </div>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="question">
                    <h2>Question 5</h2>
                    <p>3 + 4 = ?</p>
                    <div class="choice-container">
                        <div class="choice">
                            <input type="radio" name="q5" value="6" id="q5a" required>
                            <label for="q5a">6</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q5" value="7" id="q5b">
                            <label for="q5b">7</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q5" value="8" id="q5c">
                            <label for="q5c">8</label>
                        </div>
                        <div class="choice">
                            <input type="radio" name="q5" value="5" id="q5d">
                            <label for="q5d">5</label>
                        </div>
                    </div>
                </div>

                <div style="text-align: center;">
                    <button type="button" onclick="checkAnswers()" class="quiz-btn">Submit Quiz</button>
                </div>
            </form>

            <div id="results">
                <div class="score">
                    <h2>Quiz Results</h2>
                    <h2 id="final-score"></h2>
                    <p id="score-message"></p>
                    <a href="Quiz_list.php" class="quiz-btn">Back to Quizzes</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 BrainBoosters</p>
    </footer>
</body>
</html>
