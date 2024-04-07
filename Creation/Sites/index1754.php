<?php
// Connect to the Database
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if file was uploaded without errors
  if (isset($_FILES["document"]) && $_FILES["document"]["error"] == 0) {
    $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png"];
    $filename = $_FILES["document"]["name"];
    $filetype = $_FILES["document"]["type"];
    $filesize = $_FILES["document"]["size"];
  
    // Verify file extension
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
    // Verify file size - 5MB maximum
    $maxsize = 5 * 1024 * 1024;
    if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
    // Verify MIME type of the file
    if (in_array($filetype, $allowed)) {
      // Check whether file exists before uploading it
      if (file_exists("upload/" . $filename)) {
        echo $filename . " already exists.";
      } else {
        move_uploaded_file($_FILES["document"]["tmp_name"], "upload/" . $filename);
        echo "Your file was uploaded successfully.";

        // Insert into database
        $sql = "INSERT INTO documents (filename, size, type) VALUES (?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
          $stmt->bind_param("sis", $filename, $filesize, $filetype);

          if ($stmt->execute()) {
            echo "File saved in database successfully.";
          } else {
            echo "Error: " . $stmt->error;
          }
        }
      } 
    } else {
      echo "Error: There was a problem uploading your file. Please try again."; 
    }
  } else {
    echo "Error: " . $_FILES["document"]["error"];
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload Your Scanned Document</title>
</head>
<body>
  <form action="upload_script.php" method="post" enctype="multipart/form-data">
    <h2>Upload Document</h2>
    <label for="document">File Upload:</label>
    <input type="file" name="document" id="document">
    <input type="submit" value="Upload">
  </form>
</body>
</html>
