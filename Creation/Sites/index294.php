<?php
// Database connection
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

// Create table for animation files if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS animation_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
filepath VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['animationFile'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["animationFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('mp4','avi','mov');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["animationFile"]["tmp_name"], $targetFilePath)){
            // Insert file information into the database
            $insert = $conn->query("INSERT into animation_files (filename, filepath) VALUES ('".$fileName."', '".$targetFilePath."')");
            if($insert){
                $message = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $message = "File upload failed, please try again.";
            } 
        }else{
            $message = "Sorry, there was an error uploading your file.";
        }
    }else{
        $message = "Sorry, only MP4, AVI, & MOV files are allowed to upload.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animation File Upload for Collaborative Editing</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .upload-container { padding: 20px; background-color: #f0f0f0; margin: 10px auto; width: 300px; text-align: center; }
        input[type="file"] { margin: 10px 0; }
    </style>
</head>
<body>
    <div class="upload-container">
        <h2>Upload Animation File</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="animationFile" required>
            <input type="submit" name="submit" value="Upload">
        </form>
        <?php if(!empty($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>