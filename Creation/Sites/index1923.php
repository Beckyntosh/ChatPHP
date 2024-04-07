


<?php
// MySQL connection details
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create table if not exists
$tableQuery = "CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    code TEXT NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$pdo->exec($tableQuery);

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["sourceCode"]["name"])) {
    $title = $_POST['title'];
    $codeContent = file_get_contents($_FILES['sourceCode']['tmp_name']);
    $codeContent = $pdo->quote($codeContent);

    $insertQuery = "INSERT INTO code_reviews (title, code) VALUES ('$title', $codeContent)";
    if($pdo->exec($insertQuery)){
        echo "<p>File uploaded successfully.</p>";
    } else{
        echo "<p>Unable to upload file.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Source Code for Review</title>
</head>
<body>
    <h2>Upload Source Code for Review</h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="title">Feature Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="sourceCode">Source Code:</label><br>
        <input type="file" id="sourceCode" name="sourceCode" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>

This single PHP file acts as both the frontend for file uploads and the backend for processing those uploads. It creates a MySQL table for storing code reviews, handles file uploads from the form, and saves them in the database. 

To deploy this example:
1. Set up a PHP and MySQL environment.
2. Ensure your MySQL server details match what's defined in the PHP code or adjust accordingly.
3. Load the `index.php` file in your web browser and use the form to upload source code files.

**Security Note**: The above example does not include input validation, sanitation, or security measures like prepared statements. In a real-world application, it is crucial to implement these aspects to protect against SQL injection and other security threats.