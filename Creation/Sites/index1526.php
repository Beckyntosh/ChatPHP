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

// Create animation table if not exists
$sql = "CREATE TABLE IF NOT EXISTS animations (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
feedback TEXT,
upload_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle File Upload
$message = ''; 
if (isset($_POST['upload'])) {
    $targetDirectory = "uploads/";
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $targetFile = $targetDirectory . $fileName;
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($targetFile)) {
        $message = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Only certain file formats
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov") {
        $message = "Sorry, only MP4, AVI & MOV files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded." . $message;
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            $message = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

            // Insert file info into database
            $sql = "INSERT INTO animations (filename, upload_date) VALUES ('$fileName', NOW())";
            if ($conn->query($sql) !== TRUE) {
                $message = "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Animation File Upload</title>
    <style>
        body {font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4;}
        .container {background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1);}
        h2 {color: #333;}
        .message {color: red;}
    </style>
</head>
<body>
<div class="container">
    <h2>Upload Animation for Editing</h2>
    <p class="message"><?= $message; ?></p>
    <form action="" method="post" enctype="multipart/form-data">
        Select animation to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" value="Upload Animation" name="upload">
    </form>
</div>
</body>
</html>
