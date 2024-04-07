<?php
// Set the connection parameters
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

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS audio_uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(50),
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Success
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["audioFile"])) {
    $target_dir = "uploads/";
    $fileName = basename($_FILES["audioFile"]["name"]);
    $target_file = $target_dir . $fileName;
    if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO audio_uploads (filename) VALUES (?)");
        $stmt->bind_param("s", $fileName);
        if($stmt->execute()) {
            echo "The file ". htmlspecialchars($fileName). " has been uploaded.";
        } else {
            echo "There was an error uploading your file.";
        }
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Audio Upload for Transcription</title>
</head>
<body>

<h2>Upload Audio for Transcription</h2>
<form action="" method="post" enctype="multipart/form-data">
    Select audio to upload:
    <input type="file" name="audioFile" id="audioFile">
    <input type="submit" value="Upload Audio" name="submit">
</form>

</body>
</html>
