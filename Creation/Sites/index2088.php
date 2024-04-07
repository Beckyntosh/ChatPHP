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

// Create table for storing uploaded documents if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS uploaded_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if file is being uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['document'])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["document"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size - limit to 5MB
  if ($_FILES["document"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "pdf" && $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" ) {
    echo "Sorry, only PDF, JPG, JPEG, & PNG files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
      // Insert into database
      $stmt = $conn->prepare("INSERT INTO uploaded_documents (filename) VALUES (?)");
      $stmt->bind_param("s", basename($_FILES["document"]["name"]));
      $stmt->execute();

      echo "The file ". htmlspecialchars( basename( $_FILES["document"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
        }
        form {
            background-color: #fff;
            margin: 50px auto;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0px 0px 10px #aaa;
        }
        input[type=file], input[type=submit] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Upload Document</h2>
        <input type="file" name="document" id="document" required>
        <input type="submit" value="Upload Document" name="submit">
    </form>
</body>
</html>
