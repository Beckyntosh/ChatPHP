<?php
// Establish database connection
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

// Create table for storing file analysis results if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS sentiment_analysis (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(256) NOT NULL,
sentiment VARCHAR(50),
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle File Upload and Analysis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_FILES['textFile']) && $_FILES['textFile']['error'] == UPLOAD_ERR_OK) {
    $fileName = $_FILES['textFile']['name'];
    $fileTmpName = $_FILES['textFile']['tmp_name'];
    $fileContent = file_get_contents($fileTmpName);

    // Placeholder function for sentiment analysis
    function analyzeSentiment($text) {
      // This should be replaced with actual sentiment analysis code
      return 'Positive'; 
    }

    $sentiment = analyzeSentiment($fileContent);

    // Insert file and analysis result into database
    $stmt = $conn->prepare("INSERT INTO sentiment_analysis (filename, sentiment) VALUES (?, ?)");
    $stmt->bind_param("ss", $fileName, $sentiment);

    if ($stmt->execute()) {
      echo "File uploaded and analyzed successfully. Sentiment: " . $sentiment;
    } else {
      echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload Text File for Sentiment Analysis</title>
</head>
<body>
<h2>Upload Document for Sentiment Analysis</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select text file to upload:
  <input type="file" name="textFile" id="textFile">
  <button type="submit">Upload File</button>
</form>
</body>
</html>
