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

// Create tables if they don't exist
$artTableSql = "CREATE TABLE IF NOT EXISTS artworks (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artistName VARCHAR(255) NOT NULL,
    artTitle VARCHAR(255) NOT NULL,
    description TEXT,
    uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    imagePath VARCHAR(255)
)";

if (!$conn->query($artTableSql)) {
    die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artistName = $_POST['artistName'];
    $artTitle = $_POST['artTitle'];
    $description = $_POST['description'];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
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
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO artworks (artistName, artTitle, description, imagePath) VALUES (?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $artistName, $artTitle, $description, $targetFile);

            if($stmt->execute()) {
                echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Artwork Upload Form</h2>

<form action="" method="post" enctype="multipart/form-data">
    Artist Name:<br>
    <input type="text" name="artistName" required>
    <br>
    Art Title:<br>
    <input type="text" name="artTitle" required>
    <br>
    Description:<br>
    <textarea name="description" required></textarea>
    <br>
    Select image to upload:<br>
    <input type="file" name="fileToUpload" id="fileToUpload" required>
    <br><br>
    <input type="submit" value="Upload Artwork" name="submit">
</form>

</body>
</html>
