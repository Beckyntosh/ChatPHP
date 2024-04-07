<?php

// Define MySQL connection parameters
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

// Connect to database
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for storing archive data if it doesn't exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS archives (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($tableCreationQuery)) {
    die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["zipfile"])) {
    // Check for upload errors
    if ($_FILES["zipfile"]["error"] == 0) {
        $targetDirectory = __DIR__ . "/uploads/";
        $targetFile = $targetDirectory . basename($_FILES["zipfile"]["name"]);

        // Check if the file is a ZIP
        $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
        if ($fileType !== "zip") {
            echo "Error: Only ZIP files are allowed.";
        } else {
            // Attempt to move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["zipfile"]["tmp_name"], $targetFile)) {
                // Insert file info into the database
                $stmt = $conn->prepare("INSERT INTO archives (file_name) VALUES (?)");
                $stmt->bind_param("s", $_FILES["zipfile"]["name"]);
                if ($stmt->execute()) {
                    echo "The file " . htmlspecialchars(basename($_FILES["zipfile"]["name"])) . " has been uploaded.";
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error: There was an error uploading your file.";
            }
        }
    } else {
        echo "Error: " . $_FILES["zipfile"]["error"];
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload ZIP Archive</title>
    <style>
        body {
            font-family: "Ada Lovelace", sans-serif;
            background-color: #f0e6f6;
            color: #3a3a3a;
        }
        form {
            margin: 50px auto;
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
        }
        input[type="file"]{
            margin-bottom: 20px;
        }
        input[type="submit"] {
            background-color: #885ead;
            color: #fff;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #7a4e9a;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Upload ZIP Archive</h2>
        <input type="file" name="zipfile" id="zipfile" required>
        <input type="submit" value="Upload Zip File">
    </form>
</body>
</html>
