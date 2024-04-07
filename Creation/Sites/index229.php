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
$tableSql= "CREATE TABLE IF NOT EXISTS magazine_archives (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  file_name VARCHAR(255) NOT NULL,
  file_path VARCHAR(255) NOT NULL,
  upload_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

function uploadArchive($conn) {
    if (isset($_FILES['zip_file'])) {
        $errors = [];
        $file_name = $_FILES['zip_file']['name'];
        $file_size = $_FILES['zip_file']['size'];
        $file_tmp = $_FILES['zip_file']['tmp_name'];
        $file_type = $_FILES['zip_file']['type'];
        $file_ext = strtolower(end(explode('.',$_FILES['zip_file']['name'])));

        $extensions = array("zip");

        if (in_array($file_ext, $extensions)=== false) {
          $errors[] = "Extension not allowed, please choose a ZIP file.";
        }

        if ($file_size > 20971520) {
          $errors[] = 'File size must be exactly 20 MB';
        }

        if (empty($errors)==true) {
          $path = "uploads/" . $file_name;
          move_uploaded_file($file_tmp, $path);
          $stmt = $conn->prepare("INSERT INTO magazine_archives (file_name, file_path) VALUES (?, ?)");
          $stmt->bind_param("ss", $file_name, $path);
          $stmt->execute();
          echo "Success";
        } else {
          print_r($errors);
        }
    } 
}

// HTML and PHP code for the form
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload ZIP Archive</title>
</head>
<body>
    <h2>Upload ZIP File</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="zip_file" required>
        <input type="submit" value="Upload">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    uploadArchive($conn);
}

$conn->close();
?>