<?php

// Database credentials
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

// Handle the file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['zip_file'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["zip_file"]["name"]);

    // Check if file is a zip
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($fileType != "zip") {
        echo "Sorry, only ZIP files are allowed.";
        exit;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        exit;
    }

    // Upload file
    if (move_uploaded_file($_FILES["zip_file"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["zip_file"]["name"])). " has been uploaded.";
        
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO archives (filename) VALUES (?)");
        $stmt->bind_param("s", $target_file);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfumes Archive Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe0f0;
            text-align: center;
            padding: 20px;
        }
        form {
            background-color: #fff3f8;
            padding: 20px;
            border-radius: 15px;
            display: inline-block;
            margin-top: 50px;
        }
        input[type=file], input[type=submit] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Upload ZIP File for Archiving Project Documents</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select ZIP to upload:
        <input type="file" name="zip_file" id="zip_file">
        <input type="submit" value="Upload ZIP" name="submit">
    </form>
</body>
</html>

(Note: This code assumes you have already created a database and a table named "archives" with at least one column "filename". This script will not run successfully without these prerequisites being met, and adjustments might be needed based on the specific server setup.)

(Note: For a production environment, additional security measures such as file size limits, better file existence checks, and prepared statements for database interactions should be considered and implemented.)