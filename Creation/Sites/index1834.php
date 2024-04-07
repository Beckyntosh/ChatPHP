<?php
// DB connection
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

// Table creation
$sql = "CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if a file has been uploaded
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['audioFile'])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["audioFile"]["name"]);
    $uploadOk = 1;
    $audioFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["audioFile"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars(basename($_FILES["audioFile"]["name"])). " has been uploaded.";

            // Insert file info into database
            $stmt = $conn->prepare("INSERT INTO audio_uploads (filename, transcription) VALUES (?, ?)");
            $emptyTranscription = ""; // Placeholder for actual transcription to be filled later.
            $stmt->bind_param("ss", $targetFile, $emptyTranscription);
            $stmt->execute();

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
    <title>Upload your Audio for Transcription</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
    Select audio to upload:
    <input type="file" name="audioFile" id="audioFile">
    <input type="submit" value="Upload Audio" name="submit">
</form>

</body>
</html>
