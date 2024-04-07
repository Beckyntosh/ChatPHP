<?php

/*
 * Simple Database Backup Upload Script for Restoration or Storage
 * Note: This script is for educational/demo purposes. Security and error handling are minimal.
 * Ensure proper security measures in a production environment.
 */

// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["backupFile"])) {
    $uploadDir = "uploads/";
    $uploadFile = $uploadDir . basename($_FILES["backupFile"]["name"]);

    if (move_uploaded_file($_FILES["backupFile"]["tmp_name"], $uploadFile)) {
        echo "The file " . htmlspecialchars(basename($_FILES["backupFile"]["name"])) . " has been uploaded.";

        // Restoring the database from the uploaded file
        $command = "mysql -h " . DB_SERVER . " -u " . DB_USERNAME . " -p" . DB_PASSWORD . " " . DB_NAME . " < " . $uploadFile;
        system($command, $output);

        if ($output === 0) {
            echo "Database restoration successful.";
        } else {
            echo "Database restoration failed.";
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
    <title>Database Backup Upload for Restoration</title>
</head>
<body>
    <h2>Upload Database Backup</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select backup file to upload:
        <input type="file" name="backupFile" id="backupFile">
        <input type="submit" value="Upload Backup" name="submit">
    </form>
</body>
</html>