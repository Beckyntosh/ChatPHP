<!DOCTYPE html>
<html>
<head>
    <title>Quiz Platform</title>
    <style>
        body { background-color: #f4f4f4; color: #555; font-family: Arial, sans-serif; margin: 0; padding: 20px;}
        .container { background: white; margin: 0 auto; max-width: 800px; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .quiz { margin-bottom: 20px; }
        .question { margin-bottom: 10px; }
        .submit { background: #5cb85c; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; }
        .question input[type="text"] { width: 75%; padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px; }
        h2, h3 { color: #333; }
        .alert { background-color: #f44336; color: white; padding: 10px; margin-bottom: 20px; border-left: 6px solid #a94442; }
    </style>
</head>
<body>
<div class="container">
    <h2>Create a Quiz</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="quiz">
            <div class="question">
                <h3>Quiz Title:</h3>
                <input type="text" name="quiz_title" required>
            </div>
            <div class="question">
                <h3>Question 1:</h3>
                <input type="text" name="question_1" placeholder="Question" required>
                <input type="text" name="answer_1" placeholder="Answer" required>
            </div>
Add more questions here as needed
            <div class="submit">
                <input type="submit" name="submit_quiz" value="Create Quiz">
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['submit_quiz'])) {
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "my_database";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create tables if not exists
        $sql = "CREATE TABLE IF NOT EXISTS quizzes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL
            )";
        if (!$conn->query($sql) === TRUE) {
            echo "<div class='alert'>Error creating table: " . $conn->error . "</div>";
        }

        $sql = "CREATE TABLE IF NOT EXISTS questions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            quiz_id INT NOT NULL,
            question VARCHAR(255) NOT NULL,
            answer VARCHAR(255) NOT NULL,
            FOREIGN KEY (quiz_id) REFERENCES quizzes(id)
            )";
        if (!$conn->query($sql) === TRUE) {
            echo "<div class='alert'>Error creating table: " . $conn->error . "</div>";
        }

        // Insert quiz
        $quizTitle = $conn->real_escape_string($_POST['quiz_title']);
        $sql = "INSERT INTO quizzes (title) VALUES ('$quizTitle')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            // Insert question
            $question1 = $conn->real_escape_string($_POST['question_1']);
            $answer1 = $conn->real_escape_string($_POST['answer_1']);
            $sql = "INSERT INTO questions (quiz_id, question, answer) VALUES ('$last_id', '$question1', '$answer1')";
            if ($conn->query($sql) === TRUE) {
                echo "<div>Quiz successfully created.</div>";
            } else {
                echo "<div class='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
        $conn->close();
    }
    ?>
</div>
</body>
</html>
