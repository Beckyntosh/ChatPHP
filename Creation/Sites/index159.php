<?php
// Note: This sample code is a basic illustration designed for educational purposes and might not follow best practices for production environments.
// Initialize connection variables
define("MYSQL_ROOT_PSWD", "root");
define("MYSQL_DB", "my_database");
$servername = "db";
$username = "root";
$password = MYSQL_ROOT_PSWD;
$dbname = MYSQL_DB;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$createModulesTable = "CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$createQuizzesTable = "CREATE TABLE IF NOT EXISTS module_quizzes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_id INT(6) UNSIGNED,
    question TEXT NOT NULL,
    answer TEXT NOT NULL,
    FOREIGN KEY (module_id) REFERENCES language_modules(id) ON DELETE CASCADE
)";

if ($conn->query($createModulesTable) === TRUE && $conn->query($createQuizzesTable) === TRUE) {
  // Tables created successfully or already exist
} else {
  echo "Error creating table: " . $conn->error;
}

// Function to add a new module
function addModule($conn, $title, $description) {
  $stmt = $conn->prepare("INSERT INTO language_modules (title, description) VALUES (?, ?)");
  $stmt->bind_param("ss", $title, $description);
  $stmt->execute();
  return $stmt->insert_id;
}

// Function to add a new quiz for a module
function addQuiz($conn, $moduleId, $question, $answer) {
  $stmt = $conn->prepare("INSERT INTO module_quizzes (module_id, question, answer) VALUES (?, ?, ?)");
  $stmt->bind_param("iss", $moduleId, $question, $answer);
  $stmt->execute();
}

// Inserting new module and quizzes if request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["module_title"]) && isset($_POST["module_description"])) {
    $moduleId = addModule($conn, $_POST["module_title"], $_POST["module_description"]);

    if (isset($_POST["questions"]) && isset($_POST["answers"])) {
      $questions = $_POST["questions"];
      $answers = $_POST["answers"];
      for ($i = 0; $i < count($questions) && $i < count($answers); $i++) {
        addQuiz($conn, $moduleId, $questions[$i], $answers[$i]);
      }
    }
    
    echo "Module and quizzes added successfully!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Language Learning Content</title>
</head>
<body>
<h2>Add Language Learning Module</h2>
<form method="POST">
  <label for="module_title">Module Title:</label><br>
  <input type="text" id="module_title" name="module_title" required><br>
  <label for="module_description">Module Description:</label><br>
  <textarea id="module_description" name="module_description" required></textarea><br>
  <h3>Add Quizzes</h3>
  <label for="question">Question 1:</label><br>
  <input type="text" id="question" name="questions[]" required><br>
  <label for="answer">Answer 1:</label><br>
  <input type="text" id="answer" name="answers[]" required><br>
  <button type="button" onclick="addQuizField()">Add More Quiz</button><br>
  <input type="submit" value="Submit">
</form>

<script>
let quizCount = 1;

function addQuizField() {
  quizCount++;
  const container = document.createElement('div');
  container.innerHTML = `<label for="question">Question ${quizCount}:</label><br>` +
                        `<input type="text" id="question${quizCount}" name="questions[]" required><br>` +
                        `<label for="answer">Answer ${quizCount}:</label><br>` +
                        `<input type="text" id="answer${quizCount}" name="answers[]" required><br>`;
  document.querySelector('form').insertBefore(container, document.querySelector('form').childNodes[document.querySelector('form').childNodes.length - 3]);
}
</script>
</body>
</html>

<?php
$conn->close();
?>