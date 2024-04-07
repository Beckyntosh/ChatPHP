<?php
// Assume a connection script to the database named config.php

define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
define('servername', 'db');

// Create connection
$conn = new mysqli(servername, 'root', MYSQL_ROOT_PSWD, MYSQL_DB);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the script is handling a file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["scanned_document"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["scanned_document"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["scanned_document"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["scanned_document"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["scanned_document"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["scanned_document"]["name"])). " has been uploaded.";
            
            $sql = "INSERT INTO documents (filename) VALUES ('" . $target_file . "')";
        
            if ($conn->query($sql) === TRUE) {
                echo "Document uploaded successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload Scanned Document</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  Select image to upload:<br>
  <input type="file" name="scanned_document" id="scanned_document"><br>
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
**IMPORTANT**: This code is provided for educational purposes and may need adjustments, such as creating a `documents` table in your `my_database`, providing adequate security measures like input validation, and configuring the correct paths and permissions for your server setup to manage uploads, before it's ready for a production environment. Make sure you understand security implications, especially concerning file uploads and database interactions.