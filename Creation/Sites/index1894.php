<?php
// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS project_archives (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL,
    archive_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableSql)) {
    die("Error creating table: " . $conn->error);
}

$message = '';

// Handle File Upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["zipFile"])) {
        $projectName = basename($_POST["projectName"]);
        $targetDir = "uploads/";
        $fileName = basename($_FILES["zipFile"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Allow certain file formats
        if ($fileType !== "zip") {
            $message = "Sorry, only ZIP files are allowed.";
        } else {
            // Upload file to server
            if (move_uploaded_file($_FILES["zipFile"]["tmp_name"], $targetFilePath)) {
                // Insert file info into the database
                $insert = $conn->query("INSERT INTO project_archives (project_name, archive_name) VALUES ('".$projectName."', '".$fileName."')");
                if ($insert) {
                    $message = "The file ". htmlspecialchars($fileName). " has been uploaded.";
                } else {
                    $message = "File upload failed, please try again.";
                }
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload ZIP Archive</title>
</head>
<body>
<h2>Project Archive Upload</h2>
<p><?php echo $message; ?></p>
<form action="" method="post" enctype="multipart/form-data">
    Project Name: <input type="text" name="projectName" required>
    <br><br>
    Select ZIP file to upload:
    <input type="file" name="zipFile" required>
    <br><br>
    <input type="submit" value="Upload Project Archive" name="submit">
</form>
</body>
</html>
