<?php
// Connection settings
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

// Create table for uploaded documents if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS uploaded_documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  file_path VARCHAR(255) NOT NULL,
  uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle file uploads
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["document"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["document"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
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
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
      // Insert file info into the database
      $stmt = $conn->prepare("INSERT INTO uploaded_documents (filename, file_path) VALUES (?, ?)");
      $stmt->bind_param("ss", basename($_FILES["document"]["name"]), $target_file);
      $stmt->execute();

      echo "The file ". htmlspecialchars( basename( $_FILES["document"]["name"])). " has been uploaded.";
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
  <title>Scanned Document Upload</title>
</head>
<body>

<h2>Upload Scanned Document</h2>
<form action="index.php" method="post" enctype="multipart/form-data">
  Select document to upload:
  <input type="file" name="document" id="document">
  <input type="submit" value="Upload Document" name="submit">
</form>

</body>
</html>
