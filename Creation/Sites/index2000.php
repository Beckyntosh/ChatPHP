<?php
// Simple Photoshop file upload and image edit platform for Fitness Equipment Website
// Frontend & backend in a single file for simplicity, not recommended for production

// Database Connection
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

// Create table for uploads if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS image_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// File upload logic
$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if file is uploaded
    if (isset($_FILES['photoshopFile']) && $_FILES['photoshopFile']['error'] == 0) {
        $allowed = ['psd' => 'application/octet-stream'];
        $fileName = $_FILES['photoshopFile']['name'];
        $fileType = $_FILES['photoshopFile']['type'];

        // Verify file extension
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Save file
        $newName = uniqid() . '.' . $ext;
        $destination = 'uploads/' . $newName;

        if (!move_uploaded_file($_FILES['photoshopFile']['tmp_name'], $destination)) {
            $message = 'File upload failed';
        } else {
            $message = 'File uploaded successfully';
            $sql = "INSERT INTO image_uploads (filename) VALUES ('$newName')";

            if (!$conn->query($sql) === TRUE) {
                $message = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        $message = 'Error in file upload';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photoshop File Upload for Image Editing</title>
    <style>
        body { font-family: Arial, sans-serif; }
        form { margin: 20px; }
        input[type="file"] { margin-top: 20px; }
        button { margin-top: 10px; }
    </style>
</head>
<body>
    <h2>Upload Photoshop File for Image Editing</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input type="file" name="photoshopFile">
        <button type="submit">Upload</button>
    </form>

    <?php if ($message) echo "<p>$message</p>"; ?>
</body>
</html>
