<?php
// Connect to database. 
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

// Create table for uploaded documents if it does not exist
$table = "CREATE TABLE IF NOT EXISTS documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fileName VARCHAR(255) NOT NULL,
fileContent LONGTEXT NOT NULL,
uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

function sentimentAnalysis($text){
    // Dummy sentiment analysis function
    $positiveWords = ['good', 'happy', 'joyful', 'positive', 'excellent'];
    $negativeWords = ['bad', 'sad', 'angry', 'negative', 'poor'];
    $positives = 0;
    $negatives = 0;

    foreach($positiveWords as $word){
        if(strpos($text, $word) !== false) $positives++;
    }

    foreach($negativeWords as $word){
        if(strpos($text, $word) !== false) $negatives++;
    }

    return $positives > $negatives ? 'Positive' : ($negatives > $positives ? 'Negative' : 'Neutral');
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $target_file = basename($_FILES["fileToUpload"]["name"]);
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $uploadOk = 1;
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "txt" ) {
        echo "Sorry, only TXT files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload file
    } else {
        $content = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
        $analysisResult = sentimentAnalysis($content);
        $stmt = $conn->prepare("INSERT INTO documents (fileName, fileContent) VALUES (?, ?)");
        $stmt->bind_param("ss", $target_file, $content);

        if ($stmt->execute()) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded and analyzed as $analysisResult.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload Document for Sentiment Analysis</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select document to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Document" name="submit">
</form>

</body>
</html>
