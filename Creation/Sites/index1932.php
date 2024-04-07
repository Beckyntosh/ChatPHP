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

// Table creation
$createTableSql = "CREATE TABLE IF NOT EXISTS code_reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  feature_name VARCHAR(50) NOT NULL,
  code_text TEXT NOT NULL,
  status VARCHAR(20) DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTableSql) === TRUE) {
  // echo "Table code_reviews created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $feature_name = $_POST["feature_name"];
  $code_text = $_POST["code_text"];

  $insertSql = "INSERT INTO code_reviews (feature_name, code_text)
  VALUES ('" . $feature_name . "', '" . $code_text . "')";

  if ($conn->query($insertSql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insertSql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Review Upload System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 800px; margin: auto; padding: 20px; }
        form { margin-top: 20px; }
        textarea { width: 100%; height: 300px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Feature X Source Code for Review</h2>
        <form action="" method="POST">
            <label for="feature_name">Feature Name:</label><br>
            <input type="text" id="feature_name" name="feature_name" required><br><br>
            <label for="code_text">Source Code:</label><br>
            <textarea id="code_text" name="code_text" required></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
