<?php

// Database Connection
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

// Create additional table if doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    filename VARCHAR(255),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

// Handle File Upload
$message = '';
if (isset($_POST['upload'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
        // Assuming user_id is 1 for demonstration
        $sql = "INSERT INTO uploads (user_id, filename) VALUES (1, '$fileName')";

        if ($conn->query($sql) === true) {
            $message = "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    } else {
        $message = "Sorry, there was an error uploading your file.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cameras Online Auction Site</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        form {
            margin-top: 20px;
        }

        input[type="file"], input[type="submit"] {
            margin-top: 10px;
        }

        .message {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Camera Online Auction Site - File Upload</h1>
    <?php if (!empty($message)): ?>
        <p class="message"><?= $message; ?></p>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="upload">
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>