<?php
// Establish connection to the database
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

// Create table for storing analyzed documents if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS analyzed_documents (
id INT AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
sentiment VARCHAR(50),
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Function for sentiment analysis (Placeholder for actual analysis)
function analyzeSentiment($text) {
    // simplified sentiment analysis
    $positiveWords = ['good', 'happy', 'joy', 'great'];
    $negativeWords = ['bad', 'sad', 'pain', 'angry'];
    $positiveMatches = array_filter($positiveWords, function($word) use ($text) { return strpos($text, $word) !== false; });
    $negativeMatches = array_filter($negativeWords, function($word) use ($text) { return strpos($text, $word) !== false; });
    if (count($positiveMatches) > count($negativeMatches)) {
        return 'Positive';
    } elseif (count($positiveMatches) < count($negativeMatches)) {
        return 'Negative';
    } else {
        return 'Neutral';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if file is a text file
  if($fileType != "txt") {
    echo "Sorry, only TXT files are allowed.";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

      // Read the file content
      $content = file_get_contents($target_file);

      // Analyze the content for sentiment
      $sentiment = analyzeSentiment($content);

      // Insert document and analysis result into database
      $stmt = $conn->prepare("INSERT INTO analyzed_documents (filename, sentiment) VALUES (?, ?)");
      $stmt->bind_param("ss", $filename, $sentiment);
      $filename = $_FILES["fileToUpload"]["name"];
      
      if ($stmt->execute()) {
        echo "Document analyzed successfully. Sentiment: $sentiment";
      } else {
        echo "Error: " . $stmt->error;
      }

      $stmt->close();
      
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Document Sentiment Analysis</title>
</head>
<body>
    <h2>Upload Document for Sentiment Analysis</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select document to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Document" name="submit">
    </form>
</body>
</html>
