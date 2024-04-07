<?php

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["weddingDesign"])) {
    
    // File information
    $target_directory = "uploads/";
    $file = $_FILES["weddingDesign"];
    $target_file = $target_directory . basename($file["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check file size
    if ($file["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "pdf" ) {
        echo "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            // Save file information into the database
            $sql = "INSERT INTO prints (filename, upload_time) VALUES (?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $target_file);
            $stmt->execute();

            echo "The file ". htmlspecialchars(basename($file["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS prints (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP
    )";

if ($conn->query($table) === TRUE) {
    // echo "Table prints created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Wedding Invitation Design</title>
    <style>
        body {
            font-family: 'Ada Lovelace', serif;
        }
        form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }
        input {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h2>Upload Your Wedding Invitation Design</h2>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="weddingDesign">Select file to upload:</label>
        <input type="file" name="weddingDesign" id="weddingDesign">
        <input type="submit" value="Upload Design" name="submit">
    </form>

</body>
</html>
