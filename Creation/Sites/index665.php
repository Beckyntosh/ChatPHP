<?php
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

// Create themes table if it does not exist
$themeTableSql = "CREATE TABLE IF NOT EXISTS themes (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
file_path VARCHAR(255)
);";
if (!$conn->query($themeTableSql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Function to handle file upload
function uploadTheme($conn) {
    $target_dir = "themes/";
    $target_file = $target_dir . basename($_FILES["themeFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["themeFile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "css" ) {
        echo "Sorry, only CSS files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["themeFile"]["tmp_name"], $target_file)) {
            // Save file info in db
            $sql = "INSERT INTO themes (name, file_path) VALUES ('" . basename($_FILES["themeFile"]["name"]) . "', '" . $target_file . "')";
            
            if(mysqli_query($conn, $sql)){
                echo "The file ". htmlspecialchars(basename( $_FILES["themeFile"]["name"])). " has been uploaded.";
            } else{
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["themeFile"])) {
    uploadTheme($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Theme</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2c3e50;
            color: #ecf0f1;
        }
        .container {
            width: 80%;
            margin: auto;
            text-align: center;
        }
        input[type=file], input[type=submit] {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Industrial Chic Sunglasses Site - Theme Upload</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select theme to upload:
        <input type="file" name="themeFile" id="themeFile">
        <input type="submit" value="Upload Theme" name="submit">
    </form>
</div>
</body>
</html>