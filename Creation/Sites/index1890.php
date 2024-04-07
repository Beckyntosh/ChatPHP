<?php
// Database configuration
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create table if doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS project_archives (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$connection->query($sql)) {
    die("Error creating table: " . $connection->error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['zipArchive'])) {
    $projectName = $connection->real_escape_string($_POST['projectName']);
    $zipFile = $_FILES['zipArchive'];

    if ($zipFile['type'] != 'application/zip') {
        die('Only ZIP files are allowed.');
    }

    $targetDir = "uploads/";
    $fileName = basename($zipFile['name']);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($zipFile['tmp_name'], $targetFilePath)) {
        $sql = "INSERT INTO project_archives (project_name, file_name) VALUES ('$projectName', '$fileName')";
        if (!$connection->query($sql)) {
            die("Error saving file info to database: " . $connection->error);
        }
        echo "<p>File uploaded successfully.</p>";
    } else {
        echo "<p>There was an error uploading your file.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload ZIP Archive</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
            padding: 20px;
        }
        form {
            background-color: #fff;
            border: 1px solid #ddd;
            display: inline-block;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 8px #b0b0b0;
        }
        input[type=file], input[type=text] {
            margin-bottom: 10px;
        }
        input[type=submit] {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Upload Project Archive (ZIP Only)</h2>
<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="projectName" required placeholder="Project Name">
    <input type="file" name="zipArchive" accept=".zip">
    <input type="submit" value="Upload Archive">
</form>

</body>
</html>
