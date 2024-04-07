<?php
// Connect to the Database
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

// Create table for storing code reviews if it doesn't exist
$reviewsTable = "CREATE TABLE IF NOT EXISTS code_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
review_status VARCHAR(50),
submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
code TEXT
)";

if ($conn->query($reviewsTable) === TRUE) {
  echo "Table code_reviews created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['sourceCode'])) {
  $filename = $conn->real_escape_string($_FILES['sourceCode']['name']);
  $code = $conn->real_escape_string(file_get_contents($_FILES['sourceCode']['tmp_name']));
  
  $sql = "INSERT INTO code_reviews (filename, review_status, code) VALUES ('$filename', 'pending', '$code')";
  
  if ($conn->query($sql) === TRUE) {
    echo "File uploaded successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Code Review Upload</title>
</head>
<body>
  <h2>Upload Source Code for Review</h2>
  <form action="" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="sourceCode" id="sourceCode">
    <input type="submit" value="Upload Code" name="submit">
  </form>
</body>
</html>