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

// Create Game Saves Table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS game_saves (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
  echo "Error creating table: " . $conn->error;
}

// Handle File Upload
$message = '';
if (isset($_POST['upload'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    $message = "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  if($imageFileType != "sav") {
    $message = "Sorry, only SAV files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    $message = "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      // Insert into database
      $sql = $conn->prepare("INSERT INTO game_saves (filename) VALUES (?)");
      $sql->bind_param("s", $target_file);
      if ($sql->execute()) {
        $message = "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        $message = "Sorry, there was an error uploading your file.";
      }
    } else {
      $message = "Sorry, there was an error uploading your file.";
    }
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Game Save File Upload</title>
<style>
body {font-family: Arial, sans-serif; background: #f0f8ff; color: #333;}
.container {max-width: 450px; margin: 20px auto; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,.1);}
form {display: flex; flex-direction: column;}
input[type=file], input[type=submit] {margin: 10px 0;}
</style>
</head>
<body>

<div class="container">
<h2>Upload Game Save File</h2>
<p style="color: red;"><?php echo $message; ?></p>
<form action="" method="post" enctype="multipart/form-data">
  Select game save file to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="upload">
</form>
</div>

</body>
</html>
