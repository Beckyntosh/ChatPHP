<?php
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

// Create table for uploaded documents if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Table created successfully or already exists
} else {
  die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['document'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["document"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["document"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["document"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
      $sql = "INSERT INTO uploaded_documents (filename) VALUES ('" . basename($_FILES["document"]["name"]). "')";
      if ($conn->query($sql) === TRUE) {
        echo "The file ". htmlspecialchars( basename( $_FILES["document"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
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
    <title>Upload Scanned Document</title>
</head>
<body>

<h2>Upload Scanned Document - Driver's License</h2>

<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="document" id="document">
  <input type="submit" value="Upload Document" name="submit">
</form>

</body>
</html>
