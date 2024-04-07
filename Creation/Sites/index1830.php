<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Create table for audio files if it does not exist
$table = "CREATE TABLE IF NOT EXISTS audio_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    reg_date TIMESTAMP
)";
if (!$conn->query($table)) {
    echo "Error creating table: " . $conn->error;
}

// Handling the file upload
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["audioFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["audioFile"]["name"]);
    $uploadOk = 1;
    $audioFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if audio file is a actual audio
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["audioFile"]["tmp_name"]);
        if($check !== false) {
            echo "File is not an audio - " . $check["mime"] . ".";
            $uploadOk = 0;
        }
    }

    // Check file size - 5MB maximum
    if ($_FILES["audioFile"]["size"] > 5000000) {
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
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
            $filename = basename($_FILES["audioFile"]["name"]);
            // Store the file name into database
            $sql = "INSERT INTO audio_files (filename) VALUES ('$filename')";
            if ($conn->query($sql) === TRUE) {
                echo "The file ". htmlspecialchars( basename( $_FILES["audioFile"]["name"])). " has been uploaded.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Audio Upload for Transcription</title>
</head>
<body>
    <h2>Upload Lecture Recording for Transcription</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select audio to upload:
        <input type="file" name="audioFile" id="audioFile">
        <input type="submit" value="Upload Audio" name="submit">
    </form>
</body>
</html>
<?php
$conn->close();
?>
