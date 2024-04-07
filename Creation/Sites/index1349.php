<?php
// Check if the connection to the database is established
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$quizTable = "CREATE TABLE IF NOT EXISTS Quizzes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
reg_date TIMESTAMP)";

$questionTable = "CREATE TABLE IF NOT EXISTS Questions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
quiz_id INT(6) UNSIGNED,
question_text TEXT NOT NULL,
FOREIGN KEY (quiz_id) REFERENCES Quizzes(id) ON DELETE CASCADE)";

$optionTable = "CREATE TABLE IF NOT EXISTS Options (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
question_id INT(6) UNSIGNED,
option_text VARCHAR(100) NOT NULL,
is_correct BOOLEAN,
FOREIGN KEY (question_id) REFERENCES Questions(id) ON DELETE CASCADE)";

$conn->query($quizTable);
$conn->query($questionTable);
$conn->query($optionTable);

// Handle Quiz Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quizTitle'])) {
  $quizTitle = $_POST['quizTitle'];
  $quizInsert = $conn->prepare("INSERT INTO Quizzes (title) VALUES (?)");
  $quizInsert->bind_param("s", $quizTitle);
  $quizInsert->execute();
  
  echo "Quiz created successfully!";
}

// Fetch all quizzes
$quizzes = $conn->query("SELECT * FROM Quizzes");

?>
<!DOCTYPE html>
<html>
<head>
<title>Create a Quiz</title>
</head>
<body>

<h2>Create Quiz</h2>

<form method="post">
  <label for="quizTitle">Quiz Title:</label><br>
  <input type="text" id="quizTitle" name="quizTitle" required><br>
  <input type="submit" value="Create Quiz">
</form>

<h3>Available Quizzes</h3>
<ul>
<?php
if ($quizzes->num_rows > 0) {
  while($quiz = $quizzes->fetch_assoc()) {
    echo "<li>" . htmlspecialchars($quiz['title']) . "</li>";
  }
} else {
  echo "<li>No quizzes found</li>";
}
?>
</ul>

</body>
</html>
<?php
$conn->close();
?>
