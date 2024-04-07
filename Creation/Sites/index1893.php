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

// Create table for storing uploaded files info if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(256) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handler for file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["projectZip"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["projectZip"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a zip file
    if ($fileType != "zip") {
        echo "Sorry, only ZIP files are allowed.";
        exit;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        exit;
    }

    // Upload file
    if (move_uploaded_file($_FILES["projectZip"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename($_FILES["projectZip"]["name"])). " has been uploaded.";

        // Insert file info into database
        $stmt = $conn->prepare("INSERT INTO uploaded_files (file_name) VALUES (?)");
        $stmt->bind_param("s", $target_file);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wines Archive Upload</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            margin-top: 50px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            display: inline-block;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type=file], input[type=submit] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Welcome to the Wines Website Archive Upload</h2>
    <p>"Let's archive our project documents with a sip of wine 🍷"</p>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="projectZip">Upload a ZIP file for Archiving:</label>
        <input type="file" name="projectZip" id="projectZip" required>
        <input type="submit" value="Upload ZIP" name="submit">
    </form>
</body>
</html>
