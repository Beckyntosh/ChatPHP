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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS printing_service (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
file_name VARCHAR(255) NOT NULL,
upload_time DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
status VARCHAR(50) DEFAULT 'pending',
UNIQUE KEY unique_file (file_name)
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// File upload handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
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
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

      // Insert into database
      $stmt = $conn->prepare("INSERT INTO printing_service (file_name) VALUES (?)");
      $stmt->bind_param("s", basename($_FILES["fileToUpload"]["name"]));
      $stmt->execute();
      
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
<title>File Upload for Printing Services</title>
<style>
body {background-color: #f2f2f2; font-family: 'Times New Roman', Times, serif;}
form {background-color: #ffffff; margin: auto; padding: 20px; border: 1px solid #888; width: 50%;}
</style>
</head>
<body>

<h2>Wedding Invitation Design Upload</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
