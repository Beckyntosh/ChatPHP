<?php
// Define database connection parameters
define('DB_SERVER', 'db');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the MySQL database
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Create table for storing vector files info if it doesn't exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS vector_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    original_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$mysqli->query($sqlCreateTable);

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['vectorFile'])) {
    $targetDir = "uploads/";
    $originalName = basename($_FILES["vectorFile"]["name"]);
    $targetFile = $targetDir . uniqid() . '-' . basename($_FILES["vectorFile"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a vector
    if ($fileType != "svg" && $fileType != "ai" && $fileType != "eps") {
        echo "Sorry, only SVG, AI & EPS files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["vectorFile"]["tmp_name"], $targetFile)) {
            // Insert file info into database
            $stmt = $mysqli->prepare("INSERT INTO vector_files (file_name, original_name) VALUES (?, ?)");
            $stmt->bind_param("ss", $targetFile, $originalName);
            $stmt->execute();

            echo "The file " . htmlspecialchars($originalName) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vector File Upload for Design Sharing</title>
</head>
<body>
    <h2>Upload a Vector File for Design Sharing</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select vector file to upload:
        <input type="file" name="vectorFile" id="vectorFile">
        <input type="submit" value="Upload Vector" name="submit">
    </form>
</body>
</html>
