<?php
// Handle the database connection
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS scans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Keeping this empty as per instruction, normally you may want to notify the user of successful operation.
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle File Upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['scanned_doc'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["scanned_doc"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is an actual image or fake image
  $check = getimagesize($_FILES["scanned_doc"]["tmp_name"]);
  if($check !== false) {
    move_uploaded_file($_FILES["scanned_doc"]["tmp_name"], $target_file);
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  // Insert into database
  if ($uploadOk == 1) {
    $sql = "INSERT INTO scans (filename) VALUES ('$target_file')";

    if ($conn->query($sql) === TRUE) {
      echo "The file ". htmlspecialchars( basename( $_FILES["scanned_doc"]["name"])). " has been uploaded.";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload Scanned Document</h2>

<form action="" method="post" enctype="multipart/form-data">
  Select a scanned document to upload:
  <input type="file" name="scanned_doc" id="scanned_doc">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
