<?php
// Handle the database connection
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for avatars if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS user_avatars (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($createTable)) {
  die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Check if file is uploaded
  if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
    $allowedTypes = array('jpg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');
    $fileType = $_FILES['avatar']['type'];
    $fileSize = $_FILES['avatar']['size'];
    
    // Verify file type
    if (!in_array($fileType, $allowedTypes)) {
      die("Error: Invalid file type.");
    }
    
    // Verify file size (< 5MB)
    if ($fileSize > 5000000) {
      die("Error: File size is larger than the allowed limit.");
    }
    
    // Save file
    $uploadPath = 'uploads/' . basename($_FILES['avatar']['name']);
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadPath)) {
      // Insert file info into database
      $filename = basename($_FILES['avatar']['name']);
      $insertSQL = "INSERT INTO user_avatars (filename) VALUES ('$filename')";
      if (!$conn->query($insertSQL)) {
        die("Error saving file info to database: " . $conn->error);
      }
      echo "File uploaded successfully.";
    } else {
      die("Error uploading file.");
    }
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Avatar Upload</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        form { max-width: 300px; margin: 50px auto; padding: 20px; background-color: #ffffff; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        input[type="file"] { margin-bottom: 10px; }
        input[type="submit"] { background-color: #007bff; color: #ffffff; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <h2>Upload Avatar</h2>
        <input type="file" name="avatar" required>
        <input type="submit" value="Upload">
    </form>
</body>
</html>