<?php
// Database connection attributes
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

// Create table for storing uploaded files' details if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
id INT AUTO_INCREMENT PRIMARY KEY,
file_name VARCHAR(255) NOT NULL,
analysis_result TEXT,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Function to analyze text sentiment (dummy implementation)
function analyzeSentiment($text) {
    // Dummy sentiment analysis result
    return "Positive";
}

// Handling file upload and analysis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadOk = 1;
    if (isset($_FILES["fileToAnalyze"])) {
        $target_file = basename($_FILES["fileToAnalyze"]["name"]);
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file is a "txt" file
        if($fileType != "txt" ) {
            echo "Sorry, only TXT files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Read file content
            $text = file_get_contents($_FILES["fileToAnalyze"]["tmp_name"]);
            
            // Analyze the sentiment of the text
            $result = analyzeSentiment($text);
            
            // Store file details and analysis result into database
            $stmt = $conn->prepare("INSERT INTO uploaded_files (file_name, analysis_result) VALUES (?, ?)");
            $stmt->bind_param("ss", $target_file, $result);
            $stmt->execute();
            
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToAnalyze"]["name"])). " has been uploaded and analyzed.";
        }
    } else {
        echo "No file uploaded.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload a Text File for Sentiment Analysis</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select a text file to upload:
  <input type="file" name="fileToAnalyze" id="fileToAnalyze">
  <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>
