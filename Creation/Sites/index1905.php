<?php

// Connection variables
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

// Create table for storing uploaded files info, if it does not exist
$fileTable = "CREATE TABLE IF NOT EXISTS archive_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($fileTable)) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["zipFile"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["zipFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    
    // Check if file is a real ZIP file
    if($fileType != "zip") {
        echo "Sorry, only ZIP files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["zipFile"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["zipFile"]["name"])). " has been uploaded.";
            $filename = basename($_FILES["zipFile"]["name"]);
            $stmt = $conn->prepare("INSERT INTO archive_files (filename) VALUES (?)");
            $stmt->bind_param("s", $filename);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Archive Upload</title>
</head>
<body>
    <h2>Upload ZIP File for Archiving</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <label for="zipFile">Select ZIP file to upload:</label>
        <input type="file" name="zipFile" id="zipFile">
        <input type="submit" value="Upload ZIP" name="submit">
    </form>
</body>
</html>
