<?php
// Define MySQL connection parameters
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

// Attempt to connect to MySQL database
$mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Create table for audio uploads if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    transcription TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

if (!$mysqli->query($createTable)) {
    die("ERROR: Could not create table. " . $mysqli->error);
}

$message = ""; // Placeholder for messages

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if file was uploaded without errors
    if(isset($_FILES["audioFile"]) && $_FILES["audioFile"]["error"] == 0){
        $allowed = array("mp3" => "audio/mpeg", "wav" => "audio/wav");
        $fileName = $mysqli->real_escape_string($_FILES["audioFile"]["name"]);
        $fileType = $_FILES["audioFile"]["type"];
        $fileSize = $_FILES["audioFile"]["size"];
        
        // Verify file extension
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)){
            $message = "Error: Please select a valid file format.";
        } else{
            // Verify file size - 10MB maximum
            $maxsize = 10 * 1024 * 1024;
            if($fileSize > $maxsize) {
                $message = "Error: File size is larger than the allowed limit.";
            } else{
                // Check whether file exists before uploading it
                if(file_exists("upload/" . $fileName)){
                    $message = $fileName . " already exists.";
                } else{
                    move_uploaded_file($_FILES["audioFile"]["tmp_name"], "upload/" . $fileName);
                    // Insert file info into the database
                    $insert = $mysqli->prepare("INSERT INTO audio_uploads (file_name) VALUES (?)");
                    $insert->bind_param("s", $fileName);
                    if($insert->execute()){
                        $message = "Your file was uploaded successfully.";
                    } else {
                        $message = "File upload failed, please try again." . $mysqli->error;
                    }
                }
            }
        } 
    } else{
        $message = "Error: " . $_FILES["audioFile"]["error"];
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Upload for Transcription</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        form { padding: 20px; background-color: #f4f4f4; margin-top: 20px; }
        h2 { color: #333; }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload a lecture recording for transcription</h2>
    <p><?php echo $message; ?></p>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="audioFile">Upload an audio file (MP3 or WAV):</label>
        <input type="file" name="audioFile" id="audioFile" required>
        <input type="submit" value="Upload">
    </form>
</div>
</body>
</html>
