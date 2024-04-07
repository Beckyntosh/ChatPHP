<?php
// Define MySQL connection parameters
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

// Create file upload table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
  // Table is created or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

$message = '';

// Check if file is uploaded
if(isset($_FILES["audioFile"]["name"]) && $_FILES["audioFile"]["name"] != '') {
  $target_dir = "uploads/";
  $fileName = basename($_FILES["audioFile"]["name"]);
  $target_file = $target_dir . $fileName;
  $uploadOk = 1;
  $audioFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  
  // Check if audio file is a actual audio or fake audio
  if(isset($_POST["submit"])) {
    $check = filesize($_FILES["audioFile"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
  }
  
  // Check if file already exists
  if (file_exists($target_file)) {
    $message = "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($audioFileType != "mp3" && $audioFileType != "wav" && $audioFileType != "m4a" ) {
    $message = "Sorry, only MP3, WAV & M4A files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    $message .= " Your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
      $insertSQL = "INSERT INTO audio_uploads (filename) VALUES ('$fileName')";
      if ($conn->query($insertSQL) === TRUE) {
        $message = "The file ". htmlspecialchars( basename( $_FILES["audioFile"]["name"])). " has been uploaded.";
      } else {
        $message = "Sorry, there was an error uploading your file. Error: " . $conn->error;
      }
    } else {
      $message = "Sorry, there was an error uploading your file.";
    }
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Audio for Transcription</title>
<style>
body { font-family: Arial, sans-serif; background-color: #fdf6e3; color: #657b83; }
.container { max-width: 700px; margin: 20px auto; padding: 20px; background-color: #eee8d5; border-radius: 8px; }
h2 { color: #2aa198; }
</style>
</head>
<body>

<div class="container">
  <h2>Audio Upload for Transcription</h2>
  <p>Please choose your audio file (MP3, WAV, M4A) for transcription.</p>
  <?php if($message != ''): ?>
    <p><?php echo $message; ?></p>
  <?php endif; ?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <label>Select audio to upload:</label>
    <input type="file" name="audioFile" id="audioFile" required>
    <br><br>
    <input type="submit" value="Upload Audio" name="submit">
  </form>
</div>

</body>
</html>
