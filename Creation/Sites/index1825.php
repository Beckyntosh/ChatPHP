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

// Create table for storing files information if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
analysis TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if file has been uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Allow certain file formats
  if($fileType != "txt") {
    echo "Sorry, only TXT files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      // File is uploaded successfully, now read the content for analysis
      $fileContent = file_get_contents($target_file);
      
      // Here you should implement the sentiment analysis of the text
      // For simplicity, let's assume we return a dummy analysis
      $analysis = "Positive";

      // Store file and analysis results into database
      $stmt = $conn->prepare("INSERT INTO uploaded_files (filename, analysis) VALUES (?, ?)");
      $stmt->bind_param("ss", $basename, $analysis);

      $basename = basename($_FILES["fileToUpload"]["name"]);
      
      if ($stmt->execute()) {
        echo "The file ". htmlspecialchars($basename). " has been uploaded and analyzed.";
      } else {
        echo "Error storing file info: " . $conn->error;
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
<body>

<h2>Upload Document for Sentiment Analysis</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select document to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Document" name="submit">
</form>

</body>
</html>
