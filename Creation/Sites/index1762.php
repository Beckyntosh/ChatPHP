<?php
// Define MySQL settings
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Connect to MySQL
$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Create table for uploaded documents if not exists
$createTable = "CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$mysqli->query($createTable)) {
    die("Error creating table: " . $mysqli->error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['document'])) {
    $targetDirectory = "uploads/";
    $fileName = basename($_FILES["document"]["name"]);
    $targetFilePath = $targetDirectory . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["document"]["tmp_name"], $targetFilePath)){
            // Insert file info into database
            $insert = $mysqli->query("INSERT into uploaded_documents (filename, file_path) VALUES ('".$fileName."', '".$targetFilePath."')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
} else {
    $statusMsg = 'Please select a file to upload.';
}

// Close MySQL connection
$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload your document</title>
    <style>
        body {
            font-family: 'Ada', sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }
        .upload-form {
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            margin-top: 50px;
        }
        input[type="file"] {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background: blue;
            color: white;
            border: 0;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .status-msg {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="upload-form">
        <h2>Upload your Driver's License</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="document" required>
            <input type="submit" name="submit" value="Upload Document">
        </form>
        <?php if(!empty($statusMsg)){ ?>
            <div class="status-msg"><?php echo $statusMsg; ?></div>
        <?php } ?>
    </div>
</body>
</html>
