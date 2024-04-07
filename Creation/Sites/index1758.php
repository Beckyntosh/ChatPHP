<?php
// Set connection variables
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
$sql = "CREATE TABLE IF NOT EXISTS scanned_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table scanned_documents created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['document'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["document"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is an actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["document"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["document"]["size"] > 5000000) {
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
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["document"]["name"])). " has been uploaded.";
      // Insert file name into database
      $sql = "INSERT INTO scanned_documents (filename) VALUES ('" . $target_file . "')";
      if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
<body>

<h2>Upload Scanned Document (Driver's License)</h2>

<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="document" id="document">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
