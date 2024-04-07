<?php
// Initialize MySQL connection
$servername = "db";
$database = "my_database";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Execute when a POST request with a file is made
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["audioFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["audioFile"]["name"]);
    move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file);

    // Placeholder for transcription logic
    $transcript = "Dummy Transcription for " . $_FILES["audioFile"]["name"];

    $sql = "INSERT INTO transcriptions (filename, transcription) VALUES (?, ?)";

    $stmt= $conn->prepare($sql);
    $stmt->bind_param("ss", $_FILES["audioFile"]["name"], $transcript);
    $stmt->execute();
    echo "File uploaded and transcribed successfully.";
}

// Create the transcriptions table if not exists
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS transcriptions (
                        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        filename VARCHAR(50) NOT NULL,
                        transcription TEXT NOT NULL,
                        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                        )";

if ($conn->query($tableCreationQuery) === TRUE) {
  // echo "Table transcriptions created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Audio Upload for Transcription</title>
</head>
<body>
    <h2>Upload Audio File for Transcription</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select audio file to upload:
        <input type="file" name="audioFile" id="audioFile">
        <input type="submit" value="Upload Audio" name="submit">
    </form>
</body>
</html>
<?php
$conn->close();
?>