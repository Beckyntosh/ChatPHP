<?php
// Handle CAD file upload and save metadata to MySQL database for a 3D Printing Service on a Video Game website

// MySQL connection information
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DATABASE', 'my_database');
define('MYSQL_SERVER', 'db');

// Connect to MySQL
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for uploads if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS `cad_uploads` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `file_name` VARCHAR(255) NOT NULL,
    `upload_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

// Process file upload
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['cad_file'])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES['cad_file']['name']);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a CAD file
    if ($fileType != "cad" && $fileType != "stl" && $fileType != "obj") {
        $message = "Sorry, only CAD, STL, and OBJ files are allowed.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        $message = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message .= " Your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES['cad_file']['tmp_name'], $targetFile)) {
            $message = "The file ". htmlspecialchars(basename($_FILES['cad_file']['name'])). " has been uploaded.";

            // Save upload details to database
            $stmt = $conn->prepare("INSERT INTO cad_uploads (file_name) VALUES (?)");
            $stmt->bind_param("s", $filename);
            $filename = $_FILES['cad_file']['name'];
            $stmt->execute();
            $stmt->close();
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload CAD File for 3D Printing</title>
    <style>
        body {
            background-color: #444;
            color: #ddd;
            font-family: Arial, sans-serif;
        }
        input[type="file"] {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Upload CAD File for 3D Printing</h2>
    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        Select CAD file to upload:
        <input type="file" name="cad_file" id="cad_file">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>

<?php
$conn->close();
?>