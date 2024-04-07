<?php
// Display errors for debugging, remove it in production
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
$tableQuery = "CREATE TABLE IF NOT EXISTS audio_transcriptions (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
filename VARCHAR(255) NOT NULL,
transcription TEXT,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableQuery)) {
  die("Error creating table: " . $conn->error);
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['audioFile'])) {
  $targetDirectory = "uploads/";
  $fileName = basename($_FILES["audioFile"]["name"]);
  $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
  $allowedTypes = array('mp3', 'wav', 'ogg');

  if (in_array($fileType, $allowedTypes)) {
    $newFileName = md5(uniqid()) . '.' . $fileType;
    $targetFilePath = $targetDirectory . $newFileName;

    if(move_uploaded_file($_FILES["audioFile"]["tmp_name"], $targetFilePath)) {
      // Store file info in the database
      $stmt = $conn->prepare("INSERT INTO audio_transcriptions (filename) VALUES (?)");
      $stmt->bind_param("s", $newFileName);

      if ($stmt->execute()) {
        $message = "The file has been uploaded successfully.";
      } else {
        $message = "File upload failed, please try again.";
      }
    } else {
      $message = "Sorry, there was an error uploading your file.";
    }
  } else {
    $message = "Sorry, only MP3, WAV, & OGG files are allowed to upload.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Audio File for Transcription</title>
    <style>
        body{ font-family: "Times New Roman", Times, serif; }
        .container { width: 70%; margin: 20px auto; padding: 20px; border: solid 1px #ddd; }
        h2 { text-align: center; margin-bottom: 20px; }
        form { width: 50%; margin: 0 auto; }
        input[type=file], input[type=submit] { display: block; margin: 10px auto; }
        p.message { text-align: center; color: green; }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload Lecture Recording</h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="audioFile" required>
        <input type="submit" value="Upload Audio" name="submit">
    </form>
    <p class="message"><?= $message; ?></p>
</div>
</body>
</html>
<?php
$conn->close();
?>
