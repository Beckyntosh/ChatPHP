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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS ArtGallery (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artistName VARCHAR(50) NOT NULL,
artworkTitle VARCHAR(50),
description TEXT,
imageName VARCHAR(100),
uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artistName = $_POST['artistName'];
    $artworkTitle = $_POST['artworkTitle'];
    $description = $_POST['description'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            $sql = "INSERT INTO ArtGallery (artistName, artworkTitle, description, imageName) 
                    VALUES ('$artistName', '$artworkTitle', '$description', '".basename($_FILES["fileToUpload"]["name"])."')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }        
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Online Art Gallery Entry</title>
</head>
<body>

<h2>Upload Artwork Form</h2>

<form action="" method="post" enctype="multipart/form-data">
    Artist Name: <input type="text" name="artistName" required><br>
    Artwork Title: <input type="text" name="artworkTitle" required><br>
    Description:<br><textarea name="description" rows="5" cols="40" required></textarea><br>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" required>
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

Please note that the actual deployment of this application would require a server with PHP and MySQL installed, including a web server software like Apache or Nginx. Ensure that the directory for image uploads (in this case "uploads/") has proper permissions set to allow file uploading. The application is simplified for educational and illustrative purposes and might require additional security measures for production use, such as proper validation and sanitization of input data, using prepared statements to prevent SQL injection, and handling file uploads securely.