<?php
* 
Note: This is a basic example for educational purposes and might need additional security and functionality improvements before production use.

Ensure your PHP environment is correctly set up to handle file uploads and MySQL connections, and that you've created the necessary database and table as per the schema mentioned in the PHP code below.
*/

// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for audio uploads if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    transcribed_text LONGTEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["audioFile"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["audioFile"]["name"]);
    $uploadOk = 1;
    $audioFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["audioFile"]["size"] > 50000000) { // 50MB limit
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($audioFileType != "mp3" && $audioFileType != "wav" ) {
        echo "Sorry, only MP3 & WAV files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $targetFile)) {
            // Save file info to database
            $sql = $conn->prepare("INSERT INTO audio_uploads (file_name) VALUES (?)");
            $sql->bind_param("s", basename($_FILES["audioFile"]["name"]));
            if($sql->execute()) {
                echo "The file ". htmlspecialchars( basename( $_FILES["audioFile"]["name"])). " has been uploaded.";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Upload for Transcription</title>
</head>
<body>
    <h2>Upload an Audio File for Transcription</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="audioFile">Select audio file to upload:</label>
        <input type="file" name="audioFile" id="audioFile" required>
        <input type="submit" value="Upload Audio" name="submit">
    </form>
</body>
</html>
