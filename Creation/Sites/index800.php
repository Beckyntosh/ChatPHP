<?php
// Database configuration
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create table for subtitles if it doesn't exist
$subtitleTableSql = "CREATE TABLE IF NOT EXISTS subtitles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$mysqli->query($subtitleTableSql)) {
    die("Error creating table: " . $mysqli->error);
}

// File upload functionality
$uploadStatus = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["subtitleFile"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["subtitleFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["subtitleFile"]["size"] > 500000) {
        $uploadStatus = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "srt" && $fileType != "vtt" ) {
        $uploadStatus = "Sorry, only SRT & VTT files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $uploadStatus = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["subtitleFile"]["tmp_name"], $targetFile)) {
            $filename = basename($_FILES["subtitleFile"]["name"]);
            $stmt = $mysqli->prepare("INSERT INTO subtitles (filename) VALUES (?)");
            $stmt->bind_param("s", $filename);
            if($stmt->execute()){
                $uploadStatus = "The file ". htmlspecialchars( basename( $_FILES["subtitleFile"]["name"])). " has been uploaded.";
            } else {
                $uploadStatus = "Sorry, there was an error uploading your file.";
            }
            $stmt->close();
        } else {
            $uploadStatus = "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Subtitle - Health and Wellness</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4e7c9;
            color: #856404;
            text-align: center;
            padding: 20px;
        }
        .upload-form {
            background-color: #eddab7;
            border: 2px solid #957d47;
            padding: 20px;
            margin-top: 20px;
            display: inline-block;
        }
        .btn {
            background-color: #d8ae70;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #c8975f;
        }
    </style>
</head>
<body>
<h2>Desert Dazzle - Subtitle Upload</h2>
<?php if (!empty($uploadStatus)): ?>
    <p><?php echo $uploadStatus; ?></p>
<?php endif; ?>
<div class="upload-form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select subtitle file to upload:
        <input type="file" name="subtitleFile" id="subtitleFile">
        <br>
        <input type="submit" value="Upload Subtitle" name="submit" class="btn">
    </form>
</div>
</body>
</html>
<?php $mysqli->close(); ?>