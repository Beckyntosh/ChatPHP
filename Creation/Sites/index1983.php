<?php
// Connection to MySQL Database
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

// Create table for storing uploaded files if not exists
$table = "CREATE TABLE IF NOT EXISTS uploaded_photos (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
uploaded_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photoshopFile'])) {
    $target_dir = "uploads/";
    $file = $_FILES["photoshopFile"]["name"];
    $path = pathinfo($file);
    $filename = $path['filename'];
    $ext = $path['extension'];
    $temp_name = $_FILES['photoshopFile']['tmp_name'];
    $path_filename_ext = $target_dir.$filename.".".$ext;
   
    // Check if file already exists
    if (file_exists($path_filename_ext)) {
     echo "Sorry, file already exists.";
    } else {
     move_uploaded_file($temp_name, $path_filename_ext);
     echo "Congratulations! File Uploaded Successfully.";

     // Insert file information into the database
     $sql = "INSERT INTO uploaded_photos (filename) VALUES ('$filename.$ext')";
     if ($conn->query($sql) === TRUE) {
       echo "File information saved in database.";
     } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
     }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photoshop File Upload for Image Editing</title>
</head>
<body>
    <h2>Upload Your Photoshop (PSD) File for Editing</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="photoshopFile" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
