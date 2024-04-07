<?php

// Connection variables
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Connect to the database
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

$pdo = new PDO(
    'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DATABASE,
    MYSQL_USER,
    MYSQL_PASSWORD,
    $pdoOptions
);

// Create table for uploads if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS photo_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$pdo->exec($sql);

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photoshopFile'])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES['photoshopFile']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a real Photoshop file
    if ($imageFileType != "psd") {
        echo "Sorry, only PSD files are allowed.";
    } else {
        if (move_uploaded_file($_FILES['photoshopFile']['tmp_name'], $targetFile)) {
            $sql = "INSERT INTO photo_uploads (file_name) VALUES (:fileName)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['fileName' => basename($_FILES['photoshopFile']['name'])]);
            
            echo "The file " . htmlspecialchars(basename($_FILES['photoshopFile']['name'])) . " has been uploaded.";
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
    <title>Photoshop File Upload for Image Editing</title>
</head>
<body>

<h2>Upload Photoshop File for Editing</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <label for="photoshopFile">Select image to upload:</label>
    <input type="file" name="photoshopFile" id="photoshopFile">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
