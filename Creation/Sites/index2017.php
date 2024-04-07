<?php
// Configure error reporting to display any errors for debugging purposes
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database credentials
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to the MySQL database
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Creating a table for storing vector file data if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS vector_files (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            filename VARCHAR(255) NOT NULL,
            mimetype VARCHAR(50),
            filesize INT(10),
            uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
    
    // Execute the query
    $conn->exec($sql);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Check for file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['vectorFile'])) {
    // Handle the file upload
    $file = $_FILES['vectorFile'];
    $filename = $file['name'];
    $mimetype = $file['type'];
    $filesize = $file['size'];
    
    // Define the directory where the file will be saved
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($filename);
    
    // Attempt to move the uploaded file to the target directory
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        // Insert file details into the database
        $stmt = $conn->prepare("INSERT INTO vector_files (filename, mimetype, filesize) VALUES (?, ?, ?)");
        $stmt->execute([$filename, $mimetype, $filesize]);
        
        echo "The file ". htmlspecialchars( basename( $filename)). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vector File Upload</title>
</head>
<body>
    <h2>Upload a Vector File</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="vectorFile">Select file to upload:</label>
        <input type="file" name="vectorFile" id="vectorFile">
        <input type="submit" value="Upload File" name="submit">
    </form>

    <h2>Uploaded Vector Files</h2>
    <?php
    // Retrieve files from database
    $stmt = $conn->prepare("SELECT * FROM vector_files");
    $stmt->execute();
    
    // Set the result mode
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $files = $stmt->fetchAll();
    
    if(count($files) > 0){
        echo "<ul>";
        foreach ($files as $file) {
            echo "<li><a href='uploads/" . $file['filename'] . "'>" . htmlspecialchars($file['filename']) . "</a> - " . $file['filesize'] . " bytes</li>";
        }
        echo "</ul>";
    } else {
        echo "No files found.";
    }
    ?>
</body>
</html>
