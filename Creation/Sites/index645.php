<?php
// Database connection variables
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

// Check if the 'uploads' table exists, and create it if it doesn't
$createUploadsTable = "CREATE TABLE IF NOT EXISTS uploads (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  image_path VARCHAR(255),
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createUploadsTable)) {
  echo "Error creating uploads table: " . $conn->error;
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["screenshot"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["screenshot"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is an actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["screenshot"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check file size
  if ($_FILES["screenshot"]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES["screenshot"]["tmp_name"], $target_file)) {
      // Insert into database
      $insertSQL = "INSERT INTO uploads (user_id, image_path) VALUES (1, '$target_file')";
      if ($conn->query($insertSQL) === TRUE) {
        echo "The file ". htmlspecialchars( basename( $_FILES["screenshot"]["name"])). " has been uploaded.";
      } else {
        echo "Error: " . $insertSQL . "<br>" . $conn->error;
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Screenshot</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4a261; /* sandy brown */
      color: #2a9d8f; /* jungle green */
    }
    .upload-form {
      background-color: #264653; /* charleston green */
      color: #e9c46a; /* orange yellow crayola */
      padding: 20px;
      margin: auto;
      width: 50%;
      border-radius: 8px;
    }
    input[type="file"] {
      margin: 10px 0;
    }
    input[type="submit"] {
      background-color: #2a9d8f; /* jungle green */
      border: none;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 4px;
    }
  </style>
</head>
<body>

<div class="upload-form">
  <h2>Upload Your Watch Screenshot</h2>
  <form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="screenshot" id="screenshot">
    <input type="submit" value="Upload Image" name="submit">
  </form>
</div>

</body>
</html>