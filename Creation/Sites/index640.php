<?php
// Connect to the database
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

// Create subtitle_files table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS subtitle_files (
id INT AUTO_INCREMENT PRIMARY KEY,
file_name VARCHAR(255),
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
  echo "Table subtitle_files created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["subtitleFile"])) {
    $target_directory = "uploads/";
    $target_file = $target_directory . basename($_FILES["subtitleFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "srt" && $imageFileType != "vtt" ) {
        echo "Sorry, only SRT & VTT files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["subtitleFile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["subtitleFile"]["name"])). " has been uploaded.";
            $sql = "INSERT INTO subtitle_files (file_name) VALUES ('".basename($_FILES["subtitleFile"]["name"])."')";

            if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
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
    <title>Upload Subtitle File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Winter theme */
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px #aaa;
            border-radius: 8px;
        }
        .upload-form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload Subtitle File</h2>
    <p>Please upload your subtitle file (.srt, .vtt)</p>
    <form action="" method="post" enctype="multipart/form-data" class="upload-form">
        <input type="file" name="subtitleFile" id="subtitleFile">
        <button type="submit">Upload File</button>
    </form>
</div>
</body>
</html>