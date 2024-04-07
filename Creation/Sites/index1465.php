<?php
// Database configuration
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for storing configuration files' data
$configTable = "CREATE TABLE IF NOT EXISTS config_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    createDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($configTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["configFile"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["configFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "conf") {
        echo "Sorry, only conf files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["configFile"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["configFile"]["name"])). " has been uploaded.";

            // Insert file info into database
            $stmt = $conn->prepare("INSERT INTO config_files (filename) VALUES (?)");
            $stmt->bind_param("s", $filename);

            $filename = htmlspecialchars(basename($_FILES["configFile"]["name"]));
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Configuration File Upload</title>
</head>
<body>
    <h2>Upload Configuration File for Server Setup</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="configFile" id="configFile">
        <button type="submit">Upload File</button>
    </form>
</body>
</html>
