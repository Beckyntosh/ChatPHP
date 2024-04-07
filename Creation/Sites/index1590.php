<?php
//Set Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
    artist_name VARCHAR(30) NOT NULL,
    artwork_name VARCHAR(30) NOT NULL,
    artwork_image VARCHAR(255) NOT NULL,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
$message = '';
if (isset($_POST['upload'])) {
    $artist_name = $_POST['artist_name'];
    $artwork_name = $_POST['artwork_name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["artwork_image"]["name"]);

    if (move_uploaded_file($_FILES["artwork_image"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO ArtGallery (artist_name, artwork_name, artwork_image) VALUES (?, ?, ?)";
        $stmt= $conn->prepare($sql);
        $stmt->bind_param("sss", $artist_name, $artwork_name, $target_file);

        if ($stmt->execute()) {
            $message = "The file " . htmlspecialchars(basename($_FILES["artwork_image"]["name"])) . " has been uploaded.";
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    } else {
        $message = "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Organic Foods Art Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        form {
            margin-top: 20px;
        }
        input, button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload Your Artwork</h2>
    <?php if (!empty($message)): ?>
        <p><?= $message; ?></p>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        Artist Name: <input type="text" name="artist_name" required><br>
        Artwork Name: <input type="text" name="artwork_name" required><br>
        Select image to upload:
        <input type="file" name="artwork_image" id="artwork_image" required>
        <button type="submit" name="upload">Upload Artwork</button>
    </form>
</div>
</body>
</html>
<?php $conn->close(); ?>
