<?php
// Define MySQL connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establish connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Create table for uploaded documents if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
    die("Error creating table: " . $conn->error);
}

// Handling file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["scannedDocument"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["scannedDocument"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
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
        if (move_uploaded_file($_FILES["scannedDocument"]["tmp_name"], $targetFile)) {
            $filename = basename($_FILES["scannedDocument"]["name"]);
            
            // Insert file info into database
            $stmt = $conn->prepare("INSERT INTO uploaded_documents (filename) VALUES (?)");
            $stmt->bind_param("s", $filename);
            if ($stmt->execute()) {
                echo "The file ". htmlspecialchars(basename($_FILES["scannedDocument"]["name"])). " has been uploaded.";
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
    <title>Upload Scanned Document</title>
</head>
<body>

<h2>Upload Scanned Document</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select Image File to Upload:
  <input type="file" name="scannedDocument" id="scannedDocument">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
