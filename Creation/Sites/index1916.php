<?php

// Database connection
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

// Table creation
$table = "CREATE TABLE IF NOT EXISTS project_archives (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255) NOT NULL,
    archive_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
    echo "Table project_archives created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["zipFile"])) {
    $projectName = $_POST['projectName'];
    $targetDir = "uploads/";
    $fileName = basename($_FILES["zipFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["zipFile"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO project_archives (project_name, archive_name) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $projectName, $fileName);
        if ($stmt->execute()) {
            echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ZIP File Upload for Archiving</title>
    <style>
        body { background-color: #333; color: #ddd; font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; background: #222; border-radius: 8px; }
        label, input, button { display: block; width: 100%; margin: 10px 0; }
        input, button { padding: 10px; }
        input { background: #555; border: 1px solid #444; color: #ddd; }
        button { background: #555; color: #fff; border: none; cursor: pointer; }
        button:hover { background: #666; }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload ZIP File for Project Archiving</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="projectName">Project Name:</label>
        <input type="text" id="projectName" name="projectName" required>
        <label for="zipFile">Select ZIP file to upload:</label>
        <input type="file" id="zipFile" name="zipFile" accept=".zip" required>
        <button type="submit">Upload File</button>
    </form>
</div>
</body>
</html>
