<?php
// Connect to the database
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

// Create table for storing file metadata if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS archive_uploads (
  id INT AUTO_INCREMENT PRIMARY KEY,
  file_name VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if file is received
  if (isset($_FILES["zipfile"]["name"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["zipfile"]["name"]);
    
    // Validate file is a ZIP
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($fileType != "zip") {
        echo "Sorry, only ZIP files are allowed.";
        exit;
    }
    
    // Upload file to server
    if (move_uploaded_file($_FILES["zipfile"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["zipfile"]["name"])). " has been uploaded.";
      
      // Save file info in the database
      $stmt = $conn->prepare("INSERT INTO archive_uploads (file_name) VALUES (?)");
      $stmt->bind_param("s", $_FILES["zipfile"]["name"]);
      $stmt->execute();
      
      echo " File info saved in database.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload ZIP Archive</title>
</head>
<body>

<h2>Upload Project Archive (ZIP file only)</h2>

<form action="" method="post" enctype="multipart/form-data">
  Select a ZIP file to upload:
  <input type="file" name="zipfile" id="zipfile">
  <input type="submit" value="Upload Archive" name="submit">
</form>

</body>
</html>
