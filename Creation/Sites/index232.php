<?php
// Connection settings
const MYSQL_ROOT_PSWD = 'root';
const MYSQL_DB = 'my_database';
const SERVERNAME = 'db';

// Connect to database
function connectToDB() {
    $conn = new mysqli(SERVERNAME, 'root', MYSQL_ROOT_PSWD, MYSQL_DB);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

// Create table if not exists
function createTableIfNeeded($conn) {
    $createTableSql = "
    CREATE TABLE IF NOT EXISTS code_reviews (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        code LONGTEXT NOT NULL,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";
    if (!$conn->query($createTableSql)) {
        die("Error creating table: " . $conn->error);
    }
}

// Handle form submission
function handleFormSubmission() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['sourceCode'])) {
        $conn = connectToDB();
        createTableIfNeeded($conn);

        $filename = $conn->real_escape_string($_FILES['sourceCode']['name']);
        $code = $conn->real_escape_string(file_get_contents($_FILES['sourceCode']['tmp_name']));
        
        $insertSql = "INSERT INTO code_reviews (filename, code) VALUES ('$filename', '$code')";
        if ($conn->query($insertSql)) {
            echo "<p>File uploaded successfully.</p>";
        } else {
            echo "<p>Error uploading file: " . $conn->error . "</p>";
        }
        $conn->close();
    }
}

handleFormSubmission();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Source Code Upload for Review</title>
</head>
<body>
    <h1>Upload Source Code for Review</h1>
    <form action="" method="post" enctype="multipart/form-data">
        Select source code to upload:
        <input type="file" name="sourceCode" id="sourceCode">
        <input type="submit" value="Upload Code" name="submit">
    </form>
</body>
</html>