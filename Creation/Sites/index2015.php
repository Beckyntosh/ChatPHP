<?php
// Simple Vector File Upload for Design Sharing - PHP & MySQL
// Note: This is a minimalist example. In a production environment, enhance security and error handling.

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

// Create table if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS vector_designs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    uploaded_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === FALSE) {
  echo "Error creating table: " . $conn->error;
}

function uploadFile($conn) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is a design - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not a design.";
      $uploadOk = 0;
    }
  }
  
  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "svg" && $imageFileType != "ai" && $imageFileType != "eps") {
    echo "Sorry, only SVG, AI & EPS files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      $sql = "INSERT INTO vector_designs (file_name) VALUES ('" . basename($_FILES["fileToUpload"]["name"]) . "')";

      if ($conn->query($sql) === TRUE) {
        echo "File uploaded successfully";
      } else {
        echo "Error uploading file: " . $conn->error;
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
  uploadFile($conn);
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Minimalist Vector File Upload</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select design to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Design" name="submit">
</form>

</body>
</html>
