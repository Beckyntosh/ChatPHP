<?php

// Establish database connection
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
$moduleTable = "CREATE TABLE IF NOT EXISTS modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    reg_date TIMESTAMP
)";

$quizTable = "CREATE TABLE IF NOT EXISTS quizzes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_id INT(6) UNSIGNED,
    question TEXT NOT NULL,
    answer VARCHAR(255) NOT NULL,
    FOREIGN KEY (module_id) REFERENCES modules(id),
    reg_date TIMESTAMP
)";

$vocabularyTable = "CREATE TABLE IF NOT EXISTS vocabularies (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_id INT(6) UNSIGNED,
    term VARCHAR(100) NOT NULL,
    definition TEXT NOT NULL,
    FOREIGN KEY (module_id) REFERENCES modules(id),
    reg_date TIMESTAMP
)";

$conn->query($moduleTable);
$conn->query($quizTable);
$conn->query($vocabularyTable);

// Data submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['module'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        $insertModule = $conn->prepare("INSERT INTO modules (title, description) VALUES (?, ?)");
        $insertModule->bind_param("ss", $title, $description);
        $insertModule->execute();
    }

    if (isset($_POST['vocabulary'])) {
        $module_id = $_POST['module_id'];
        $term = $_POST['term'];
        $definition = $_POST['definition'];

        $insertVocabulary = $conn->prepare("INSERT INTO vocabularies (module_id, term, definition) VALUES (?, ?, ?)");
        $insertVocabulary->bind_param("iss", $module_id, $term, $definition);
        $insertVocabulary->execute();
    }

    if (isset($_POST['quiz'])) {
        $module_id = $_POST['module_id'];
        $question = $_POST['question'];
        $answer = $_POST['answer'];

        $insertQuiz = $conn->prepare("INSERT INTO quizzes (module_id, question, answer) VALUES (?, ?, ?)");
        $insertQuiz->bind_param("iss", $module_id, $question, $answer);
        $insertQuiz->execute();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Language Learning Content</title>
</head>
<body>

<h2>Create a Language Learning Module</h2>
<form method="post" action="">
    <input type="hidden" name="module">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title"><br>
    <label for="description">Description:</label><br>
    <textarea id="description" name="description"></textarea><br>
    <input type="submit" value="Submit">
</form>

<h2>Add Vocabulary to Module</h2>
<form method="post" action="">
    <input type="hidden" name="vocabulary">
    <label for="module_id">Module ID:</label><br>
    <input type="text" id="module_id" name="module_id"><br>
    <label for="term">Term:</label><br>
    <input type="text" id="term" name="term"><br>
    <label for="definition">Definition:</label><br>
    <textarea id="definition" name="definition"></textarea><br>
    <input type="submit" value="Submit">
</form>

<h2>Add Quiz Question to Module</h2>
<form method="post" action="">
    <input type="hidden" name="quiz">
    <label for="module_id">Module ID:</label><br>
    <input type="text" id="module_id" name="module_id"><br>
    <label for="question">Question:</label><br>
    <textarea id="question" name="question"></textarea><br>
    <label for="answer">Answer:</label><br>
    <input type="text" id="answer" name="answer"><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>