<?php
// Connection parameters
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

// Create table for file uploads if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS printing_services (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filesize INT(10) NOT NULL,
    filetype VARCHAR(50) NOT NULL,
    status ENUM('pending','printed') DEFAULT 'pending',
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  echo "Table printing_services created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if file was uploaded without errors
    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] == 0) {
        $filename = $conn->real_escape_string($_FILES['uploadedFile']['name']);
        $filesize = $_FILES['uploadedFile']['size'];
        $filetype = $_FILES['uploadedFile']['type'];

        // Insert file info into the database
        $query = "INSERT INTO printing_services (filename, filesize, filetype) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sis", $filename, $filesize, $filetype);
        
        if ($stmt->execute()) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }

        $stmt->close();
    } else {
        echo "Error uploading file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload File for Printing Services</title>
</head>
<body>
    <h2>Wedding Invitation Design Upload</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="uploadedFile">Choose a file:</label>
        <input type="file" name="uploadedFile" id="uploadedFile">
        <input type="submit" value="Upload">
    </form>
</body>
</html>

