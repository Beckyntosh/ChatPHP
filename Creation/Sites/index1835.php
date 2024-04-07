<?php
// Simple PHP script for uploading audio files and saving information in a MySQL database

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("MySQL connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS `audio_transcriptions` (
  `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `filename` VARCHAR(255) NOT NULL,
  `upload_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` ENUM('uploaded', 'processing', 'completed') DEFAULT 'uploaded'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if (!$conn->query($tableSql)) {
  die("Error creating table: " . $conn->error);
}

$message = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["audioFile"]["name"]);
    $uploadOk = 1;
    $audioFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if audio file is a actual audio or fake audio
    if(isset($_POST["submit"])) {
        // Check file size - Limit 5MB
        if ($_FILES["audioFile"]["size"] > 5000000) {
            $message = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($audioFileType != "mp3" && $audioFileType != "wav" && $audioFileType != "ogg" ) {
            $message = "Sorry, only MP3, WAV & OGG files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $message = "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
                $message = "The file ". htmlspecialchars( basename( $_FILES["audioFile"]["name"])). " has been uploaded.";
                // Insert into database
                $stmt = $conn->prepare("INSERT INTO audio_transcriptions (filename, status) VALUES (?, 'uploaded')");
                $stmt->bind_param("s", $filename);
                
                // set parameters and execute
                $filename = htmlspecialchars(basename($_FILES["audioFile"]["name"]));
                $stmt->execute();
                
                $stmt->close();
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        }
    }
}

$conn->close();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Skateboards Audio Transcription Upload</title>
  </head>
  <body>
    <h2>Upload Audio File for Transcription</h2>
    <p><?php echo $message; ?></p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
      Select audio file to upload:
      <input type="file" name="audioFile" id="audioFile">
      <input type="submit" value="Upload Audio" name="submit">
    </form>
  </body>
</html>
