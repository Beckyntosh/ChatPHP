<?php
// Connect to database
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

// Create table for uploads if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
  echo "Table audio_uploads created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["audioFile"]["name"])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["audioFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('mp3', 'wav', 'm4a');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["audioFile"]["tmp_name"], $targetFilePath)){
            // Insert file name into database
            $insert = $conn->query("INSERT into audio_uploads (filename) VALUES ('".$fileName."')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only MP3, WAV, M4A files are allowed to upload.';
    }
} else {
    $statusMsg = 'Please select a file to upload.';
}

// Close database connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Audio Upload for Transcription Service</title>
    <style>
        .container {
            width: 50%;
            margin: auto;
            padding-top: 20px;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload a Lecture Recording for Transcription</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <label for="audioFile">Select audio file (MP3, WAV, M4A):</label>
            <input type="file" name="audioFile" id="audioFile" required>
            <input type="submit" value="Upload Audio" name="submit">
            <br><br>
            <?php if (!empty($statusMsg)) {
                echo '<p>'.$statusMsg.'</p>';
            } ?>
        </form>
    </div>
</body>
</html>
