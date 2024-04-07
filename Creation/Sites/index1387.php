

<?php
// Setup connection variables
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "my_database");

// Establish the database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Create table for storing file details if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS uploaded_photos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
)";
if(!$conn->query($tableQuery)){
    die("ERROR: Could not create table. " . $conn->error);
}

// Handle file upload
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])){
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if file is a real PSD
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
            // Check if it's a photoshop file
            if($imageFileType != "psd") {
                echo "Sorry, only PSD files are allowed.";
                $uploadOk = 0;
            }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Attempt to upload file if checks passed
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
            // Insert file info into database
            $insertQuery = "INSERT INTO uploaded_photos (file_name) VALUES ('".$conn->real_escape_string($_FILES["photo"]["name"])."')";
            if($conn->query($insertQuery)){
                echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
            } else{
                echo "Sorry, there was an error uploading your file.";
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
<head>
    <title>Upload Photoshop File</title>
</head>
<body>
<h2>Photoshop File Upload for Image Editing Platform</h2>
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="photo" id="photo">
    <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>

Before deploying this script:

1. Make sure you create a folder named `uploads` in the same directory where this script resides to store the uploaded files.
2. This script does not cover some important aspects, such as thorough validation of the uploaded file type and size, securing file uploads against potential attacks, and database security practices. Please implement these measures according to your specific needs.
3. Always escape any data retrieved from the database before outputting it to avoid XSS vulnerabilities.