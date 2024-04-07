<?php

// Database connection
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

// Create table for email attachments if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS email_attachments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filetype VARCHAR(100) NOT NULL,
    filesize INT(10) NOT NULL,
    content LONGBLOB NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
  die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["attachment"])) {
  $filename = $conn->real_escape_string($_FILES["attachment"]["name"]);
  $filetype = $conn->real_escape_string($_FILES["attachment"]["type"]);
  $filesize = intval($_FILES["attachment"]["size"]);
  $filecontent = $conn->real_escape_string(file_get_contents($_FILES["attachment"]["tmp_name"]));

  $insertQuery = "INSERT INTO email_attachments (filename, filetype, filesize, content) VALUES (?,?,?,?)";

  $stmt = $conn->prepare($insertQuery);
  $stmt->bind_param("ssis", $filename, $filetype, $filesize, $filecontent);

  if ($stmt->execute()) {
    echo "File uploaded successfully.";
  } else {
    echo "Error uploading file.";
  }

  $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Email Attachment</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .upload-form { margin: 20px; padding: 20px; border: 1px solid #ddd; }
    </style>
</head>
<body>

<div class="upload-form">
    <h2>Upload Email Attachment</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <p><input type="file" name="attachment" required></p>
        <p><button type="submit">Upload</button></p>
    </form>
</div>

</body>
</html>