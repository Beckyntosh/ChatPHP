<?php
// Simple script to upload and verify scanned documents for a Furniture Website
// DISCLAIMER: This is a basic example for educational purposes. Make sure to enhance security and error handling before using in production.

// DB connection settings, assuming PDO is available
$servername = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the table for storing uploaded file information if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS uploaded_documents (
        id INT AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

// Handling the file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['document'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["document"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

    // Check if the file is a valid image
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["document"]["tmp_name"], $targetFilePath)){
            // Insert file info into the database
            $sql = $conn->prepare("INSERT INTO uploaded_documents (file_name, file_path) VALUES (?, ?)");
            $sql->execute([$fileName, $targetFilePath]);
            echo "<p>Document uploaded successfully.</p>";
        } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
        }
    } else {
        echo "<p>Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.</p>";
    }
}

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document Upload for Verification</title>
</head>
<body>
    <h2>Upload a Document for Verification</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="document">Select document to upload:</label>
        <input type="file" name="document" id="document" required>
        <input type="submit" value="Upload Document" name="submit">
    </form>
</body>
</html>