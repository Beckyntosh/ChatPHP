<?php
$host = "db";
$db = "my_database";
$password="root";
$user="root";

// Create connection
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

if($_POST) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["licenseFile"]["name"]);
    if (move_uploaded_file($_FILES["licenseFile"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO users (license) VALUES ('".$target_file."')";
        if ($conn->query($sql) === TRUE) {
            echo "File Uploaded successfully.";
        } else {
           echo "Error uploading file.";
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background: url('forest_image.jpg');
            background-size: cover;
            color: #ffffff;
        }
        .container {
            background: rgba(0,0,0,0.5);
            margin: auto;
            padding: 20px; 
            width: 400px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <h3>Bath Products E-Learning Platform - License Upload</h3><br>
        <div>Upload License:</div><br>
        <input type="file" name="licenseFile" id="licenseFile"><br><br>
        <button type="submit" value="Upload License" name="submit">Upload License</button>
    </form>
</div>
</body>
</html>