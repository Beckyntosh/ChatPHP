<?php
// Define database connection
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

// Create table for audio files if not exists
$sql = "CREATE TABLE IF NOT EXISTS audio_uploads (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  transcription TEXT,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table audio_uploads created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if file is uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['audioFile'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["audioFile"]["name"]);
  
  // Check if file already exists
  if (!file_exists($target_file)) {
    if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
      // Insert file info into database
      $stmt = $conn->prepare("INSERT INTO audio_uploads (filename) VALUES (?)");
      $stmt->bind_param("s", $target_file);
      if ($stmt->execute()) {
        echo "The file ". htmlspecialchars(basename($_FILES["audioFile"]["name"])) . " has been uploaded.";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $stmt->close();
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  } else {
    echo "Sorry, file already exists.";
  }
}

$conn->close();

// HTML and PHP for file upload
?>
<!DOCTYPE html>
<html>
<head>
  <title>Upload Audio for Transcription</title>
</head>
<body>
  <h2>Audio Upload for Transcription Service</h2>
  <form action="" method="post" enctype="multipart/form-data">
    Select audio file to upload:
    <input type="file" name="audioFile" id="audioFile">
    <input type="submit" value="Upload Audio" name="submit">
  </form>
</body>
</html>
