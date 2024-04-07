<?php
// Connection to the database
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

// Create table for uploaded files if not exists
$table = "CREATE TABLE IF NOT EXISTS uploaded_documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  filepath VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  echo ""; // Success
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // File upload path
  $targetDir = "uploads/";
  $fileName = basename($_FILES["document"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
  
  // Allow certain file formats
  $allowTypes = array('jpg','png','jpeg','gif','pdf');
  if(in_array($fileType, $allowTypes)){
      // Upload file to server
      if(move_uploaded_file($_FILES["document"]["tmp_name"], $targetFilePath)){
          // Insert image file name into database
          $insert = $conn->query("INSERT into uploaded_documents (filename, filepath, upload_time) VALUES ('".$fileName."', '".$targetFilePath."', NOW())");
          if($insert){
              echo "The file ".$fileName. " has been uploaded.";
          }else{
              echo "File upload failed, please try again.";
          } 
      }else{
          echo "Sorry, there was an error uploading your file.";
      }
  }else{
      echo "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload Scanned Document</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <h2>Upload Scanned Document</h2>
    <label for="document">Upload Scanned Document of Driver's License:</label>
    <input type="file" name="document" id="document" required>
    <input type="submit" value="Upload Document" name="submit">
</form>
</body>
</html>
