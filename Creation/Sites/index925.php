<?php
// Simple web application code for Secure File Encryption for Uploads
// NOTE: This is a basic example and shouldn't be used as is in production without further security enhancements.

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["uploadedFile"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["uploadedFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    
    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($fileType != "pdf" && $fileType != "docx" && $fileType != "txt") {
        echo "Sorry, only PDF, DOCX & TXT files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload file
    } else {
        $encryptedFileName = encryptFile($_FILES["uploadedFile"]["tmp_name"], $targetFile);
        if ($encryptedFileName) {
            echo "The file ". htmlspecialchars(basename($_FILES["uploadedFile"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function encryptFile($source, $destination) {
    $key = substr(hash('sha256', 'my_secret_key', true), 0, 32);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $data = file_get_contents($source);
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    $result = file_put_contents($destination, $encrypted . '::' . base64_encode($iv));
    return $result ? $destination : false;
}

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // Table created successfully
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure File Upload</title>
</head>
<body>

<h2>Upload File for Encryption</h2>
<form action="" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="uploadedFile" id="uploadedFile">
    <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>
