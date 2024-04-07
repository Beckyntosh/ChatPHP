<?php

// Enable error display for debugging (remove or modify for production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

$mysqlHost = 'db';
$mysqlUsername = 'root';
$mysqlPassword = 'root';
$mysqlDatabase = 'my_database';

// Establish a MySQL connection
$connection = new mysqli($mysqlHost, $mysqlUsername, $mysqlPassword, $mysqlDatabase);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create table 'audio_uploads' if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    original_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$connection->query($createTable)) {
    die("Error creating table: " . $connection->error);
}

$message = '';

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['audioFile'])) {
    $uploadDirectory = "uploads/";
    $fileName = basename($_FILES["audioFile"]["name"]);
    $targetFilePath = $uploadDirectory . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Check if file is an audio file
    if(in_array($fileType, ['mp3', 'wav', 'm4a'])) {
        // Upload file to server
        if(move_uploaded_file($_FILES["audioFile"]["tmp_name"], $targetFilePath)) {
            // Insert file info into the database
            $stmt = $connection->prepare("INSERT INTO audio_uploads (original_name, file_path) VALUES (?, ?)");
            $stmt->bind_param("ss", $fileName, $targetFilePath);
            if($stmt->execute()) {
                $message = "The file ".$fileName. " has been uploaded.";
            } else {
                $message = "Database error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    } else {
        $message = "Sorry, only MP3, WAV & M4A files are allowed.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Audio Upload for Transcription</title>
</head>
<body>

<h2>Upload Audio File for Transcription</h2>
<p><?= $message; ?></p>
<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    Select audio file to upload:
    <input type="file" name="audioFile" id="audioFile">
    <button type="submit">Upload File</button>
</form>

</body>
</html>
<?php
$connection->close();
?>
