


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

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS zip_archives (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["zipfile"])) {
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $target_file = $target_dir . basename($_FILES["zipfile"]["name"]);
  
    // Check if the file is a ZIP file
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if($fileType !== 'zip') {
        echo "Sorry, only ZIP files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["zipfile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["zipfile"]["name"])). " has been uploaded.";
            
            // Insert file info into database
            $insert_sql = "INSERT INTO zip_archives (file_name) VALUES ('" . $conn->real_escape_string(basename($_FILES["zipfile"]["name"])) . "')";
            
            if ($conn->query($insert_sql) === TRUE) {
                echo "Stored in database successfully";
            } else {
                echo "Error storing file info in database: " . $conn->error;
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
    <title>Upload ZIP Archive</title>
</head>
<body>

<h2>ZIP File Upload for Archiving</h2>

<form action="" method="post" enctype="multipart/form-data">
  Select ZIP file to upload:
  <input type="file" name="zipfile" id="zipfile" accept=".zip">
  <input type="submit" value="Upload Archive" name="submit">
</form>

</body>
</html>

This sample is ready for a basic deployment but again, ensure to implement additional security measures and validation according to the needs of your project, especially when dealing with file uploads and database interactions in a web environment.