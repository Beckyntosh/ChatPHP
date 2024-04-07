<?php
// Handle database connection
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

// Create table if not exists to store zip file details
$createTable = "CREATE TABLE IF NOT EXISTS zip_archives (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY unique_filename (filename)
)";

if (!$conn->query($createTable)) {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_FILES["zipfile"]) && $_FILES["zipfile"]["error"] == 0) {
    $allowed = array("zip" => "application/zip");
    $filename = $_FILES["zipfile"]["name"];
    $filetype = $_FILES["zipfile"]["type"];
    $filesize = $_FILES["zipfile"]["size"];
  
    // Verify file extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
    // Verify file size - 5MB maximum
    $maxsize = 5 * 1024 * 1024;
    if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
  
    // Verify MYME type of the file
    if (in_array($filetype, $allowed)) {
      // Check whether file exists before uploading it
      if (file_exists("upload/" . $filename)) {
        echo $filename . " is already exists.";
      } else {
        move_uploaded_file($_FILES["zipfile"]["tmp_name"], "upload/" . $filename);
        echo "Your file was uploaded successfully.";

        // Add file info to database
        $stmt = $conn->prepare("INSERT INTO zip_archives (filename) VALUES (?)");
        $stmt->bind_param("s", $filename);
    
        if ($stmt->execute()) {
          echo "File Info Saved in Database.";
        } else {
          echo "Error saving file info: " . $conn->error;
        }
        $stmt->close();
      } 
    } else {
      echo "Error: There was a problem uploading your file. Please try again."; 
    }
  } else {
    echo "Error: " . $_FILES["zipfile"]["error"];
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload ZIP File for Archiving</title>
</head>
<body>
  <form action="uploadZip.php" method="post" enctype="multipart/form-data">
    <h2>Upload a ZIP File for Project Alpha</h2>
    <label for="fileSelect">Filename:</label>
    <input type="file" name="zipfile" id="fileSelect">
    <input type="submit" value="Upload">
    <p><strong>Note:</strong> Only .zip formats are allowed up to a max size of 5 MB.</p>
  </form>
</body>
</html>
