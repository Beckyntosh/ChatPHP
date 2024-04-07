<?php
// Database configuration
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

// Table creation for uploads if not exists
$sql = "CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["audio"]) && $_FILES["audio"]["error"] == 0) {
        $allowed = array("mp3" => "audio/mpeg", "wav" => "audio/wav");
        $filename = $_FILES["audio"]["name"];
        $filetype = $_FILES["audio"]["type"];
        $filesize = $_FILES["audio"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MIME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $filename)) {
                echo $filename . " is already exists.";
            } else {
                move_uploaded_file($_FILES["audio"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";

                // Insert file info into the database
                $sql = "INSERT INTO audio_uploads (filename) VALUES ('$filename')";

                if ($conn->query($sql) === TRUE) {
                    echo "File uploaded successfully.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.";
        }
    } else {
        echo "Error: " . $_FILES["audio"]["error"];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload Audio for Transcription</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select audio to upload:
  <input type="file" name="audio" id="audio">
  <input type="submit" value="Upload Audio" name="submit">
</form>

</body>
</html>