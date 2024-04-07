<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS archived_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP
)";

if (!$conn->query($tableQuery)) {
    die("Error creating table: " . $conn->error);
}

// PHP script to handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['zipFile'])) {
    $projectName = mysqli_real_escape_string($conn, $_POST['projectName']);
    $fileName = mysqli_real_escape_string($conn, $_FILES['zipFile']['name']);
    $fileTmpName = $_FILES['zipFile']['tmp_name'];
    $fileType = $_FILES['zipFile']['type'];
    
    // Make sure the file is a zip file
    if ($fileType == 'application/zip') {
        // Move the uploaded file to the server directory
        $targetDir = "uploads/";
        $targetFilePath = $targetDir . basename($fileName);

        if (move_uploaded_file($fileTmpName, $targetFilePath)) {
            // Insert file information into the database
            $insertQuery = "INSERT INTO archived_files (project_name, file_name, upload_time) VALUES ('$projectName', '$fileName', NOW())";

            if ($conn->query($insertQuery)) {
                echo "The file has been uploaded successfully and archived.";
            } else {
                echo "There was an error uploading your file.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Only ZIP files are allowed.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload ZIP File for Archiving</title>
    <style>
        body {
            font-family: 'Ada Lovelace', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        input[type="file"], input[type="submit"] {
            margin: 20px;
        }
    </style>
</head>
<body>
    <h2>Upload ZIP File for Project Archive</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Project Name:</label>
        <input type="text" name="projectName" required>
        <br>
        <label>Select ZIP File to Upload:</label>
        <input type="file" name="zipFile" required>
        <br>
        <input type="submit" value="Upload Archive" name="submit">
    </form>
</body>
</html>
