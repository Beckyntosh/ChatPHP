<?php
// DB connection parameters
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check and create the 'uploads' table if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS uploads (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($createTableSql)) {
    die("Error creating table: " . $conn->error);
}

$message = ''; // Feedback message to user

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["document"]["name"]);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        $message = "Sorry, file already exists.";
        $uploadOk = false;
    }

    // Check file size
    if ($_FILES["document"]["size"] > 5000000) { // 5MB limit
        $message = "Sorry, your file is too large.";
        $uploadOk = false;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
        $message = "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = false;
    }

    // Check if $uploadOk is set to false by an error
    if ($uploadOk == false) {
        $message .= "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFile)) {
            // Insert file info into the database
            $filename = $conn->real_escape_string($_FILES["document"]["name"]);
            $filepath = $conn->real_escape_string($targetFile);
            $insertSql = "INSERT INTO uploads (filename, filepath) VALUES ('$filename', '$filepath')";
            
            if ($conn->query($insertSql) === TRUE) {
                $message = "The file ". htmlspecialchars( basename( $_FILES["document"]["name"])). " has been uploaded.";
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            text-align: center;
            padding: 20px;
        }
        .container {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
        input[type='file'] {
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload Scanned Document</h2>
    <p>Please upload a scanned copy of your Driver's License for verification.</p>
    <?php if($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="document" id="document" required>
        <input type="submit" value="Upload Document" name="submit">
    </form>
</div>

</body>
</html>
