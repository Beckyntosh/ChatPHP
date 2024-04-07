<?php

// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed = array("psd" => "image/psd");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)) {
                echo $filename . " is already exists.";
            } else {
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";

                // Insert file information into the database
                $sql = "INSERT INTO images (filename, size, type) VALUES (:filename, :size, :type)";

                if($stmt = $pdo->prepare($sql)) {
                    $stmt->bindParam(":filename", $filename);
                    $stmt->bindParam(":size", $filesize);
                    $stmt->bindParam(":type", $filetype);
                    
                    if($stmt->execute()) {
                        echo "File information saved in database.";
                    } else {
                        echo "Error saving file information in database.";
                    }
                }
            } 
        } else {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else {
        echo "Error: " . $_FILES["photo"]["error"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Upload for Image Editing</title>
</head>
<body>
    <h2>Upload a Photoshop File for Editing</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h3>Select a PSD file to upload:</h3>
        <input type="file" name="photo" id="photo">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>

<?php
// Creation of images table if it doesn't exist
try {
    $sql = "CREATE TABLE IF NOT EXISTS images (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        size INT NOT NULL,
        type VARCHAR(50) NOT NULL,
        uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $pdo->exec($sql);
} catch(PDOException $e) {
    die("ERROR: Could not create table. " . $e->getMessage());
}
?>
