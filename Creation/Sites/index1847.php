<?php
// Define database connection parameters
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if table 'audio_uploads' exists, create if not
$tableCheckQuery = "SHOW TABLES LIKE 'audio_uploads'";
$result = $conn->query($tableCheckQuery);
if ($result->num_rows == 0) {
    $createTableQuery = "CREATE TABLE audio_uploads (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        original_name VARCHAR(255) NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        status ENUM('pending', 'processing', 'complete') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    if (!$conn->query($createTableQuery)) {
        die("Error creating table: " . $conn->error);
    }
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['audio_file'])) {
    // Handle file upload
    $targetDir = "uploads/";
    $originalName = basename($_FILES["audio_file"]["name"]);
    $targetFile = $targetDir . uniqid() . '_' . $originalName;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check file type (only accept audio files)
    if (!in_array($fileType, ['mp3', 'wav', 'ogg'])) {
        echo "Sorry, only MP3, WAV & OGG files are allowed.";
        return;
    }

    // Try to upload file
    if (move_uploaded_file($_FILES["audio_file"]["tmp_name"], $targetFile)) {
        // Insert file information into database
        $query = $conn->prepare("INSERT INTO audio_uploads (original_name, file_path) VALUES (?, ?)");
        $query->bind_param("ss", $originalName, $targetFile);
        if ($query->execute()) {
            echo "The file ". htmlspecialchars($originalName). " has been uploaded.";
        } else {
            echo "Error uploading file to the database: " . $query->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Audio Upload for Transcription</title>
</head>
<body>
<h2>Upload Lecture Recording for Transcription</h2>
<form action="" method="post" enctype="multipart/form-data">
    Select audio to upload:
    <input type="file" name="audio_file" id="audio_file">
    <input type="submit" value="Upload Audio" name="submit">
</form>
</body>
</html>
<?php
$conn->close();
?>
