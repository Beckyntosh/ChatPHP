<?php
// Database connection
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

// Create artwork table if it does not exist
$createTableSql = "CREATE TABLE IF NOT EXISTS artwork (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_name VARCHAR(255) NOT NULL,
artwork_name VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
image_path VARCHAR(1000) NOT NULL,
reg_date TIMESTAMP
)";
if ($conn->query($createTableSql) === TRUE) {
  echo "Table artwork created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// File upload path
$target_dir = "uploads/";
$uploadOk = 1;

// Handle file upload
if(isset($_POST["submit"])) {
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $artist_name = $conn->real_escape_string($_POST['artist_name']);
    $artwork_name = $conn->real_escape_string($_POST['artwork_name']);
    $description = $conn->real_escape_string($_POST['description']);
    $sql = "INSERT INTO artwork (artist_name, artwork_name, description, image_path) VALUES ('$artist_name', '$artwork_name', '$description', '$target_file')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Gallery Entry</title>
</head>
<body>
<h1>Upload Artwork</h1>
<form action="" method="post" enctype="multipart/form-data">
    Artist Name: <input type="text" name="artist_name" required><br>
    Artwork Name: <input type="text" name="artwork_name" required><br>
    Description: <textarea name="description" required></textarea><br>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" required>
    <input type="submit" value="Upload Artwork" name="submit">
</form>
</body>
</html>