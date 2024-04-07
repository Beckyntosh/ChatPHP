<?php

// NOTE: This code is designed for educational purposes and may require adjustments to work in a production environment.

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the table exists, if not, create it
$tableCheckQuery = "CREATE TABLE IF NOT EXISTS audio_transcriptions (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  file_name VARCHAR(255) NOT NULL,
  transcription LONGTEXT,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableCheckQuery)) {
  die("Error creating table: " . $conn->error);
}

// Handle file upload and transcription submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['audioFile'])) {
  $targetDir = "uploads/";
  $fileName = basename($_FILES["audioFile"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

  // Allow certain file formats
  $allowTypes = array('mp3', 'wav', 'm4a');
  if (in_array($fileType, $allowTypes)) {
    // Upload file to the server
    if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $targetFilePath)) {
      $insert = $conn->query("INSERT into audio_transcriptions (file_name) VALUES ('".$fileName."')");
      if ($insert) {
        echo "The file ".$fileName. " has been uploaded successfully.";
      } else {
        echo "File upload failed, please try again.";
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  } else {
    echo "Sorry, only MP3, WAV & M4A files are allowed to upload.";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload Audio for Transcription</title>
</head>
<body>
<h2>Audio Upload for Transcription Service - Hair Care Products Research</h2>
<form action="" method="post" enctype="multipart/form-data">
    Select Audio File to Upload:
    <input type="file" name="audioFile" id="audioFile">
    <input type="submit" value="Upload Audio" name="submit">
</form>
</body>
</html>
