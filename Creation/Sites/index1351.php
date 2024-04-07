<?php

$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$servername = 'db';

// Create connection
$conn = new mysqli($servername, 'root', $MYSQL_ROOT_PSWD, $MYSQL_DB);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create quizzes table if it does not exist
$createQuizzesTable = "CREATE TABLE IF NOT EXISTS quizzes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createQuizzesTable) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Create questions table if it does not exist
$createQuestionsTable = "CREATE TABLE IF NOT EXISTS questions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quiz_id INT(6) UNSIGNED,
    question_text VARCHAR(255) NOT NULL,
    correct_answer VARCHAR(100) NOT NULL,
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id)
)";

if ($conn->query($createQuestionsTable) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle creating new quiz
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["new_quiz"])) {
    $quizTitle = $_POST["quizTitle"];

    $insertQuizSql = "INSERT INTO quizzes (title) VALUES ('$quizTitle')";

    if ($conn->query($insertQuizSql) === TRUE) {
        echo "New quiz created successfully";
    } else {
        echo "Error: " . $insertQuizSql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Platform</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #ffe0f0; color: #333; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h1, h2 { color: #d10068; }
        label, input, button { display: block; width: 100%; }
        input, button { margin-top: 10px; padding: 10px; }
        button { background-color: #d10068; color: #fff; border: none; cursor: pointer; }
        button:hover { background-color: #b8005c; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create a Quiz</h1>
        <form method="post">
            <label for="quizTitle">Quiz Title:</label>
            <input type="text" id="quizTitle" name="quizTitle" required>
            <button type="submit" name="new_quiz">Create Quiz</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
