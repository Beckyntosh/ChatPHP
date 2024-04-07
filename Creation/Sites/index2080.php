<?php

// Configuration for database connection
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

// Create table for storing uploaded files if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS uploaded_documents (
id INT AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
filetype VARCHAR(50) NOT NULL,
filesize INT NOT NULL,
uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  die("Error creating table: " . $conn->error);
}

$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'pdf');
    if (in_array($fileExtension, $allowedfileExtensions)) {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './uploaded_files/';
      $dest_path = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath, $dest_path)) {
        $message ='File is successfully uploaded.';
        $sql = "INSERT INTO uploaded_documents (filename, filetype, filesize) VALUES ('$newFileName', '$fileType', $fileSize)";

        if (!$conn->query($sql) === TRUE) {
          $message ='File is uploaded but failed to update database. Error: ' . $conn->error;
        }
      } else {
        $message = 'There was some error moving the file to upload directory.';
      }
    } else {
      $message = 'Upload failed. Allowed file types: ' . join(',', $allowedfileExtensions);
    }
  } else {
    $message = 'There is some error in the file upload. Error:' . $_FILES['uploadedFile']['error'];
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Scanned Document</title>
</head>
<body>
    <h2>Upload Scanned Document (Driver's License)</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="uploadFile">Choose file to upload:</label>
            <input type="file" name="uploadedFile" id="uploadFile">
        </div>
        <input type="submit" name="uploadBtn" value="Upload">
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>

<?php $conn->close(); ?>
