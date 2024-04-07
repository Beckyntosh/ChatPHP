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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS archive_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($sql);

// Process file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["zipFile"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["zipFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a real zip
    if ($imageFileType != "zip") {
        echo "Sorry, only ZIP files are allowed.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["zipFile"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars(basename($_FILES["zipFile"]["name"])). " has been uploaded.";

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO archive_uploads (file_name) VALUES (?)");
            $stmt->bind_param("s", $fileName);
            $fileName = basename($_FILES["zipFile"]["name"]);
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
    <title>Upload ZIP Archive</title>
</head>
<body>
<h2>Upload a ZIP File for Archiving</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    Select ZIP file to upload:
    <input type="file" name="zipFile" id="zipFile">
    <input type="submit" value="Upload ZIP" name="submit">
</form>
</body>
</html>