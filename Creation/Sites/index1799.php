<?php
// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for storing file upload details if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS uploaded_texts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP
)";

if ($conn->query($table) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

function performSentimentAnalysis($text)
{
    // Dummy sentiment analysis function
    // This is where the sentiment analysis logic would go
    $positiveWords = ['good', 'happy', 'joyful', 'satisfied'];
    $negativeWords = ['bad', 'sad', 'unhappy', 'dissatisfied'];

    $positiveScore = 0;
    $negativeScore = 0;

    $words = explode(' ', strtolower($text));
    foreach($words as $word) {
        if(in_array($word, $positiveWords)) {
            $positiveScore++;
        }
        if(in_array($word, $negativeWords)) {
            $negativeScore++;
        }
    }

    if ($positiveScore > $negativeScore) {
        return "Positive";
    } elseif ($positiveScore < $negativeScore) {
        return "Negative";
    } else {
        return "Neutral";
    }
}

// Handle File Upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["document"]["name"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["document"]["name"]);
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if file is a text file
  if($fileType != "txt") {
    $response = "Sorry, only TXT files are allowed.";
  } else {
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
      $response = "The file ". htmlspecialchars(basename( $_FILES["document"]["name"])). " has been uploaded.";

      $sql = "INSERT INTO uploaded_texts (filename) VALUES ('" . $_FILES["document"]["name"] . "')";

      if (!$conn->query($sql) === TRUE) {
        $response = "Error: " . $sql . "<br>" . $conn->error;
      }

      // Begin Sentiment Analysis
      $content = file_get_contents($target_file);
      $analysisResult = performSentimentAnalysis($content);

      $response .= "<br>Sentiment Analysis Result: " . $analysisResult;
    } else {
      $response = "Sorry, there was an error uploading your file.";
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Text File Upload for Sentiment Analysis</title>
</head>
<body>
<h2>Upload a Document for Sentiment Analysis</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select document to upload:
  <input type="file" name="document" id="fileToUpload">
  <input type="submit" value="Upload Document" name="submit">
</form>
<?php if (isset($response)) echo "<p>$response</p>"; ?>
</body>
</html>
