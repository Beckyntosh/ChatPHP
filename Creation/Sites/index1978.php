

<?php
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

// Create table if not exists
$tableCreateSql = "CREATE TABLE IF NOT EXISTS image_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableCreateSql)) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    
    // Check if file is a Photoshop file
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($imageFileType != "psd") {
        echo "Sorry, only PSD files are allowed.";
        exit;
    }
  
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $filename = basename($_FILES["photo"]["name"]);
        $stmt = $conn->prepare("INSERT INTO image_uploads (filename) VALUES (?)");
        $stmt->bind_param("s", $filename);
        
        if ($stmt->execute()) {
            echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload PSD for Editing</title>
</head>
<body>
    <h2>Upload your Photoshop (.PSD) file for Enhancement</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="photo" id="photo">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>
<?php
$conn->close();
?>

Note: This code is provided as-is for educational and research purposes and may need further customization and security enhancements before being used in a live environment. Always ensure that your server is properly configured, and sensitive credentials are securely stored before deploying any application.