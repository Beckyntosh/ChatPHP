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

$sql = "CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    transcription TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table audio_uploads created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['audioFile'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["audioFile"]["name"]);
        if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
            $sql = $conn->prepare("INSERT INTO audio_uploads (filename) VALUES (?)");
            $sql->bind_param("s", $target_file);
            if ($sql->execute()) {
                echo "The file ". htmlspecialchars(basename($_FILES["audioFile"]["name"])). " has been uploaded and is being transcribed.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Audio for Transcription</title>
</head>
<body>

<h2>Audio Upload for Transcription</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select audio to upload:
  <input type="file" name="audioFile" id="audioFile">
  <input type="submit" value="Upload Audio" name="submit">
</form>

</body>
</html>
