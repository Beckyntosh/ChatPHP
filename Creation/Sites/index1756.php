<?php
// Defining database connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Create database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for uploaded documents if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS uploaded_docs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filetype VARCHAR(100) NOT NULL,
    filesize INT(10) UNSIGNED,
    content LONGBLOB NOT NULL,
    upload_time TIMESTAMP
)";
if (!$conn->query($createTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle file upload
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["driver_license"]) && $_FILES["driver_license"]["error"] == 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
        $fileType = $_FILES["driver_license"]["type"];
        if (in_array($fileType, $allowedTypes)) {
            $fileName = $conn->real_escape_string(basename($_FILES['driver_license']['name']));
            $fileTmpName = $_FILES["driver_license"]["tmp_name"];
            $fileSize = $_FILES['driver_license']['size'];
            $binaryContent = file_get_contents($fileTmpName);

            // Escape the file content to store it into MySQL
            $escapedContent = $conn->real_escape_string($binaryContent);

            $insertQuery = "INSERT INTO uploaded_docs (filename, filetype, filesize, content) VALUES ('$fileName', '$fileType', $fileSize, '$escapedContent')";
            
            if (!$conn->query($insertQuery)) {
                $message = "Error uploading file: " . $conn->error;
            } else {
                $message = "File Uploaded Successfully!";
            }
        } else {
            $message = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
        }
    } else {
        $message = "Error: " . $_FILES["driver_license"]["error"];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document Upload</title>
</head>
<body>
    <h1>Upload your Driver's License for Verification</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="driver_license" required>
        <input type="submit" value="Upload">
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>
