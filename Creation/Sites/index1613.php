<?php
// Connect to the database
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS audio_uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["audioFile"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["audioFile"]["name"]);
  $uploadOk = 1;
  $audioFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Allow certain file formats
  if($audioFileType != "mp3" && $audioFileType != "wav" && $audioFileType != "m4a") {
    echo "Sorry, only MP3, WAV & M4A files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk != 0) {
    if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
      $sql = "INSERT INTO audio_uploads (filename) VALUES ('" . basename($_FILES["audioFile"]["name"]) . "')";
      if ($conn->query($sql) === TRUE) {
        echo "The file ". htmlspecialchars( basename( $_FILES["audioFile"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Audio Upload for Transcription | Sporting Goods Website</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: lavenderblush;
            color: darkred;
            text-align: center;
            padding: 20px;
        }
        input[type="file"] {
            margin-top: 20px;
        }
        input[type="submit"] {
            margin-top: 10px;
            background-color: darkred;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: red;
        }
    </style>
</head>
<body>
    <h1>Upload Your Lecture Recording for Transcription</h1>
    <form action="" method="post" enctype="multipart/form-data">
        Select audio to upload:
        <input type="file" name="audioFile" id="audioFile">
        <input type="submit" value="Upload Audio" name="submit">
    </form>
</body>
</html>
