<?php
// Simple PHP script for Audio Upload for Transcription Service
// Note: This is a basic demonstration. Enhancements like error handling, security measures (e.g., file type validation), and performance optimizations should be applied for production use.

// Database connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL Database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the 'uploads' table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(30) NOT NULL,
    filepath VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP
)";
if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle the file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size - limit set to 50MB
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Insert file information into database
            $stmt = $conn->prepare("INSERT INTO uploads (filename, filepath) VALUES (?, ?)");
            $stmt->bind_param("ss", $filename, $filepath);
            
            $filename = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
            $filepath = htmlspecialchars($target_file);
            
            if(!$stmt->execute()) {
                echo "Error: " . $stmt->error;
            } else {
                echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
            }
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
    <title>Audio Upload for Transcription Service</title>
</head>
<body>

<h2>Upload Audio File for Transcription</h2>
<form action="audio_upload.php" method="post" enctype="multipart/form-data">
  Select audio file to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Audio" name="submit">
</form>

</body>
</html>
