<?php
// Establish database connection
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

// Create table for storing text file contents
$sql = "CREATE TABLE IF NOT EXISTS text_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
content LONGTEXT,
analysis LONGTEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if file was uploaded without errors
  if (isset($_FILES["textFile"]) && $_FILES["textFile"]["error"] == 0) {
    $filename = $_FILES["textFile"]["name"];
    $filetype = $_FILES["textFile"]["type"];
    $filesize = $_FILES["textFile"]["size"];
    
    // Verify file extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if ($ext != "txt") {
      $message = "Error: Please upload a valid text file.";
    } else {
      // Read file content
      $content = file_get_contents($_FILES["textFile"]["tmp_name"]);
      // Placeholder for analysis result - this should be replaced with actual analysis logic
      $analysis = "Analysis result placeholder for the uploaded text.";
      
      // Insert content and analysis into the database
      $stmt = $conn->prepare("INSERT INTO text_files (content, analysis) VALUES (?, ?)");
      $stmt->bind_param("ss", $content, $analysis);
      if ($stmt->execute()) {
        $message = "File uploaded and analyzed successfully.";
      } else {
        $message = "Error uploading file.";
      }
    }
  } else {
    $message = "Error: " . $_FILES["textFile"]["error"];
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Text File Upload for Content Analysis</title>
Incorporate the lively style as suitable for the Tablets website
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f8ff; }
        .container { width: 70%; margin: auto; text-align: center; }
        input[type="file"] { margin: 20px 0; }
        .btn { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer; }
        .btn:hover { background-color: #45a049; }
        .message { margin-top: 20px; color: #d8000c; }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload Text File for Content Analysis</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select text file to upload:
        <input type="file" name="textFile" required>
        <input type="submit" value="Upload File" name="submit" class="btn">
    </form>
    <div class="message"><?= $message; ?></div>
</div>

</body>
</html>