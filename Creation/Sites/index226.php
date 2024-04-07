<?php
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

// Create table for storing file info if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($tableSql);

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['zipFile'])) {
        $file = $_FILES['zipFile'];
        
        if ($file['type'] != 'application/zip') {
            $message = 'Please upload a ZIP file.';
        } else {
            $uploadPath = 'uploads/';
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            $filePath = $uploadPath . basename($file['name']);
            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                $sql = $conn->prepare("INSERT INTO uploads (filename, file_path) VALUES (?, ?)");
                $sql->bind_param("ss", $file['name'], $filePath);
                
                if ($sql->execute()) {
                    $message = "File uploaded and saved successfully.";
                } else {
                    $message = "Failed to save file info into the database.";
                }
            } else {
                $message = 'Failed to upload file.';
            }
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload ZIP for Archiving</title>
</head>
<body>

<form method="post" enctype="multipart/form-data">
    <label for="zipFile">Upload a ZIP file for archiving:</label>
    <input type="file" id="zipFile" name="zipFile" accept=".zip">
    <button type="submit">Upload</button>
</form>

<div><?php echo $message; ?></div>

</body>
</html>