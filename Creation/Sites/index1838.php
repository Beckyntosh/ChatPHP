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

$sql = "CREATE TABLE IF NOT EXISTS uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table uploads created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["audioFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["audioFile"]["name"]);
    $uploadOk = 1;
    $audioFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if audio file is a actual audio or fake audio
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

    // Allow certain file formats
    if($audioFileType != "mp3" && $audioFileType != "wav" && $audioFileType != "ogg" ) {
        echo "Sorry, only MP3, WAV & OGG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["audioFile"]["name"])). " has been uploaded.";
            $sql = "INSERT INTO uploads (filename) VALUES ('" . htmlspecialchars(basename($_FILES["audioFile"]["name"])) . "')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
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
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Upload Audio for Transcription</title>
        <style>
            body {font-family: Arial, sans-serif; margin: 0 auto; padding: 20px; max-width: 600px;}
            .upload-wrapper {background: #f4f4f4; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
            h2 {color: #333;}
            .upload-btn {display: inline-block; padding: 10px 25px; background: #007bff; color: #fff; text-decoration: none; border-radius: 5px;}
        </style>
    </head>
    <body>
        <div class="upload-wrapper">
            <h2>Upload your lecture recording:</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                Select audio to upload:
                <input type="file" name="audioFile" id="audioFile">
                <input type="submit" value="Upload Audio" name="submit">
            </form>
        </div>
    </body>
</html>
