<?php
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
$sql = "CREATE TABLE IF NOT EXISTS audio_transcriptions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
    $conn->close();
    exit;
}

$transcription = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["audioFile"])) {
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["audioFile"]["name"]);
    $uploadOk = 1;
    $audioFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if audio file is a actual audio or fake audio
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["audioFile"]["tmp_name"]);
        if($check !== false) {
            echo "File is not an audio - " . $check["mime"] . ".";
            $uploadOk = 0;
        }
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
        if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
            // File uploaded successfully
            // Placeholder for transcription service
            $transcription = "Example Transcription Placeholder"; // Implement actual transcription logic
            // Save transcription info to database
            $stmt = $conn->prepare("INSERT INTO audio_transcriptions (filename, transcription) VALUES (?, ?)");
            $stmt->bind_param("ss", $target_file, $transcription);
            $stmt->execute();

            echo "The file ". htmlspecialchars(basename($_FILES["audioFile"]["name"])). " has been uploaded and transcribed.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Upload for Transcription</title>
</head>
<body>
    <h2>Upload Audio File for Transcription</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        Select audio to upload:
        <input type="file" name="audioFile" id="audioFile">
        <input type="submit" value="Upload Audio" name="submit">
    </form>
</body>
</html>
