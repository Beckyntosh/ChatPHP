<?php
/**
 * Simple Secure Hashing Implementation for a Bedding Website
 * This script handles file uploads, hashes them for integrity checks, and stores file metadata in MySQL.
 */

// Database connection settings
define("MYSQL_HOST", "db");
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");

// Connect to the Database
try {
    $pdo = new PDO("mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    
    // Create table if it does not exist
    $pdo->exec(
        "CREATE TABLE IF NOT EXISTS file_hashes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            filename VARCHAR(255) NOT NULL,
            hash VARCHAR(255) NOT NULL,
            upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB;"
    );
} catch (PDOException $e) {
    die("Could not connect to the database " . MYSQL_DATABASE . ": " . $e->getMessage());
}

$errorMessage = "";

// Handle file upload and hashing
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        $errorMessage = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $errorMessage = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif") {
        $errorMessage = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $errorMessage = "Sorry, your file was not uploaded. " . $errorMessage;
    } else {
        // Hash the file content
        $fileContent = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
        $fileHash = hash('sha256', $fileContent);

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            // Store file metadata and hash in the database
            $stmt = $pdo->prepare("INSERT INTO file_hashes (filename, hash) VALUES (?, ?)");
            $stmt->execute([basename($_FILES["fileToUpload"]["name"]), $fileHash]);
            $errorMessage = "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            $errorMessage = "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure File Upload for Bedding Website</title>
</head>
<body>
    <h2>Upload a File</h2>
    <p><?php echo $errorMessage; ?></p>
    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>