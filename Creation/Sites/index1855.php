<?php

// Database connection
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

// Handling file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $audioFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if audio file is a actual audio or fake audio
    if(isset($_POST["submit"])) {
        $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an audio - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an audio.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
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
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            
            // Save file name to the database
            $filename = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
            $sql = "INSERT INTO audio_uploads (filename) VALUES ('$filename')";
            if ($conn->query($sql) === TRUE) {
                echo "The file name also stored in database successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
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
<body>

<h2>Upload Audio for Transcription</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  Select audio to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Audio" name="submit">
</form>

</body>
</html>
