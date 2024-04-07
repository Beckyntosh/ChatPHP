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

// Check if table 'transcriptions' exists, create if not
if (!$conn->query("DESCRIBE `transcriptions`")) {
  $sql = "CREATE TABLE transcriptions (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
  filename VARCHAR(255) NOT NULL,
  transcription TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table Transcriptions created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if file was uploaded without errors
  if(isset($_FILES["audioFile"]) && $_FILES["audioFile"]["error"] == 0){
    $allowed = array("wav" => "audio/wav", "mp3" => "audio/mpeg");
    $filename = $_FILES["audioFile"]["name"];
    $filetype = $_FILES["audioFile"]["type"];
    $filesize = $_FILES["audioFile"]["size"];
  
    // Verify file extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
    // Verify MIME type of the file
    if(in_array($filetype, $allowed)){
      // Check whether file exists before uploading it
      if(file_exists("upload/" . $filename)){
        echo $filename . " is already exists.";
      } else{
        move_uploaded_file($_FILES["audioFile"]["tmp_name"], "upload/" . $filename);
        echo "Your file was uploaded successfully.";
        // Insert file name into database
        $sql = "INSERT INTO transcriptions (filename) VALUES ('$filename')";
      
        if ($conn->query($sql) === TRUE) {
          echo "File uploaded successfully.";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      } 
    } else{
        echo "Error: There was a problem uploading your file. Please try again."; 
    }
  } else{
      echo "Error: " . $_FILES["audioFile"]["error"];
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Audio for Transcription</title>
</head>
<body>

<h2>Audio Upload for Transcription</h2>

<form action="" method="post" enctype="multipart/form-data">
  Select audio file to upload:
  <input type="file" name="audioFile" id="audioFile">
  <input type="submit" value="Upload Audio" name="submit">
</form>

</body>
</html>
