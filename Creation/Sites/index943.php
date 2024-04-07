<?php
// Establish connection parameters
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

// Create table for storing file information if not exists
$sql = "CREATE TABLE IF NOT EXISTS files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(30) NOT NULL,
hash VARCHAR(128) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table files created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error . "<br>";
}

function hashFile($filename) {
  return hash('sha256', file_get_contents($filename));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $hash = hashFile($_FILES["fileToUpload"]["tmp_name"]);

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists. <br>";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded. <br>";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars(basename( $_FILES["fileToUpload"]["name"])). " has been uploaded. <br>";

      // Save file info in the database
      $sql = "INSERT INTO files (filename, hash) VALUES ('" . basename($_FILES["fileToUpload"]["name"]) . "', '" . $hash . "')";
      if ($conn->query($sql) === TRUE) {
        echo "File info stored successfully<br>";
      } else {
        echo "Error storing file info: " . $conn->error . "<br>";
      }
    } else {
      echo "Sorry, there was an error uploading your file. <br>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload Form</title>
</head>
<body>
<h2>Upload File</h2>
<form action="index.php" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>
</body>
</html>
<?php
$conn->close();
?>
