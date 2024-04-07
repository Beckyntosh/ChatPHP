<?php
// Set database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for storing uploaded source code files if not exists
$sql = "CREATE TABLE IF NOT EXISTS source_code_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  die("Error creating table: " . $conn->error);
}

// File upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["source_code"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["source_code"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "php" && $fileType != "html" && $fileType != "js" && $fileType != "css") {
        echo "Sorry, only PHP, HTML, JS, & CSS files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["source_code"]["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO source_code_files (filename, filepath) VALUES ('" . basename($_FILES["source_code"]["name"]) . "', '$targetFile')";
          
            if ($conn->query($sql) === TRUE) {
                echo "The file ". htmlspecialchars(basename($_FILES["source_code"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
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
    <title>Source Code Upload for Review</title>
    <style>
        body {
            font-family: 'Lucida Console', Monaco, monospace;
            background-color: #f4f1de;
            color: #3c3c3b;
        }
        .container {
            width: 80%;
            margin: auto;
            margin-top: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin-top: 20px;
        }
        input[type=file], input[type=submit] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Source Code for Review</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="source_code">Select file to upload:</label>
            <input type="file" name="source_code" id="source_code">
            <input type="submit" value="Upload File" name="submit">
        </form>
    </div>
</body>
</html>