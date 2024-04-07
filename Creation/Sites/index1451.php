<?php
// Server and database configuration
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

// Create table for vector file uploads if it does not exist
$table = "CREATE TABLE IF NOT EXISTS vector_uploads (
          id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          filename VARCHAR(255) NOT NULL,
          uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
        )";

if (!$conn->query($table)) {
  die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['vectorFile'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["vectorFile"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "svg" && $imageFileType != "eps") {
      echo "Sorry, only SVG & EPS files are allowed.";
      $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["vectorFile"]["tmp_name"], $target_file)) {
          // Store uploaded details
          $stmt = $conn->prepare("INSERT INTO vector_uploads (filename) VALUES (?)");
          $stmt->bind_param("s", $target_file);
          $stmt->execute();

          echo "The file ". htmlspecialchars( basename( $_FILES["vectorFile"]["name"])). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vector File Upload for Design Sharing</title>
</head>
<body>
    <h2>Upload a Vector File</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select vector file to upload:
        <input type="file" name="vectorFile" id="vectorFile">
        <input type="submit" value="Upload Vector" name="submit">
    </form>
</body>
</html>
<?php
$conn->close();
?>
