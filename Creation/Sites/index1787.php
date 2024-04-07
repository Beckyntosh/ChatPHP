<?php
// Set database connection
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
$createTable = "CREATE TABLE IF NOT EXISTS audio_transcriptions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
transcription TEXT,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["audioFile"]["name"]);
  $uploadOk = 1;
  $audioFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if audio file is an actual audio
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["audioFile"]["tmp_name"]);
    if($check !== false) {
      echo "File is an audio - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an audio.";
      $uploadOk = 0;
    }
  }
  
  // Check file size
  if ($_FILES["audioFile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($audioFileType != "mp3" && $audioFileType != "wav") {
    echo "Sorry, only MP3 & WAV files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["audioFile"]["name"])). " has been uploaded.";
      // Insert file information into database
      $sql = $conn->prepare("INSERT INTO audio_transcriptions (filename) VALUES (?)");
      $sql->bind_param("s", $target_file);
      $sql->execute();
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

<form action="" method="post" enctype="multipart/form-data">
  Select audio to upload:
  <input type="file" name="audioFile" id="audioFile">
  <input type="submit" value="Upload Audio" name="submit">
</form>

</body>
</html>
