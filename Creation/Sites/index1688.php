<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Skateboard Audio Transcription Service</title>
</head>
<body>
    <h1>Upload your Audio for Transcription</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select audio to upload:
        <input type="file" name="audioFile" id="audioFile">
        <input type="submit" value="Upload Audio" name="submit">
    </form>
</body>
</html>

<?php
// upload.php

// Database credentials
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table
$tableSql = "CREATE TABLE IF NOT EXISTS audio_transcriptions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableSql)) {
    echo "Error creating table: " . $conn->error;
}

// File upload path
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["audioFile"]["name"]);
$fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

// Check if audio file is an actual audio or fake audio
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["audioFile"]["tmp_name"]);
    if($check !== false) {
        echo "File is an audio - " . $check["mime"] . ".";
        if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["audioFile"]["name"])). " has been uploaded.";
            
            // Insert file info into database
            $stmt = $conn->prepare("INSERT INTO audio_transcriptions (filename) VALUES (?)");
            $stmt->bind_param("s", $filename);
            
            $filename = htmlspecialchars(basename($_FILES["audioFile"]["name"]));
            $stmt->execute();
            $stmt->close();
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an audio.";
    }
}

$conn->close();
?>
