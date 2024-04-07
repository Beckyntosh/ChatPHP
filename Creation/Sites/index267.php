<?php
// Define connection parameters
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

// Check if table exists, if not create one
$tableCheckSQL = "SHOW TABLES LIKE 'email_attachments'";
$result = $conn->query($tableCheckSQL);

if ($result->num_rows == 0) {
    $createTableSQL = "CREATE TABLE email_attachments (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

    if ($conn->query($createTableSQL) !== TRUE) {
        die("Error creating table: " . $conn->error);
    }
}

$message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["attachment"]) && $_FILES["attachment"]["error"] == 0) {
        
        $filename = $_FILES["attachment"]["name"];
        $filetype = $_FILES["attachment"]["type"];
        $filesize = $_FILES["attachment"]["size"];

        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, ["jpg", "png", "pdf", "docx"])) {
            $message = "Error: Please upload a valid file format.";
        } else {
            // Move the file
            $newname = dirname(__FILE__) . '/uploads/' . $filename;
            if (!file_exists('uploads')) {
                mkdir('uploads', 0777, true);
            }
            if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $newname)) {
                $sql = "INSERT INTO email_attachments (filename, file_path) VALUES (?, ?)";

                if($stmt = $conn->prepare($sql)){
                    $stmt->bind_param("ss", $filename, $newname);

                    if($stmt->execute()){
                        $message = "File uploaded successfully.";
                    } else {
                        $message = "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $stmt->close();
                }
            } else {
                $message = "Error: There was a problem uploading your file. Please try again.";
            }
        }
    } else {
        $message = "Error: " . $_FILES["attachment"]["error"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Email Attachment</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .form-wrap { margin: 20px; text-align: center; }
        .submit-btn { margin-top: 10px; }
        .message { color: red; }
    </style>
</head>
<body>
    <div class="form-wrap">
        <h2>Upload Email Attachment</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="attachment" required>
            <input type="submit" class="submit-btn" value="Upload">
        </form>
        <?php if ($message) echo '<p class="message">' . $message . '</p>'; ?>
    </div>
</body>
</html>

<?php $conn->close(); ?>