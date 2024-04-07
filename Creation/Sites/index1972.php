<?php

// Handle the database connection
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

// Create table for file uploads if it does not exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS print_orders (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($tableCreationQuery)) {
    die("Error creating table: " . $conn->error);
}

$message = ""; // To display messages to the user

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["weddingDesign"])) {
    $targetDirectory = "uploads/";
    $fileName = basename($_FILES["weddingDesign"]["name"]);
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if file is a valid image
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to the server
        if (move_uploaded_file($_FILES["weddingDesign"]["tmp_name"], $targetFilePath)) {
            // Insert file info into the database
            $insertQuery = $conn->prepare("INSERT INTO print_orders (file_name, file_path) VALUES (?, ?)");
            $insertQuery->bind_param("ss", $fileName, $targetFilePath);
            
            if ($insertQuery->execute()) {
                $message = "The file " . htmlspecialchars(basename($_FILES["weddingDesign"]["name"])) . " has been uploaded.";
            } else {
                $message = "There was an error uploading your file.";
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    } else {
        $message = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed for upload.";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload for Printing Services</title>
</head>
<body>
    <h2>Upload Wedding Invitation Design for Printing</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="weddingDesign" required>
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <?php if ($message): ?>
        <p><?= $message ?></p>
    <?php endif; ?>
</body>
</html>
