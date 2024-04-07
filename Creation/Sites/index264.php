<?php
// Check if DB connection exists, if not, create it.
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

// Create table for storing backup file info
$table = "CREATE TABLE IF NOT EXISTS backup_files (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($table) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Function to handle file upload
function uploadBackupFile($conn) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["backupFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "sql" ) {
        echo "Sorry, only SQL files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["backupFile"]["tmp_name"], $target_file)) {
            $fileName = basename( $_FILES["backupFile"]["name"]);
            $sql = "INSERT INTO backup_files (file_name) VALUES ('".$fileName."')";
            
            if ($conn->query($sql) === TRUE) {
                echo "The file ". htmlspecialchars( basename( $_FILES["backupFile"]["name"])). " has been uploaded.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Handle file upload
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["backupFile"])) {
    uploadBackupFile($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Database Backup Upload - Bedding Website</title>
</head>
<body>
    <h2>Upload Database Backup</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select backup file to upload:
        <input type="file" name="backupFile" id="backupFile">
        <input type="submit" value="Upload Backup" name="submit">
    </form>
</body>
</html>

<?php
$conn->close();
?>