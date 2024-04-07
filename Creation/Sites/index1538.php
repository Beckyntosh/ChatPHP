

<?php
// Simplified code for educational purposes - real-world applications require more security and structure.

// Database connection
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS LanguageModules (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language VARCHAR(30) NOT NULL,
level VARCHAR(30) NOT NULL,
vocabulary TEXT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table LanguageModules created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $language = $_POST["language"];
  $level = $_POST["level"];
  $vocabulary = $_POST["vocabulary"];

  $stmt = $conn->prepare("INSERT INTO LanguageModules (language, level, vocabulary) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $language, $level, $vocabulary);

  if($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spanish for Beginners</title>
</head>
<body>
    <h2>Add New Spanish Vocabulary</h2>
    <form action="" method="post">
        <label for="language">Language:</label><br>
        <input type="text" id="language" name="language" value="Spanish"><br>
        
        <label for="level">Level:</label><br>
        <input type="text" id="level" name="level" value="Beginner"><br>
        
        <label for="vocabulary">Vocabulary (comma-separated):</label><br>
        <textarea id="vocabulary" name="vocabulary" rows="4" cols="50"></textarea><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>

This code does not cover user authentication, input validation, or sanitization and is vulnerable to SQL injection among other security issues. In a real application, you should use parameterized queries to prevent SQL injection and ensure user inputs are properly validated and sanitized. You may also want to implement an MVC framework for better structure and separation of concerns.