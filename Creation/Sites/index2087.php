<?php
// Database configuration
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

// Create documents table if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS scanned_documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($createTableSql);

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["document"]["name"])) {
  $targetDir = "uploads/";
  $fileName = basename($_FILES["document"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

  // Allow certain file formats
  $allowTypes = array('jpg', 'png', 'jpeg', 'pdf');
  if (in_array($fileType, $allowTypes)) {
    // Upload file to the server
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFilePath)) {
      // Insert file information into the database
      $insert = $conn->query("INSERT INTO scanned_documents (filename) VALUES ('" . $fileName . "')");
      if ($insert) {
        echo "The file " . $fileName . " has been uploaded successfully.";
      } else {
        echo "File upload failed, please try again.";
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  } else {
    echo "Sorry, only JPG, JPEG, PNG, & PDF files are allowed to upload.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Scanned Document</title>
</head>
<body>
<h2>Upload Scanned Driver's License for Verification</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select document to upload:
  <input type="file" name="document" id="document">
  <input type="submit" value="Upload Document" name="submit">
</form>
</body>
</html>
