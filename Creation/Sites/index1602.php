

<?php
// Database configuration
$servername = "db";
$username = "root";
$mysql_root_pswd = "root"; // WARNING: Change this password in a real application
$dbname = "my_database";

// Create database connection
$conn = new mysqli($servername, $username, $mysql_root_pswd, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS art_gallery (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(100) NOT NULL,
    artwork_title VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    image_path VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($tableSql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artistName = $_POST['artistName'];
    $artworkTitle = $_POST['artworkTitle'];
    $description = $_POST['description'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["artworkImage"]["name"]);
    move_uploaded_file($_FILES["artworkImage"]["tmp_name"], $targetFile);

    $stmt = $conn->prepare("INSERT INTO art_gallery (artist_name, artwork_title, description, image_path) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $artistName, $artworkTitle, $description, $targetFile);
    $stmt->execute();
    
    echo "New record created successfully";
}

?>

<!DOCTYPE html>
<html>
<body>

<h2>Artwork Upload Form</h2>

<form action="" method="post" enctype="multipart/form-data">
  Artist Name: <input type="text" name="artistName" required><br>
  Artwork Title: <input type="text" name="artworkTitle" required><br>
  Description: <textarea name="description" required></textarea><br>
  Select image to upload:
  <input type="file" name="artworkImage" id="artworkImage" required>
  <input type="submit" value="Upload Artwork" name="submit">
</form>

</body>
</html>

<?php
$conn->close();
?>

This script does a basic job: creating a database connection, checking for or creating a needed table, handling the form submission, saving the uploaded file to the server, and storing details about the artwork in the database. Remember, for a real application or research project, more comprehensive error handling, security measures, and features would need to be implemented.