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

// Create table for language content if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS language_content (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language VARCHAR(50) NOT NULL,
title VARCHAR(100) NOT NULL,
vocabulary TEXT NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
  echo "Table language_content created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert new language content from form
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $language = $_POST['language'];
    $title = $_POST['title'];
    $vocabulary = $_POST['vocabulary'];

    $insertSql = "INSERT INTO language_content (language, title, vocabulary) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sss", $language, $title, $vocabulary);

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
<title>Add Language Content</title>
</head>
<body>
<h2>Add New Language Module</h2>
<form method="post" action="">
  <label for="language">Language:</label><br>
  <input type="text" id="language" name="language" required><br>
  <label for="title">Module Title:</label><br>
  <input type="text" id="title" name="title" required><br>
  <label for="vocabulary">Vocabulary (JSON Format):</label><br>
  <textarea id="vocabulary" name="vocabulary" rows="10" cols="30" required></textarea><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
