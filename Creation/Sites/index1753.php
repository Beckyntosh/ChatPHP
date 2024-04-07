<?php
$host = "db";
$db_user = "root";
$db_password = "root";
$db_name = "my_database";

// Create connection
$conn = new mysqli($host, $db_user, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create attachment table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS email_attachments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    mime_type VARCHAR(100),
    size INT(10),
    content LONGBLOB NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["attachment"]["name"]) && $_FILES["attachment"]["error"] == 0) {
        $filename = $conn->real_escape_string($_FILES["attachment"]["name"]);
        $filetype = $conn->real_escape_string($_FILES["attachment"]["type"]);
        $filesize = intval($_FILES["attachment"]["size"]);
        // File content to store in DB
        $fileContent = $conn->real_escape_string(file_get_contents($_FILES["attachment"]["tmp_name"]));
        
        // Insert file info and content into database
        $sql = "INSERT INTO email_attachments (filename, mime_type, size, content) VALUES ('$filename', '$filetype', $filesize, '$fileContent')";

        if ($conn->query($sql) === TRUE) {
            $message = "File uploaded successfully.";
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $message = "Error uploading file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload Attachment</title>
<style>
    body{ font-family: Arial, sans-serif; background-color: #f0f0f0; margin: 0; padding: 0; }
    .container{ max-width: 700px; margin: 50px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
</style>
</head>
<body>
<div class="container">
    <h2>Email Attachment Upload</h2>
    <p>Please select a file to upload as an email attachment.</p>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="attachment" id="attachment">
        <input type="submit" value="Upload Attachment">
    </form>
    <?php echo $message; ?>
</div>
</body>
</html>
