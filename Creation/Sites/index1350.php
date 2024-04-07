<?php
// Connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$quizzesTable = "CREATE TABLE IF NOT EXISTS quizzes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
creator VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$questionsTable = "CREATE TABLE IF NOT EXISTS questions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
quiz_id INT(6) UNSIGNED,
question_text VARCHAR(255) NOT NULL,
FOREIGN KEY (quiz_id) REFERENCES quizzes(id)
)";

$answersTable = "CREATE TABLE IF NOT EXISTS answers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
question_id INT(6) UNSIGNED,
answer_text VARCHAR(255) NOT NULL,
is_correct BOOLEAN,
FOREIGN KEY (question_id) REFERENCES questions(id)
)";

$conn->query($quizzesTable);
$conn->query($questionsTable);
$conn->query($answersTable);

// Function to handle quiz submission
if (isset($_POST['submit_quiz'])) {
    $quizTitle = $_POST['title'];
    $creator = $_POST['creator'];

    $insertQuiz = $conn->prepare("INSERT INTO quizzes (title, creator) VALUES (?, ?)");
    $insertQuiz->bind_param("ss", $quizTitle, $creator);
    $insertQuiz->execute();
    
    $quizId = $conn->insert_id;

    foreach($_POST['questions'] as $index => $question) {
        $questionText = $question['text'];
        $insertQuestion = $conn->prepare("INSERT INTO questions (quiz_id, question_text) VALUES (?, ?)");
        $insertQuestion->bind_param("is", $quizId, $questionText);
        $insertQuestion->execute();
        $questionId = $conn->insert_id;
        
        foreach($question['answers'] as $answer) {
            $answerText = $answer['text'];
            $isCorrect = $answer['is_correct'] ? 1 : 0;
            $insertAnswer = $conn->prepare("INSERT INTO answers (question_id, answer_text, is_correct) VALUES (?, ?, ?)");
            $insertAnswer->bind_param("isi", $questionId, $answerText, $isCorrect);
            $insertAnswer->execute();
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Quiz</title>
</head>
<body>
    <h2>Create a Quiz</h2>
    <form method="POST">
        <input type="text" name="title" placeholder="Quiz Title" required>
        <input type="text" name="creator" placeholder="Creator's Name" required>
        <div>
            <h3>Questions</h3>
            <div class="question">
                <input type="text" name="questions[0][text]" placeholder="Question 1" required>
                <div class="answers">
                    <input type="text" name="questions[0][answers][0][text]" placeholder="Answer 1" required>
                    <select name="questions[0][answers][0][is_correct]">
                        <option value="1">Correct</option>
                        <option value="0">Wrong</option>
                    </select>
Add more answers as needed
                </div>
            </div>
Add more questions as needed
        </div>
        <button type="submit" name="submit_quiz">Submit Quiz</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
