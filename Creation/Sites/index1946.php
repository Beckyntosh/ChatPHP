<?php
// Simple Code Review System in PHP
// Note: This is a basic example for educational purposes.

// Database Connection
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
$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL
  )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS code_reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  title VARCHAR(50) NOT NULL,
  code TEXT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
  )";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request for uploading source code
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Assuming a user with ID 1 is uploading for simplicity
  $user_id = 1;
  $title = $conn->real_escape_string($_POST['title']);
  $code = $conn->real_escape_string($_POST['code']);

  $sql = "INSERT INTO code_reviews (user_id, title, code) VALUES ('$user_id', '$title', '$code')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Code Review Upload</title>
</head>
<body>
  <h2>Upload Source Code for Review</h2>
  <form action="" method="post">
    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" required><br>
    <label for="code">Source Code:</label><br>
    <textarea id="code" name="code" rows="10" cols="50" required></textarea><br><br>
    <input type="submit" value="Upload">
  </form>

  <h2>Code Reviews</h2>
  <?php
  $sql = "SELECT * FROM code_reviews ORDER BY id DESC";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<div>";
      echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
      echo "<pre>" . htmlspecialchars($row['code']) . "</pre>";
      echo "</div>";
    }
  } else {
    echo "No code reviews found.";
  }
  $conn->close();
  ?>
</body>
</html>
