<?php
// Connect to Database
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

// Create table for uploaded file contents
$sql = "CREATE TABLE IF NOT EXISTS uploaded_texts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    summary TEXT
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// File upload logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["textFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["textFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    // Check if file is a actual text or fake text
    if($fileType != "txt") {
      echo "Sorry, only TXT files are allowed.";
      $uploadOk = 0;
    }
  
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["textFile"]["tmp_name"], $target_file)) {
        $fileContent = file_get_contents($target_file);
        // Here you would typically call your content analysis and summary generation logic/functions
        $summary = "This is a dummy summary."; // Placeholder for summary logic
  
        // Insert file content and its summary into the database
        $stmt = $conn->prepare("INSERT INTO uploaded_texts (content, summary) VALUES (?, ?)");
        $stmt->bind_param("ss", $fileContent, $summary);
  
        if ($stmt->execute()) {
          echo "The file ". htmlspecialchars( basename( $_FILES["textFile"]["name"])). " has been uploaded and analyzed.";
        } else {
          echo "Sorry, there was an error uploading your file.";
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
<head>
    <title>Upload Text File for Content Analysis</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        .btn { padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        .btn:hover { background-color: #45a049; }
        input[type=file] { margin: 10px 0; }
    </style>
</head>
<body>

<div class="container">
    <h2>File Upload for Content Analysis</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select Text File to upload:
        <input type="file" name="textFile" id="textFile">
        <input type="submit" value="Upload File" name="submit" class="btn">
    </form>
</div>

</body>
</html>