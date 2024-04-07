<?php
// Set database connection parameters
define("DB_SERVERNAME", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "my_database");

// Connect to MySQL Database
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["backupFile"])) {
    // Handle file upload
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["backupFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a SQL file
    if ($fileType != "sql") {
        echo "Sorry, only SQL files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["backupFile"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["backupFile"]["name"])) . " has been uploaded.";
            // Execute SQL file for restoration
            $command = "mysql -u" . DB_USERNAME . " -p" . DB_PASSWORD . " " . DB_NAME . " < " . $targetFile;
            if (system($command) === FALSE) {
                echo "Error while restoring database";
            } else {
                echo "Database has been successfully restored.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database Backup Upload</title>
</head>
<body>
    <h2>Upload Database Backup File for Restoration</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select database backup file to upload:
        <input type="file" name="backupFile" id="backupFile">
        <input type="submit" value="Upload Backup" name="submit">
    </form>
</body>
</html>
<?php $connection->close(); ?>