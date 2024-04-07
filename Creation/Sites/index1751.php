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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS Documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
file_name VARCHAR(255) NOT NULL,
file_type VARCHAR(255) NOT NULL,
file_data LONGBLOB NOT NULL,
upload_time TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // echo "Table Documents created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileType = $_FILES['file']['type'];

    // Read the file
    $fp = fopen($fileTmpName, 'r');
    $fileContent = fread($fp, filesize($fileTmpName));
    $fileContent = addslashes($fileContent);
    fclose($fp);

    if(!get_magic_quotes_gpc()) {
        $fileName = addslashes($fileName);
    }

    // Insert file into database
    $query = "INSERT INTO Documents (file_name, file_type, file_data) VALUES ('$fileName', '$fileType', '{$fileContent}')";
    if($conn->query($query) === TRUE) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Scanned Document</title>
</head>
<body>
    <h2>Upload Scanned Document: Driver's License</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select document to upload:
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload Document" name="submit">
    </form>
</body>
</html>
