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
$table_sql = "CREATE TABLE IF NOT EXISTS wedding_invitations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if file is being uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['weddingDesign'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["weddingDesign"]["name"]);
  if (move_uploaded_file($_FILES["weddingDesign"]["tmp_name"], $target_file)) {
    $sql = "INSERT INTO wedding_invitations (filename) VALUES ('" . basename($_FILES["weddingDesign"]["name"]) . "')";

    if ($conn->query($sql) === TRUE) {
      echo "The file ". htmlspecialchars(basename($_FILES["weddingDesign"]["name"])). " has been uploaded.";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Wedding Invitation Design</title>
</head>
<body>
    <h2>Upload Your Wedding Invitation Design</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="weddingDesign" id="weddingDesign">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>
