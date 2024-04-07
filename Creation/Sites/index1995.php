<?php
// Connect to MySQL database
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

// Create table for uploaded files if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['photoshopFile'])) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $file = $_FILES['photoshopFile'];
        $target_file = $target_dir . basename($file["name"]);
        
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            // Insert file information into database
            $stmt = $conn->prepare("INSERT INTO uploaded_files (filename, file_path) VALUES (?, ?)");
            $stmt->bind_param("ss", $file["name"], $target_file);
            $stmt->execute();

            echo "The file ". htmlspecialchars(basename($file["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photoshop File Upload</title>
</head>
<body>
    <h2>Upload a Photoshop file for editing</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="photoshopFile" id="photoshopFile">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>
