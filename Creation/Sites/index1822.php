<?php
// Set up a connection to the database
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

// Create table for storing file upload information if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS file_uploads (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  analysis TEXT,
  upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql)) {
  die("Error creating table: " . $conn->error);
}

// Check for file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["textFile"])) {
    // File properties
    $file_name = $_FILES['textFile']['name'];
    $file_tmp = $_FILES['textFile']['tmp_name'];
    $uploadDirectory = "uploads/";
    $uploadPath = $uploadDirectory . basename($file_name);
    $fileType = strtolower(pathinfo($uploadPath,PATHINFO_EXTENSION));

    if($fileType != "txt") {
        echo "Sorry, only TXT files are allowed.";
    } else {
        if(move_uploaded_file($file_tmp, $uploadPath)) {
            // Read file content for analysis
            $content = file_get_contents($uploadPath);
            // Dummy sentiment analysis function replacement for actual logic
            $analysisResult = sentimentAnalysis($content);
            
            // Store file info in the database
            $stmt = $conn->prepare("INSERT INTO file_uploads (filename, analysis) VALUES (?, ?)");
            $stmt->bind_param("ss", $filename, $analysisResult);
            $filename = $file_name;
            $analysisResult = $content; // This should ideally be the result of the analysis
            $stmt->execute();
            echo "File uploaded and analyzed successfully.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Dummy sentiment analysis function
function sentimentAnalysis($text) {
    // Dummy logic for sentiment analysis
    return "Positive"; // This should be replaced with actual analysis logic
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Text File for Sentiment Analysis</title>
</head>
<body>
    <h2>Upload Document for Sentiment Analysis - Children's Clothing Website</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select Text File to upload:
        <input type="file" name="textFile" id="textFile">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>
