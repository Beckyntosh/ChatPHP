<?php
// Configure error reporting to show errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database configuration
define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
define('MYSQL_SERVER', 'db');
define('MYSQL_USER', 'root');

// Connect to the database
$mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_ROOT_PSWD, MYSQL_DB);
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Check if table exists, if not create one
$tableCheckQuery = "SHOW TABLES LIKE 'project_archives'";
$result = $mysqli->query($tableCheckQuery);
if ($result->num_rows == 0) {
    $createTableQuery = "CREATE TABLE project_archives (
        id INT AUTO_INCREMENT PRIMARY KEY,
        project_name VARCHAR(255),
        archive_name VARCHAR(255),
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if (!$mysqli->query($createTableQuery)) {
        die('Error creating table: ' . $mysqli->error);
    }
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['zip_file'])) {
    $projectName = $mysqli->real_escape_string($_POST['project_name']);
    $fileName = $mysqli->real_escape_string($_FILES['zip_file']['name']);

    // Define upload path
    $uploadDir = __DIR__ . '/uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    $uploadFile = $uploadDir . basename($_FILES['zip_file']['name']);

    if (move_uploaded_file($_FILES['zip_file']['tmp_name'], $uploadFile)) {
        // File is valid and was successfully uploaded
        $insertQuery = "INSERT INTO project_archives (project_name, archive_name) VALUES ('$projectName', '$fileName')";
        if ($mysqli->query($insertQuery) === TRUE) {
            echo "File is uploaded and information stored successfully.";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $mysqli->error;
        }
    } else {
        echo "Possible file upload attack!\n";
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ZIP File Upload for Archiving</title>
</head>
<body>
    <h2>Upload ZIP File for Archive - Project Alpha Documents</h2>
    <form method="POST" enctype="multipart/form-data">
        <div>
            <label for="project_name">Project Name:</label>
            <input type="text" id="project_name" name="project_name" required>
        </div>
        <div>
            <label for="zip_file">Select a ZIP file:</label>
            <input type="file" id="zip_file" name="zip_file" accept=".zip" required>
        </div>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
