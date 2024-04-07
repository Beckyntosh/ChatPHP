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

// Create table query
$sql = "CREATE TABLE IF NOT EXISTS images (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
uploaded TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table images created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// File upload process
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photoshopFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photoshopFile"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($imageFileType != "psd") {
        echo "Sorry, only PSD files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["photoshopFile"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO images (filename) VALUES ('".basename($_FILES["photoshopFile"]["name"])."')";

            if ($conn->query($sql) === TRUE) {
                echo "The file ". htmlspecialchars( basename( $_FILES["photoshopFile"]["name"])). " has been uploaded.";
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
<html>
<head>
    <title>Photoshop File Upload for Image Editing</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { max-width: 600px; margin: 50px auto; background: white; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .btn { display: inline-block; background: #007bff; color: #ffffff; padding: 10px 20px; margin: 10px 0; border-radius: 5px; text-decoration: none; }
        .btn:hover { background: #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload Your Photoshop (.PSD) for Editing</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="photoshopFile" id="photoshopFile">
        <input type="submit" value="Upload Image" name="submit" class="btn">
    </form>
</div>
</body>
</html>
