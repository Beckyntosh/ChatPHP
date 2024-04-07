<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file is a actual sql or zip (for SQL dump)
if($fileType != "sql" && $fileType != "zip" ) {
  echo "Sorry, only SQL & ZIP files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    // Start restoration or saving process
    restoreDatabase($target_file, $fileType);
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

function restoreDatabase($filePath, $fileType){
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

    if ($fileType == 'sql') {
        // SQL file
        $templine = '';
        // Read in entire file
        $lines = file($filePath);
        // Loop through each line
        foreach ($lines as $line) {
            // Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;
            // Add this line to the current segment
            $templine .= $line;
            // If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                // Perform the query
                $conn->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . $conn->error . '<br /><br />');
                // Reset temp variable to empty
                $templine = '';
            }
        }
        echo "Database restored successfully\n";
    } else if ($fileType == 'zip') {
        // TODO: Handle ZIP files containing SQL
        // This might include unzipping and then executing the SQL as above
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select Database Backup File to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Backup" name="submit">
</form>

</body>
</html>