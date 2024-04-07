<?php
// File: index.php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS file_archive (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  project_name VARCHAR(255) NOT NULL,
  file_name VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP
)";

if (!$conn->query($table)) {
    die("Error creating table: " . $conn->error);
}

$message = "";

// File upload process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectName = basename($_POST["projectName"]);
    $uploadOk = 1;
    
    // Check if file is a ZIP file
    if(isset($_FILES["zipFile"])) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["zipFile"]["name"]);
        $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
        
        if($fileType != "zip") {
            $message = "Sorry, only ZIP files are allowed.";
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            $message = "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["zipFile"]["tmp_name"], $targetFile)) {
                $message = "The file ". htmlspecialchars(basename($_FILES["zipFile"]["name"])). " has been uploaded.";
                $insertSQL = "INSERT INTO file_archive (project_name, file_name) VALUES (?, ?)";
                $stmt = $conn->prepare($insertSQL);
                $stmt->bind_param("ss", $projectName, $targetFile);
                
                if (!$stmt->execute()) {
                    $message = "There was an error uploading your file.";
                }
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>File Archive Upload</title>
</head>
<body>
<h2>Upload ZIP File for Archiving - Project Alpha</h2>
<p style="color:red;"><?php echo $message; ?></p>
<form action="" method="post" enctype="multipart/form-data">
    <label for="projectName">Project Name:</label>
    <input type="text" name="projectName" id="projectName" required>
    <br><br>
    <label for="zipFile">Select ZIP file to upload:</label>
    <input type="file" name="zipFile" id="zipFile" required>
    <br><br>
    <button type="submit">Upload</button>
</form>
</body>
</html>

<?php $conn->close(); ?>
