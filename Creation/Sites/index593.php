<?php
// Database connection
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

// Create table for portfolio uploads if not exists
$sql = "CREATE TABLE IF NOT EXISTS portfolio_uploads (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
description TEXT,
image_url VARCHAR(255)
)";
if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['portfolio_image'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["portfolio_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["portfolio_image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["portfolio_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["portfolio_image"]["tmp_name"], $target_file)) {
            // Insert into database
            $sql = "INSERT INTO portfolio_uploads (title, description, image_url) VALUES ('".$_POST['title']."', '".$_POST['description']."', '".$target_file."')";
            if ($conn->query($sql) === TRUE) {
              echo "The file ". htmlspecialchars( basename( $_FILES["portfolio_image"]["name"])). " has been uploaded.";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Wines Virtual Reality Experience Showcase</title>
    <style>
    body {
        background-color: #622569;
        color: #F5F3F5;
        font-family: "Times New Roman", Times, serif;
    }
    .container {
        width: 80%;
        margin: auto;
        overflow: hidden;
    }
    header {
        background: #030303;
        color: #f4c20d;
        padding-top: 30px;
        min-height: 70px;
        border-bottom: #0769ad 3px solid;
    }
    #main {
        text-align: center;
        padding: 25px;
    }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Wines VR Experience Showcase: Portfolio Upload</h1>
        </div>
    </header>
    <div id="main">
        <div class="container">
            <h2>Upload your Portfolio</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Title" required><br><br>
                <textarea name="description" placeholder="Description" required></textarea><br><br>
                <input type="file" name="portfolio_image" required><br><br>
                <input type="submit" value="Upload Portfolio" name="submit">
            </form>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>