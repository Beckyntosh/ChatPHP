<?php
// Database connection
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

// Create upload table if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploads (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
transcription TEXT,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$message = '';

if (isset($_POST['upload'])) {
  $targetDir = "uploads/";
  $fileName = basename($_FILES["file"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

  if (!empty($_FILES["file"]["name"])) {
    // Allow certain file formats
    $allowTypes = array('mp3', 'wav', 'm4a');
    if (in_array($fileType, $allowTypes)) {
      // Upload file to the server
      if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        // Insert file information into the database
        $insert = $conn->query("INSERT into uploads (filename) VALUES ('" . $fileName . "')");
        if ($insert) {
          $message = "The file " . $fileName . " has been uploaded successfully.";
        } else {
          $message = "File upload failed, please try again.";
        }
      } else {
        $message = "Sorry, there was an error uploading your file.";
      }
    } else {
      $message = 'Sorry, only MP3, WAV & M4A files are allowed to upload.';
    }
  } else {
    $message = 'Please select a file to upload.';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Upload for Transcription Service</title>
</head>

<body>
    <h2>Upload Lecture Recording</h2>
    <p><?php echo $message; ?></p>
    <form action="" method="post" enctype="multipart/form-data">
        Select Audio File to Upload:
        <input type="file" name="file" id="fileToUpload">
        <input type="submit" value="Upload Audio" name="upload">
    </form>
</body>

</html>
<?php
$conn->close();
?>
