<?php
// Define database connection parameters
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

// Create table for storing file metadata, if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_zip_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["zipFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file is a actual zip file or fake zip file
    if(isset($_POST["submit"])) {
        $check = mime_content_type($_FILES["zipFile"]["tmp_name"]);
        if($check !== false) {
            if($imageFileType != "zip") {
                echo "Sorry, only ZIP files are allowed.";
                $uploadOk = 0;
            }
        } else {
            echo "File is not a zip.";
            $uploadOk = 0;
        }
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["zipFile"]["tmp_name"], $target_file)) {
            // Insert file metadata into the database
            $sql = "INSERT INTO uploaded_zip_files (file_name) VALUES ('" . basename($_FILES["zipFile"]["name"]) . "')";

            if ($conn->query($sql) === TRUE) {
                echo "The file ". htmlspecialchars(basename($_FILES["zipFile"]["name"])). " has been uploaded.";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZIP File Upload</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f0f0f0;
            padding: 20px;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
        }
        input[type=file], input[type=submit] {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h2>Upload a ZIP File for Archiving</h2>

<form action="" method="post" enctype="multipart/form-data">
    Select ZIP file to upload:
    <input type="file" name="zipFile" id="zipFile">
    <input type="submit" value="Upload ZIP" name="submit">
</form>

</body>
</html>
