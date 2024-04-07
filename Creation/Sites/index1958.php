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

// Create table for file uploads if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS print_jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$conn->query($tableSql);

$message = '';

if(isset($_FILES['designFile']['name']) && $_FILES['designFile']['name'] != ''){
    $targetDirectory = "uploads/";
    $file = $_FILES['designFile']['name'];
    $path = pathinfo($file);
    $filename = $path['filename'];
    $ext = $path['extension'];
    $tempName = $_FILES['designFile']['tmp_name'];
    $pathFilenameExt = $targetDirectory.$filename.".".$ext;
    
    // Check if file already exists
    if (!file_exists($pathFilenameExt)) {
        move_uploaded_file($tempName, $pathFilenameExt);

        // Insert file info into the database
        $insertSql = "INSERT INTO print_jobs (file_name, file_path) VALUES (?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("ss", $filename, $pathFilenameExt);
        $stmt->execute();
        
        $message = "Congratulations! File Uploaded Successfully.";
    } else {
        $message = "Sorry, file already exists.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload for Printing Service</title>
</head>
<body>
    <h2>Upload your Wedding Invitation Design</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="designFile" required>
        <button type="submit">Upload</button>
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>
<?php $conn->close(); ?>
