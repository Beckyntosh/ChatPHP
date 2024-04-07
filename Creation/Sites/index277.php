<?php
// Database configuration
define('MYSQL_HOST', 'db');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', 'root');
define('MYSQL_DB', 'my_database');

// Connect to MySQL database
$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for firmware uploads if not exists
$createTable = "CREATE TABLE IF NOT EXISTS `firmware_uploads` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `filename` VARCHAR(255) NOT NULL,
  `uploaded_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
if (!$conn->query($createTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['firmware'])) {
    $filename = $conn->real_escape_string($_FILES['firmware']['name']);
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["firmware"]["name"]);

    // Attempt to upload file
    if (move_uploaded_file($_FILES["firmware"]["tmp_name"], $targetFile)) {
        $insertQuery = "INSERT INTO firmware_uploads (filename) VALUES ('$filename')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "<script>alert('Firmware uploaded successfully!');</script>";
        } else {
            echo "<script>alert('Error uploading firmware!');</script>";
        }
    } else {
        echo "<script>alert('There was an error uploading your file.');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Firmware Upload for IoT Devices</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            text-align: center;
        }
        form {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            max-width: 500px;
        }
        input[type=file], input[type=submit] {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h2>Toy IoT Firmware Upload</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="firmware">Choose firmware to upload:</label><br>
        <input type="file" id="firmware" name="firmware" required><br>
        <input type="submit" value="Upload Firmware">
    </form>
</body>
</html>