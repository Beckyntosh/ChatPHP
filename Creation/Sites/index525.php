<?php
// Simple Secure Data Hashing and Integrity Check Example for a Vitamins Website

// Database credentials
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS vitamin_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    hash VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
    die("Error creating table: " . $conn->error);
}

// Function to securely hash file content
function hashFileContent($fileContent)
{
    return hash('sha256', $fileContent);  // Using SHA-256 for hashing
}

// Process the file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $target_file = basename($_FILES["fileToUpload"]["name"]);
    
    // Check if file is a actual file or fake file
    if (isset($_POST["submit"])) {
        $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $fileContent = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
            $hashedContent = hashFileContent($fileContent);

            // Save file info into the database
            $stmt = $conn->prepare("INSERT INTO vitamin_files (filename, hash) VALUES (?, ?)");
            $stmt->bind_param("ss", $target_file, $hashedContent);
            $stmt->execute();
            $stmt->close();

            echo "File is an actual file - " . $_FILES["fileToUpload"]["name"] . ".";
        } else {
            echo "File is not an actual file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vitamins Website - Secure File Upload</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 40px; }
        .container { background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        form { display: flex; flex-direction: column; }
        input[type="file"] { margin-bottom: 20px; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload a File</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>
</div>
</body>
</html>