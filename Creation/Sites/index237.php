<?php
// Simple script for CAD File Upload for 3D Printing Services in PHP
// Frontend and backend in one file for simplicity. A production environment should separate these concerns.

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for CAD files if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS cad_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
)";
if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["cadFile"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["cadFile"]["name"]);
  $uploadOk = 1;

  // Check file size
  if ($_FILES["cadFile"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if ($fileType != "stl" && $fileType != "obj" && $fileType != "cad") {
    echo "Sorry, only STL, OBJ & CAD files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["cadFile"]["tmp_name"], $target_file)) {
      // Save to database
      $stmt = $conn->prepare("INSERT INTO cad_files (filename) VALUES (?)");
      $stmt->bind_param("s", $filename);
      
      $filename = htmlspecialchars(basename($_FILES["cadFile"]["name"]));
      $stmt->execute();
      
      echo "The file ". htmlspecialchars(basename($_FILES["cadFile"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload CAD File for 3D Printing</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f1f1f1; color: #333;}
        .container { max-width: 500px; margin: 50px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        input[type=file], input[type=submit] { margin-top: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload a CAD File for 3D Printing</h2>
    <p>Please upload your CAD file (STL, OBJ, CAD). Maximum file size: 5MB.</p>
    
    <form action="" method="post" enctype="multipart/form-data">
        <label for="cadFile">Select file to upload:</label>
        <input type="file" name="cadFile" id="cadFile">
        <input type="submit" value="Upload File" name="submit">
    </form>
</div>

</body>
</html>
