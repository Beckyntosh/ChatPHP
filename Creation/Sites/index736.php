<?php
/* Database Connection */
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

// Create table for podcasts if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS podcasts (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
description TEXT,
file_path VARCHAR(255)
)";
if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["podcastFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["podcastFile"]["tmp_name"], $target_file)) {
            // Insert into database
            $sql = "INSERT INTO podcasts (title, description, file_path) VALUES ('$title', '$description', '$target_file')";
            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            echo "The file ". htmlspecialchars( basename( $_FILES["podcastFile"]["name"])). " has been uploaded.";
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
    <title>Upload Podcast</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #ff0000; color: #ffffff; }
        form { margin: 0 auto; width: 300px; padding: 20px; background-color: #f2f2f2; color: #000000; border-radius: 8px; }
        input, textarea { width: 100%; margin: 5px 0; padding: 8px; }
        .submit-btn { background-color: #4CAF50; color: #ffffff; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Upload a Podcast</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>
        <label for="podcastFile">Select file:</label>
        <input type="file" id="podcastFile" name="podcastFile" required>
        <input type="submit" value="Upload Podcast" name="submit" class="submit-btn">
    </form>
</body>
</html>