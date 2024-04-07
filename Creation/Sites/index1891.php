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

// Creating a table for storing file metadata if not exists
$sql = "CREATE TABLE IF NOT EXISTS project_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(30) NOT NULL,
    file_name VARCHAR(100) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

function uploadFile($projectName, $file) {
    global $servername, $username, $password, $dbname;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $fileName = $conn->real_escape_string($file['name']);
    $sql = "INSERT INTO project_files (project_name, file_name) VALUES ('$projectName', '$fileName')";

    if ($conn->query($sql) === TRUE) {
        echo "File uploaded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['zip_file'])) {
    $projectName = $_POST['project_name'];
    $zipFile = $_FILES['zip_file'];

    // Process upload
    if ($zipFile['type'] == 'application/zip') {
        $destination = 'uploads/' . basename($zipFile['name']);

        if (move_uploaded_file($zipFile['tmp_name'], $destination)) {
            uploadFile($projectName, $zipFile);
        } else {
            echo "Failed to upload file.";
        }
    } else {
        echo "Please upload a ZIP file.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Archive Upload</title>
</head>
<body>
    <h2>Welcome to the Funny Magazine Project Archive!</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="project_name">Project Name:</label><br>
        <input type="text" id="project_name" name="project_name" required><br>
        <label for="zip_file">Upload ZIP File:</label><br>
        <input type="file" id="zip_file" name="zip_file" accept=".zip" required><br><br>
        <input type="submit" value="Upload Archive">
    </form>
</body>
</html>
