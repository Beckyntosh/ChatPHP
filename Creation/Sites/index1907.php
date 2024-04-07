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

// Create table for uploaded files if not exists
$fileTable = "CREATE TABLE IF NOT EXISTS uploaded_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($fileTable)) {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["zipFile"])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["zipFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if ($fileType == "zip") {
        // Check if file was uploaded without errors
        if (move_uploaded_file($_FILES["zipFile"]["tmp_name"], $targetFilePath)) {
            // Insert file info into the database
            $sql = $conn->prepare("INSERT INTO uploaded_files (filename) VALUES (?)");
            $sql->bind_param("s", $fileName);

            if ($sql->execute()) {
                echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
            } else {
                echo "There was an error uploading your file. " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only ZIP files are allowed.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive Upload</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0e8d9;
            font-family: Arial, sans-serif;
        }
        form {
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Upload ZIP File for Archiving</h2>
        <input type="file" name="zipFile" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
