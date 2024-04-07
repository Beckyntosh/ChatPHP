<?php
// Database connection configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if table "text_files" exists, create if not
try {
    $query = "CREATE TABLE IF NOT EXISTS text_files (
                id INT AUTO_INCREMENT PRIMARY KEY,
                filename VARCHAR(255) NOT NULL,
                content LONGTEXT NOT NULL,
                summary TEXT NOT NULL,
                upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
              )";
    $pdo->exec($query);
    echo "Table created successfully";
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $query. " . $e->getMessage());
}

// Checking if file was submitted
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_FILES['textFile'])) {
    $fileName = basename($_FILES['textFile']['name']);
    $fileTmpName = $_FILES['textFile']['tmp_name'];
    $fileContent = file_get_contents($fileTmpName);
    
    // Dummy content analysis and summarization logic for demonstration
    $summary = substr($fileContent, 0, 100); // Taking first 100 chars as 'summary'
    
    try {
        $query = "INSERT INTO text_files (filename, content, summary) VALUES (:filename, :content, :summary)";
        $stmt = $pdo->prepare($query);
        
        $stmt->bindParam(':filename', $fileName);
        $stmt->bindParam(':content', $fileContent);
        $stmt->bindParam(':summary', $summary);
        
        $stmt->execute();
        echo "File uploaded and analyzed successfully.";
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $query. " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wine Reviews File Upload</title>
</head>
<body>
    <h2>Upload Text File for Content Analysis</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="textFile" id="textFile" required>
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>