<?php
// Simple PHP script for a Source Code Upload & Review System

// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Establish database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Create table for uploads if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS code_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    filename VARCHAR(255) NOT NULL, 
    code TEXT NOT NULL, 
    review TEXT, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($createTableSql)) {
    die('Error creating table: ' . $conn->error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['sourceCode'])) {
    $filename = $conn->real_escape_string($_FILES['sourceCode']['name']);
    $code = $conn->real_escape_string(file_get_contents($_FILES['sourceCode']['tmp_name']));

    $insertSql = "INSERT INTO code_reviews (filename, code) VALUES ('$filename', '$code')";

    if ($conn->query($insertSql)) {
        echo "File uploaded successfully!";
    } else {
        echo "Error uploading file: " . $conn->error;
    }
}

// HTML and PHP for front-end
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Code Review System</title>
</head>
<body>
    <h2>Upload Source Code for Review</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="sourceCode">Source code:</label>
        <input type="file" id="sourceCode" name="sourceCode" required>
        <input type="submit" value="Upload">
    </form>

    <h3>Uploaded Files</h3>
    <ul>
    <?php
    // Display uploaded files
    $selectSql = "SELECT id, filename FROM code_reviews";
    $result = $conn->query($selectSql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<li><a href="review.php?id=' . $row["id"] . '">' . $row["filename"] . '</a></li>';
        }
    } else {
        echo "No files uploaded yet.";
    }
    ?>
    </ul>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
