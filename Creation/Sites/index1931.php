<?php
// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for code submissions if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS code_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
code TEXT NOT NULL,
author VARCHAR(255),
submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $code = $_POST['code'];
  $author = $_POST['author'];

  $stmt = $conn->prepare("INSERT INTO code_reviews (title, code, author) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $title, $code, $author);

  if ($stmt->execute() === TRUE) {
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
    <title>Code Review System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 800px; margin: 0 auto; }
        h2 { text-align: center; }
        form { margin-top: 20px; }
        textarea { width: 100%; height: 200px; }
        input[type="text"], input[type="submit"] { width: 100%; }
        input[type="submit"] { margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Submit Code for Review</h2>
        <form action="?" method="post">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
            
            <label for="code">Code</label>
            <textarea id="code" name="code" required></textarea>
            
            <label for="author">Author</label>
            <input type="text" id="author" name="author" required>
            
            <input type="submit" value="Submit for Review">
        </form>
    </div>
</body>
</html>
