<?php
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

// Create tables if they do not exist
$createModulesTable = "CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP
    )";

$createVocabularyTable = "CREATE TABLE IF NOT EXISTS vocabulary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_id INT(6) UNSIGNED,
    word VARCHAR(255) NOT NULL,
    translation VARCHAR(255) NOT NULL,
    FOREIGN KEY (module_id) REFERENCES language_modules(id) ON DELETE CASCADE
    )";

$createQuizTable = "CREATE TABLE IF NOT EXISTS quizzes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_id INT(6) UNSIGNED,
    question VARCHAR(255) NOT NULL,
    correct_answer VARCHAR(255) NOT NULL,
    incorrect_answer1 VARCHAR(255) NOT NULL,
    incorrect_answer2 VARCHAR(255),
    incorrect_answer3 VARCHAR(255),
    FOREIGN KEY (module_id) REFERENCES language_modules(id) ON DELETE CASCADE
    )";

if (!$conn->query($createModulesTable) || !$conn->query($createVocabularyTable) || !$conn->query($createQuizTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $word = $_POST['word'];
    $translation = $_POST['translation'];
    $question = $_POST['question'];
    $correct_answer = $_POST['correct_answer'];
    $incorrect_answers = [$_POST['incorrect_answer1'], $_POST['incorrect_answer2'], $_POST['incorrect_answer3']];

    // Insert module
    $stmt = $conn->prepare("INSERT INTO language_modules (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);
    $stmt->execute();
    $last_module_id = $stmt->insert_id;

    // Insert vocabulary
    $stmt = $conn->prepare("INSERT INTO vocabulary (module_id, word, translation) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $last_module_id, $word, $translation);
    $stmt->execute();

    // Insert Quiz
    $stmt = $conn->prepare("INSERT INTO quizzes (module_id, question, correct_answer, incorrect_answer1, incorrect_answer2, incorrect_answer3) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $last_module_id, $question, $correct_answer, $incorrect_answers[0], $incorrect_answers[1], $incorrect_answers[2]);
    $stmt->execute();

    echo "New records created successfully";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Language Learning Content</title>
</head>
<body>
    <h1>Add Language Learning Module</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <div>
            <label for="title">Module Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">Module Description:</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <h2>Vocabulary</h2>
        <div>
            <label for="word">Word:</label>
            <input type="text" id="word" name="word" required>
        </div>
        <div>
            <label for="translation">Translation:</label>
            <input type="text" id="translation" name="translation" required>
        </div>
        <h2>Quiz</h2>
        <div>
            <label for="question">Question:</label>
            <input type="text" id="question" name="question" required>
        </div>
        <div>
            <label for="correct_answer">Correct Answer:</label>
            <input type="text" id="correct_answer" name="correct_answer" required>
        </div>
        <div>
            <label for="incorrect_answer1">Incorrect Answer 1:</label>
            <input type="text" id="incorrect_answer1" name="incorrect_answer1" required>
        </div>
        <div>
            <label for="incorrect_answer2">Incorrect Answer 2:</label>
            <input type="text" id="incorrect_answer2" name="incorrect_answer2">
        </div>
        <div>
            <label for="incorrect_answer3">Incorrect Answer 3:</label>
            <input type="text" id="incorrect_answer3" name="incorrect_answer3">
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>