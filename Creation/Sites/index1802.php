<?php
// Database connection
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for storing files data if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
analysis TEXT,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

function sentimentAnalysis($text) {
    // Dummy sentiment analysis - real implementation can use an API or an algorithm
    $positiveWords = ['happy', 'joy', 'love'];
    $negativeWords = ['sad', 'hate', 'pain'];

    $positiveScore = 0;
    $negativeScore = 0;

    $words = explode(' ', $text);
    foreach ($words as $word) {
        if (in_array(strtolower($word), $positiveWords)) {
            $positiveScore++;
        } elseif (in_array(strtolower($word), $negativeWords)) {
            $negativeScore++;
        }
    }

    return $positiveScore > $negativeScore ? 'Positive' : ($positiveScore < $negativeScore ? 'Negative' : 'Neutral');
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $content = file_get_contents($target_file);
        $analysisResult = sentimentAnalysis($content);

        $stmt = $conn->prepare("INSERT INTO uploaded_files (filename, analysis) VALUES (?, ?)");
        $stmt->bind_param("ss", $filename, $analysis);

        $filename = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
        $analysis = $analysisResult;

        if ($stmt->execute()) {
            echo "File has been uploaded and analyzed: " . $analysisResult;
        } else {
            echo "Error uploading file.";
        }

        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload a File for Sentiment Analysis</h2>

<form action="" method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>
