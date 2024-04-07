<?php
// Connection parameters
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

// Create table for uploaded files if doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if file is being uploaded
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photoshopFile'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photoshopFile"]["name"]);
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "psd" && $imageFileType != "psb") {
        echo "Sorry, only PSD & PSB files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["photoshopFile"]["tmp_name"], $target_file)) {
            // File is valid, and was successfully uploaded
            $sql = "INSERT INTO uploaded_files (filename) VALUES ('" . $target_file . "')";
            if ($conn->query($sql) === TRUE) {
                echo "The file ". htmlspecialchars(basename($_FILES["photoshopFile"]["name"])). " has been uploaded.";
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photo Upload for Editing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .upload-form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Upload Your Photoshop File for Enhancement</h1>
    <form action="" method="post" enctype="multipart/form-data" class="upload-form">
        Select image to upload:
        <input type="file" name="photoshopFile" id="photoshopFile" accept=".psd, .psb">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>

<?php
$conn->close();
?>
