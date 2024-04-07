<?php
// Define connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for animation files if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS animation_files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    feedback TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// File upload logic
$uploadStatus = '';
if (isset($_POST['submit'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(!empty($_FILES["file"]["name"])){
        // Allow certain file formats
        $allowTypes = array('zip', 'rar', '7z');
        if(in_array($fileType, $allowTypes)){
            // Upload file to the server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                $sql = $conn->prepare("INSERT INTO animation_files (filename) VALUES (?)");
                $sql->bind_param("s", $fileName);
                if($sql->execute()){
                    $uploadStatus = 'Your file has been uploaded successfully.';
                }else{
                    $uploadStatus = 'File upload failed, please try again.';
                } 
            }else{
                $uploadStatus = 'Sorry, there was an error uploading your file.';
            }
        }else{
            $uploadStatus = 'Sorry, only ZIP, RAR, & 7Z files are allowed to upload.';
        }
    }else{
        $uploadStatus = 'Please select a file to upload.';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Animation File Upload</title>
</head>
<body>

<h2>Upload Animation File</h2>
<p><?php echo $uploadStatus; ?></p>
<form action="" method="post" enctype="multipart/form-data">
    Select Animation File to Upload:
    <input type="file" name="file">
    <input type="submit" name="submit" value="Upload">
</form>

<h2>Uploaded Files</h2>
<?php
$sql = "SELECT * FROM animation_files ORDER BY upload_time DESC";
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p><b>File Name:</b> " . $row['filename'] . " <b>Uploaded on:</b> " . $row['upload_time'] . "</p>";
        echo "<p><b>Feedback:</b> " . $row['feedback'] . "</p>";
        echo "</div>";
    }
    $result->free();
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>
