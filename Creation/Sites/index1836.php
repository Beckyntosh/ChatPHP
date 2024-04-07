<?php

// Set up database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for storing audio files info if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS audio_uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
file_path VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}


// Handling the audio file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_FILES["audioFile"])) {
    $target_directory = "uploads/";
    $target_file = $target_directory . basename($_FILES["audioFile"]["name"]);
    $uploadOk = 1;
    $audioFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if audio file is a actual audio or fake audio
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["audioFile"]["tmp_name"]);
      if($check !== false) {
        echo "File is not an audio - " . $check["mime"] . ".";
        $uploadOk = 0;
      }
    }

    // Check file size - let's limit to 10MB
    if ($_FILES["audioFile"]["size"] > 10000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($audioFileType != "mp3" && $audioFileType != "wav" && $audioFileType != "m4a") {
      echo "Sorry, only MP3, WAV & M4A files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
        // Insert file information into database
        $sql = "INSERT INTO audio_uploads (filename, file_path) VALUES ('" . basename($_FILES["audioFile"]["name"]) . "', '" . $target_file . "')";
        
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
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body style="font-weight:bold;">

<h2>Audio Upload for Transcription Service</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  Select audio to upload:
  <input type="file" name="audioFile" id="audioFile">
  <input type="submit" value="Upload Audio" name="submit">
</form>

</body>
</html>
