<?php

$server = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Connect to the database
$conn = new mysqli($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the table doesn't exist, create it
$sql = "CREATE TABLE IF NOT EXISTS art_gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(255) NOT NULL,
    artwork_title VARCHAR(255) NOT NULL,
    description TEXT,
    image_path VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artist_name = $_POST["artist_name"];
    $artwork_title = $_POST["artwork_title"];
    $description = $_POST["description"];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    // Check if image file is an actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($uploadOk == 1) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Save to database
            $stmt = $conn->prepare("INSERT INTO art_gallery (artist_name, artwork_title, description, image_path) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $artist_name, $artwork_title, $description, $target_file);
            if ($stmt->execute()) {
                echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $stmt->close();
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
    <title>Online Art Gallery Entry</title>
</head>
<body>
    <h2>Upload Artwork</h2>
    <form action="?" method="post" enctype="multipart/form-data">
        Artist Name:<br>
        <input type="text" name="artist_name" required><br>
        Artwork Title:<br>
        <input type="text" name="artwork_title" required><br>
        Description:<br>
        <textarea name="description" required></textarea><br>
        Select image to upload:<br>
        <input type="file" name="fileToUpload" id="fileToUpload" required><br><br>
        <input type="submit" value="Upload Artwork" name="submit">
    </form>
</body>
</html>
This script creates a simple PHP application for uploading artwork details to an online art gallery for a Bath Products website. It involves creating a table `art_gallery` in a MySQL database and provides an HTML form to upload the artwork details including the artist's name, artwork title, description, and an image of the artwork. Successful uploads will insert a new record into the database with the provided details. Please make sure to adjust security settings and manage file upload permissions and sizes per your server configuration.
