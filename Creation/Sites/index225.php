<!DOCTYPE html>
<html>
<head>
    <title>ZIP File Upload for Archiving</title>
</head>
<body>

<h2>Upload a ZIP File for Archiving</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="zipFile" required>
    <button type="submit" name="upload">Upload</button>
</form>

<?php
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS uploaded_zips (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($table_sql)) {
    echo "Error creating table: " . $conn->error;
}

function unzipAndArchive($file, $conn) {
    $zip = new ZipArchive;
    if ($zip->open($file) === TRUE) {
        for($i = 0; $i < $zip->numFiles; $i++) {
            $filename = $zip->getNameIndex($i);
            // For simplicity, extracted files are not stored; in a real case scenario, files would be moved to a secure location.
            // This is just a demonstration of accessing the files within.
        }
        $zip->close();

        // Insert file info into the database
        $stmt = $conn->prepare("INSERT INTO uploaded_zips (filename) VALUES (?)");
        $stmt->bind_param("s", basename($file));
        $stmt->execute();
        $stmt->close();

        echo "ZIP file is uploaded and processed successfully.";
    } else {
        echo "Failed to open the ZIP file.";
    }
}

if(isset($_POST['upload'])) {
    $file = $_FILES['zipFile']['tmp_name'];
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES["zipFile"]["name"]);

    if(move_uploaded_file($_FILES['zipFile']['tmp_name'], $target_file)){
        unzipAndArchive($target_file, $conn);
    } else {
        echo "There was an error uploading your file.";
    }
}

$conn->close();
?>

</body>
</html>