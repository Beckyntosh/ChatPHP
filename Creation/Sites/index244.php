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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
id INT AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  die("Error creating table: " . $conn->error);
}

$message = ''; // Empty message to be filled based on upload status

if (isset($_FILES['photoshopFile']['name'])) {
  $filename = $_FILES['photoshopFile']['name'];
  $destination = 'uploads/' . $filename;
  // Ensure file is a Photoshop file
  $extension = pathinfo($filename, PATHINFO_EXTENSION);
  if (!in_array(strtolower($extension), ['psd'])) {
    $message = 'Upload failed. Only PSD files are allowed.';
  } else {
    // Move the uploaded file to the uploads folder
    if (move_uploaded_file($_FILES['photoshopFile']['tmp_name'], $destination)) {
      $sql = "INSERT INTO uploaded_files (filename) VALUES ('$filename')";
      if ($conn->query($sql) === TRUE) {
        $message = 'File uploaded successfully.';
      } else {
        $message = 'Database error: ' . $conn->error;
      }
    } else {
      $message = 'Upload failed. Server error.';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Image Editing Platform - Upload</title>
<style>
body {
  font-family: Arial, sans-serif;
}
form {
  margin: 20px auto;
  width: 300px;
  padding: 10px;
  border: 1px solid #ccc;
}
input[type="file"] {
  font-size: 16px;
}
input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px;
  font-size: 16px;
  cursor: pointer;
  border-radius: 5px;
}
input[type="submit"]:hover {
  background-color: #45a049;
}
</style>
</head>
<body>
<div class="container">
  <h2>Upload a Photoshop File for Editing</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div>
      <input type="file" name="photoshopFile" required>
    </div>
    <div>
      <input type="submit" value="Upload">
    </div>
  </form>
  <p><?= $message; ?></p>
</div>
</body>
</html>
<?php $conn->close(); ?>