<?php
// DB connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Table creation
$table_sql = "CREATE TABLE IF NOT EXISTS UploadedDocuments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP
)";

if (!$conn->query($table_sql) === TRUE) {
  die("Error creating table: " . $conn->error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is an actual image or fake image
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $message = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      $insert_sql = "INSERT INTO UploadedDocuments (filename) VALUES ('" . basename( $_FILES["fileToUpload"]["name"]) . "')";
      if (!$conn->query($insert_sql) === TRUE) {
        $message = "Error: " . $sql . "<br>" . $conn->error;
      }
    } else {
      $message = "Sorry, there was an error uploading your file.";
    }
  } else {
    $message = "File is not a scanned document.";
    $uploadOk = 0;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload Scanned Document</title>
</head>
<body>

<h2>Upload Scanned Driver's License for Verification</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<?php echo $message; ?>

</body>
</html>

<?php
$conn->close();
?>
