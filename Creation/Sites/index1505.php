<?php
// index.php
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

// Create upload table if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$message = '';

if (isset($_FILES['document']['name'])) {
    // Preparing for file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);
    $uploadOk = 1;
    $documentFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Checking if file already exists
    if (file_exists($target_file)) {
        $message = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($documentFileType != "pdf" && $documentFileType != "doc" && $documentFileType != "docx") {
        $message = "Sorry, only PDF, DOC & DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded. " . $message;
    } else {
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
            $message = "The file ". htmlspecialchars(basename($_FILES["document"]["name"])). " has been uploaded.";
            // Saving file details to database
            $sql = "INSERT INTO uploads (filename) VALUES ('" . basename($_FILES["document"]["name"]) . "')";
    
            if ($conn->query($sql) !== TRUE) {
                $message = "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Legal Document Upload</title>
</head>
<body>
<h2>Upload a Document for E-Signing</h2>
<p><?php echo $message; ?></p>
<form action="index.php" method="post" enctype="multipart/form-data">
    Select document to upload:
    <input type="file" name="document" id="document">
    <input type="submit" value="Upload Document" name="submit">
</form>
</body>
</html>
