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

if(isset($_POST["submit"])){
$file = $_FILES['file']['tmp_name'];
$name = $_FILES['file']['name'];
$path = "uploads/".$name;
move_uploaded_file($file,$path);

$sql = "INSERT INTO products (subtitle_file) VALUES ('$path')";

if ($conn->query($sql) === TRUE) {
  echo "File uploaded successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Bath Products Children's Educational Site</title>
<style>
body {
  background-image: url('beach.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
</style>
</head>
<body>
<h2>Subtitle file upload for Educational Videos</h2>
<form method="post" enctype="multipart/form-data">
    Select Subtitle file to upload:
    <input type="file" name="file" id="fileToUpload"><br><br>
    <input type="submit" value="Upload File" name="submit" style="background-color: #1E90FF; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%;">
</form>
</body>
</html>