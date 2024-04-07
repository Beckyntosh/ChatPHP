<?php

// Database configuration
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
$tableCheckSql = "SELECT 1 FROM `cad_uploads` LIMIT 1";
if ($conn->query($tableCheckSql) !== TRUE) {
  $createTableSql = "CREATE TABLE cad_uploads (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  if ($conn->query($createTableSql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
  }
}

$message = ''; // Placeholder for messages

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if file was uploaded without errors
  if (isset($_FILES["cad_file"]) && $_FILES["cad_file"]["error"] == 0) {
    $allowed = array("cad" => "application/cad", "dwg" => "image/vnd.dwg");
    $filename = $_FILES["cad_file"]["name"];
    $filetype = $_FILES["cad_file"]["type"];
    $filesize = $_FILES["cad_file"]["size"];
  
    // Verify file extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
  
    // Verify file size - 5MB maximum
    $maxsize = 5 * 1024 * 1024;
    if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
  
    // Verify MYME type of the file
    if (in_array($filetype, $allowed)) {
      // Check whether file exists before uploading it
      if (file_exists("upload/" . $filename)) {
        echo $filename . " is already exists.";
      } else {
        move_uploaded_file($_FILES["cad_file"]["tmp_name"], "upload/" . $filename);
        echo "Your file was uploaded successfully.";

        // Insert file info into the database
        $sql = "INSERT INTO cad_uploads (filename) VALUES ('$filename')";

        if ($conn->query($sql) === TRUE) {
          $message = "File uploaded successfully";
        } else {
          $message = "Database error: " . $conn->error;
        }
      } 
    } else {
      echo "Error: There was a problem uploading your file. Please try again."; 
    }
  } else {
    echo "Error: " . $_FILES["cad_file"]["error"];
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload CAD File for 3D Printing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Peaceful background */
            color: #333;
            text-align: center;
            padding: 50px;
        }
        form {
            margin-top: 20px;
        }
        input[type="file"] {
            margin-bottom: 20px;
        }
        .message {
            color: #008000;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Upload Your CAD File for 3D Printing</h2>
    <p>Please upload the CAD files for your gardening tools here. We accept .cad and .dwg formats.</p>
    <div class="message"><?php echo $message; ?></div>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <input type="file" name="cad_file" id="cad_file">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>