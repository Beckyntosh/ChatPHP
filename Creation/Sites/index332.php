<?php
// Connect to MySQL
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

// Create table for avatar if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS user_avatars (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) NOT NULL,
  avatar_name VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    // Check if image file is an actual image or fake image
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
  
  // Check file size - 5MB Maximum
  if ($_FILES["fileToUpload"]["size"] > 5000000) {
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
  // If everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      // Insert into database
      $sql = "INSERT INTO user_avatars (user_id, avatar_name)
      VALUES ('1', '".$conn->real_escape_string(basename($_FILES["fileToUpload"]["name"]))."')";
      
      if ($conn->query($sql) === TRUE) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
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
<head>
<title>Upload your Avatar</title>
</head>
<body style="font-family: 'Courier New', monospace; background-color: #f0f0f0;">
<h2>Sherlock Holmes Craft Beers - Avatar Upload</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>