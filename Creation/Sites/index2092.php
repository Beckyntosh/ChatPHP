<?php
// Connect to database
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

// Create table for storing uploaded documents if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS user_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
    $targetDirectory = "uploads/";
    $file = $_FILES["document"];
    $filename = basename($file["name"]);
    $targetFile = $targetDirectory . $filename;
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($file["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size (5MB limit)
    if ($file["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "jpg" && $fileType != "jpeg" && $fileType != "png" ) {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            // Insert into database
            $sql = "INSERT INTO user_documents (filename) VALUES ('$filename')";

            if ($conn->query($sql) === TRUE) {
                echo "The file ". htmlspecialchars( basename( $file["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
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
    <h2>Upload Your Driver's License for Verification</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="document" id="document">
        <input type="submit" value="Upload Document" name="submit">
    </form>
</body>
</html>
