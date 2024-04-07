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

// Create table for images if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    artist VARCHAR(30),
    tags VARCHAR(50),
    upload_date DATE,
    file_path VARCHAR(100),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
if (isset($_POST['upload'])) {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $tags = $_POST['tags'];
    $uploadDate = date('Y-m-d');
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        $sql = "INSERT INTO images (title, artist, tags, upload_date, file_path)
        VALUES ('$title', '$artist', '$tags', '$uploadDate', '$targetFile')";

        if ($conn->query($sql) === TRUE) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maternity Wear Digital Gallery</title>
    <style>
        /* Some basic styling */
        body { font-family: Arial, sans-serif; }
        .gallery { display: flex; flex-wrap: wrap; padding: 5px; }
        .gallery img { margin: 5px; border: 2px solid #ccc; width: 200px; }
        form { margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2>Upload New Image</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Title: <input type="text" name="title" required><br>
        Artist: <input type="text" name="artist"><br>
        Tags: <input type="text" name="tags"><br>
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" value="Upload Image" name="upload">
    </form>

    <h2>Search Images</h2>
    <form method="get">
        Search: <input type="text" name="search">
        <input type="submit" value="Find">
    </form>

    <div class="gallery">
        <?php
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM images WHERE title LIKE '%$search%' OR artist LIKE '%$search%' OR tags LIKE '%$search%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<img src="' . $row["file_path"] . '" alt="' . $row["title"] . '">';
                }
            } else {
                echo "0 results";
            }
        }
        ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>