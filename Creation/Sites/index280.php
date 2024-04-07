<?php

// Set database connection variables
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Connect to MySQL Database
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exist
$sql = "CREATE TABLE IF NOT EXISTS software_packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    package_name VARCHAR(255) NOT NULL,
    package_version VARCHAR(255) NOT NULL,
    author_name VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    file_name VARCHAR(255) NOT NULL
);";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $packageName = $_POST['packageName'];
    $packageVersion = $_POST['packageVersion'];
    $authorName = $_POST['authorName'];
    $fileName = basename($_FILES["file"]["name"]);
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . $fileName;
    
    // Check if file already exists
    if (file_exists($targetFilePath)) {
        echo "Sorry, file already exists.";
    } else {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert file info into the database
            $stmt = $conn->prepare("INSERT INTO software_packages (package_name, package_version, author_name, file_name) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $packageName, $packageVersion, $authorName, $fileName);
            
            if ($stmt->execute()) {
                echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $stmt->close();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Package Upload for Distribution</title>
</head>
<body>
    <h2>Upload Software Package</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="packageName">Package Name:</label><br>
        <input type="text" id="packageName" name="packageName" required><br><br>
        <label for="packageVersion">Package Version:</label><br>
        <input type="text" id="packageVersion" name="packageVersion" required><br><br>
        <label for="authorName">Author Name:</label><br>
        <input type="text" id="authorName" name="authorName"><br><br>
        <label for="file">Select file to upload:</label>
        <input type="file" name="file" id="file" required><br><br>
        <input type="submit" value="Upload Package">
    </form>
</body>
</html>