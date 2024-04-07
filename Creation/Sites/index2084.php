<?php
// Database Configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create table for uploaded files if it doesn't exist
$query = "CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$pdo->exec($query);

// File upload process
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['document'])) {
    $targetDirectory = "uploads/";
    $file = $_FILES['document'];
    $fileName = basename($file['name']);
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
        // Insert file info into the database
        $insertQuery = "INSERT INTO uploaded_documents (file_name) VALUES (?)";
        $stmt = $pdo->prepare($insertQuery);
        $stmt->execute([$fileName]);

        echo "The file " . htmlspecialchars($fileName) . " has been uploaded successfully.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload Form</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="document">Upload a scanned copy of your Driver's License:</label><br>
        <input type="file" name="document" id="document" required>
        <button type="submit">Upload Document</button>
    </form>
</body>
</html>
