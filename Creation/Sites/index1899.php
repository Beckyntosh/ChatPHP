<?php
// Connect to Database
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

// Create table for uploaded ZIP archives if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS zip_archives (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    echo "";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

// HTML and PHP for file upload
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["zipFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["zipFile"]["name"]);
    $uploadOk = 1;
    $fileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if file is a zip
    if($fileType != "zip") {
        echo "Sorry, only ZIP files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["zipFile"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["zipFile"]["name"]). " has been uploaded.";

            // Insert file info into database
            $conn = new mysqli($servername, $username, $password, $dbname);
            $filename = basename($_FILES["zipFile"]["name"]);
            $sql = "INSERT INTO zip_archives (filename) VALUES ('$filename')";

            if($conn->query($sql) === TRUE){
                echo " and saved into database.";
            } else {
                echo " but there was an error saving into database: " . $conn->error;
            }

            $conn->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: pink;
            color: darkred;
            text-align: center;
        }
        .upload-container {
            margin: 20px;
            padding: 20px;
            border: 2px dashed darkred;
            border-radius: 5px;
        }
        input[type=file], input[type=submit] {
            margin: 10px;
        }
    </style>
</head>
<body>

<div class="upload-container">
    <h2>Upload a ZIP File for Archiving - Project Alpha</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select ZIP file to upload:
        <input type="file" name="zipFile" id="zipFile">
        <input type="submit" value="Upload ZIP" name="submit">
    </form>
</div>

</body>
</html>
