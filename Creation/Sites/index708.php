<?php

// Database configuration
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

// Create attachments table if not exists
$createAttachmentsTableQuery = "
CREATE TABLE IF NOT EXISTS attachments (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
filename VARCHAR(255),
upload_date DATETIME DEFAULT CURRENT_TIMESTAMP
);";

if (!$conn->query($createAttachmentsTableQuery)) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["attachment"])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["attachment"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'doc', 'docx');
    if(in_array($fileType, $allowTypes)){
        // Upload file to the server
        if(move_uploaded_file($_FILES["attachment"]["tmp_name"], $targetFilePath)){
            // Insert file info to the database
            $insert = $conn->query("INSERT INTO attachments (user_id, filename) VALUES (1, '".$fileName."')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            } 
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC & DOCX files are allowed to upload.";
    }
} 

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal - Upload Resume</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* AliceBlue to create a spring theme */
            color: #303030;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="file"] {
            font-size: 16px;
        }
        .btn {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 17px;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .status {
            margin-top: 20px;
            padding: 10px;
            background-color: #dddddd;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Resume</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="attachment">Choose file</label>
                <input type="file" name="attachment" id="attachment" required>
            </div>
            <input type="submit" class="btn" value="Upload File" name="submit">
        </form>
        <?php if(isset($statusMsg)): ?>
            <div class="status">
                <?php echo $statusMsg; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>