<?php
// Include MySQL config file
// Assuming this section to have constants for MySQL connection
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Simple database connection
$mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create table for storing driver's licenses if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS scanned_docs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$mysqli->query($createTable)) {
    echo "Error creating table: " . $mysqli->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["scannedDocument"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["scannedDocument"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if the file is an actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["scannedDocument"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["scannedDocument"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
    && $fileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["scannedDocument"]["tmp_name"], $targetFile)) {
            // Insert file info into database
            $stmt = $mysqli->prepare("INSERT INTO scanned_docs (file_name) VALUES (?)");
            $stmt->bind_param("s", basename($_FILES["scannedDocument"]["name"]));
            if ($stmt->execute()) {
                echo "The file ". htmlspecialchars( basename( $_FILES["scannedDocument"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Scanned Document</title>
    <style>
        body { font-family: Arial, sans-serif; }
    </style>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
    <h2>Upload a Scanned Copy of Your Driver's License</h2>
    <p>Select image to upload:</p>
    <input type="file" name="scannedDocument" id="scannedDocument">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
