<?php
// Database Configuration
$dbServerName = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Establishing Connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Table for Audio Files if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS AudioTranscriptions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT DEFAULT NULL,
    uploaded_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle File Upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["audioFile"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["audioFile"]["name"]);
    $uploadOk = 1;
    $audioFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if upload is a actual audio or fake audio
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

    // Check file size - 10MB maximum
    if ($_FILES["audioFile"]["size"] > 10000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($audioFileType != "mp3" && $audioFileType != "wav" && $audioFileType != "ogg" ) {
        echo "Sorry, only MP3, WAV & OGG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $targetFile)) {
            $filename = basename($_FILES["audioFile"]["name"]);
            $sql = "INSERT INTO AudioTranscriptions (filename) VALUES ('$filename')";

            if ($conn->query($sql) === TRUE) {
                echo "The file ". htmlspecialchars($filename). " has been uploaded.";
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
<html>
<head>
    <title>Audio Upload for Transcription</title>
</head>
<body>
    <h2>Upload Lecture Recording for Transcription</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select an audio file to upload:
        <input type="file" name="audioFile" id="audioFile">
        <input type="submit" value="Upload Audio" name="submit">
    </form>
</body>
</html>
