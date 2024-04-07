
<?php
// Simple configuration
$hostname = 'db';
$username = 'root';
$password = 'root';
$database = 'my_database';

// Connect to MySQL
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for file metadata if not exists
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS psd_files (
  id INT AUTO_INCREMENT PRIMARY KEY,
  file_name VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($tableCreationQuery)) {
  die("Error creating table: " . $conn->error);
}

// Handle file upload
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['psdFile'])) {
  $file = $_FILES['psdFile'];

  // Only allow PSD files
  if($file['type'] == 'image/vnd.adobe.photoshop') {
    $targetDirectory = "uploads/";
    $filePath = $targetDirectory . basename($file["name"]);

    if(move_uploaded_file($file["tmp_name"], $filePath)) {
      // Insert file metadata to database
      $stmt = $conn->prepare("INSERT INTO psd_files (file_name) VALUES (?)");
      $stmt->bind_param("s", $file["name"]);
      $stmt->execute();

      echo "File uploaded successfully";
    } else {
      echo "Error uploading file";
    }
  } else {
    echo "Invalid file type. Only .psd files are allowed.";
  }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Photoshop File Upload</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="psdFile" required>
        <button type="submit">Upload PSD File</button>
    </form>
</body>
</html>

This code snippet showcases a basic upload form for .psd files and a PHP script to process these uploads and save the uploaded file's metadata into a MySQL database. Remember to adapt and expand this code to meet the full requirements of your project, including security measures and error handling.