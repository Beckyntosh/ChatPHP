<?php
// Simple Code Review System for a Handbag Website

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

// Table creation for storing code uploads
$createTableQuery = "CREATE TABLE IF NOT EXISTS code_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
feature_name VARCHAR(30) NOT NULL,
code LONGTEXT NOT NULL,
review LONGTEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTableQuery) === TRUE) {
  echo "Table code_reviews created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Inserting a code submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_code"])) {
  $feature_name = $_POST['feature_name'];
  $code = $_POST['code'];
  
  $stmt = $conn->prepare("INSERT INTO code_reviews (feature_name, code) VALUES (?, ?)");
  $stmt->bind_param("ss", $feature_name, $code);
  
  if ($stmt->execute()) {
    echo "New code submission created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Handbag Website - Code Review System</title>
</head>
<body>

<h2>Upload Source Code for Review</h2>

<form method="post">
  <label for="feature_name">Feature Name:</label><br>
  <input type="text" id="feature_name" name="feature_name" required><br>
  <label for="code">Source Code:</label><br>
  <textarea id="code" name="code" rows="20" cols="50" required></textarea><br>
  <input type="submit" name="submit_code" value="Submit">
</form>

</body>
</html>
