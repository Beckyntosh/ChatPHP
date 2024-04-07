<?php
// Simple script to handle Photoshop file upload and store the file information in a database for an Image Editing Platform.
// This example is for educational purposes and needs adjustments and enhancements for a production environment.

// Database connection settings
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
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS photoshop_files (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    filename VARCHAR(255) NOT NULL, 
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($tableCreationQuery)) {
  die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photoshopFile'])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["photoshopFile"]["name"]);
    move_uploaded_file($_FILES["photoshopFile"]["tmp_name"], $targetFile);

    // Insert file information into database
    $stmt = $conn->prepare("INSERT INTO photoshop_files (filename) VALUES (?)");
    $stmt->bind_param("s", $_FILES["photoshopFile"]["name"]);
    
    if ($stmt->execute()) {
        echo "File uploaded and saved successfully.";
    } else {
        echo "Error saving file information.";
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photoshop File Upload for Image Editing Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        .upload-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        input[type="file"] {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Upload Your Photoshop Files for Editing</h1>
    <form class="upload-form" action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="photoshopFile" required>
        <button type="submit">Upload File</button>
    </form>
</body>
</html>
