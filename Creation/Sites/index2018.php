<?php
// Simple Vector File Upload and Sharing System
// Note: This example uses minimal security features. Before deployment, enhance with security best practices.

// Database Credentials
$servername = "db";
$username = "root"; // Default username
$password = "root"; // Given root password
$dbname = "my_database"; // Database name

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for storing file details if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS vector_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["vectorFile"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["vectorFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if file is a actual vector or fake
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["vectorFile"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not a vector.";
            $uploadOk = 0;
        }
    }

    // Check file size - 5MB maximum
    if ($_FILES["vectorFile"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "svg" && $fileType != "ai" && $fileType != "eps") {
        echo "Sorry, only SVG, AI & EPS files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["vectorFile"]["tmp_name"], $targetFile)) {
            $fileName = basename($_FILES["vectorFile"]["name"]);
            $sql = "INSERT INTO vector_files (file_name) VALUES ('$fileName')";

            if ($conn->query($sql) === TRUE) {
                echo "The file ". htmlspecialchars( basename( $_FILES["vectorFile"]["name"])). " has been uploaded.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vector File Upload</title>
</head>
<body>

<h2>Upload Vector File</h2>
<form action="?" method="post" enctype="multipart/form-data">
    Select vector file to upload (SVG, AI, EPS):
    <input type="file" name="vectorFile" id="vectorFile">
    <input type="submit" value="Upload Vector" name="submit">
</form>

</body>
</html>
