<?php
// Database and website settings
$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$db_servername = 'db';
$uploadDirectory = 'uploads/';
$allowedFileType = ['zip'];

// Create connection to database
$conn = new mysqli($db_servername, 'root', $MYSQL_ROOT_PSWD, $MYSQL_DB);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if table exists, if not create one
$tableCheckQuery = "SHOW TABLES LIKE 'archives'";
$result = $conn->query($tableCheckQuery);
if ($result->num_rows == 0) {
  $sql = "CREATE TABLE archives (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      project_name VARCHAR(255) NOT NULL,
      file_name VARCHAR(255) NOT NULL,
      upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  
  if ($conn->query($sql) === TRUE) {
    echo "Table archives created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $projectName = basename($_POST['projectName']);
  $fileName = basename($_FILES["zipFile"]["name"]);
  $targetFilePath = $uploadDirectory . $fileName;
  
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
  if(in_array($fileType, $allowedFileType)){
    // Upload file to server
    if(move_uploaded_file($_FILES["zipFile"]["tmp_name"], $targetFilePath)){
      // Insert file information into the database
      $insert = $conn->query("INSERT INTO archives (project_name, file_name) VALUES ('".$projectName."', '".$fileName."')");
      if($insert){
        $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
      } else{
        $statusMsg = "File upload failed, please try again.";
      } 
    } else{
        $statusMsg = "Sorry, there was an error uploading your file.";
    }
  } else{
    $statusMsg = 'Sorry, only ZIP files are allowed to upload.';
  }
  echo $statusMsg;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handbags Website - Archive Upload</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { margin: 0 auto; width: 80%; padding: 20px; }
        form { margin-top: 20px; }
        input[type=file], input[type=text] { margin: 10px 0; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload ZIP File for Archiving</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="projectName">Project Name:</label>
        <input type="text" id="projectName" name="projectName" required>
        
        <label for="zipFile">Select ZIP File:</label>
        <input type="file" name="zipFile" id="zipFile" required>
        
        <input type="submit" value="Upload Archive" name="submit">
    </form>
</div>

</body>
</html>
