<?php
// Database connection
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

// Create table for uploaded files if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
analysis_result TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table uploaded_files created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

function analyzeText($text) {
    // Dummy sentiment analysis function
    $positiveKeywords = ['love', 'happy', 'joyful', 'beautiful', 'excited'];
    $negativeKeywords = ['hate', 'sad', 'angry', 'ugly', 'bored'];
  
    $text = strtolower($text);
    $positiveScore = 0;
    $negativeScore = 0;
  
    foreach ($positiveKeywords as $word) {
        if (strpos($text, $word) !== false) {
            $positiveScore++;
        }
    }
  
    foreach ($negativeKeywords as $word) {
        if (strpos($text, $word) !== false) {
            $negativeScore++;
        }
    }
  
    return $positiveScore - $negativeScore;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

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
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      $fileContent = file_get_contents($target_file);
      $analysisResult = analyzeText($fileContent);
      $filename = basename($_FILES["fileToUpload"]["name"]);

      $stmt = $conn->prepare("INSERT INTO uploaded_files (filename, analysis_result) VALUES (?, ?)");
      $stmt->bind_param("ss", $filename, $analysisResult);

      if ($stmt->execute()) {
        echo "File uploaded and analyzed successfully.";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  <h2>Upload a file for Sentiment Analysis:</h2>
  <label for="fileToUpload">Select file to upload:</label>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>
