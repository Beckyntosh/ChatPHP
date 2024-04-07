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

// Check if table exists, if not, create it
$tableCheckSql = "SHOW TABLES LIKE 'vector_files'";
$result = $conn->query($tableCheckSql);

if ($result->num_rows == 0) {
    $sql = "CREATE TABLE vector_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) !== TRUE) {
      echo "Error creating table: " . $conn->error;
    }
}

$uploadStatus = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_FILES["vectorFile"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["vectorFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
      $uploadStatus = "Sorry, file already exists.";
      $uploadOk = 0;
    }

    // Check file size - 2MB max
    if ($_FILES["vectorFile"]["size"] > 2000000) {
      $uploadStatus = "Sorry, your file is too large.";
      $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "svg" && $imageFileType != "ai" && $imageFileType != "eps") {
      $uploadStatus = "Sorry, only SVG, AI, and EPS files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $uploadStatus .= " Your file was not uploaded.";
    } else {
      if (move_uploaded_file($_FILES["vectorFile"]["tmp_name"], $targetFile)) {
        $filename = basename($_FILES["vectorFile"]["name"]);
        
        // Insert into database
        $sql = "INSERT INTO vector_files (filename, filepath) VALUES ('$filename', '$targetFile')";

        if ($conn->query($sql) === TRUE) {
          $uploadStatus = "The file ". htmlspecialchars( $filename). " has been uploaded.";
        } else {
          $uploadStatus = "Sorry, there was an error uploading your file.";
        }
      } else {
        $uploadStatus = "Sorry, there was an error uploading your file.";
      }
    }
  }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vector File Upload</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 800px; margin: auto; padding: 20px; }
        .upload-form { margin-top: 20px; }
        .status { margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Vector File for Design Sharing</h2>
        <p>Please upload your vector file (SVG, AI, EPS):</p>
        
        <div class="upload-form">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="vectorFile" id="vectorFile">
                <input type="submit" value="Upload File" name="submit">
            </form>
        </div>
        
        <div class="status">
            <?php echo $uploadStatus; ?>
        </div>
    </div>
</body>
</html>