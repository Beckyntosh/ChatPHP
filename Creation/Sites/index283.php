<?php

// Define connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Create table if not exists
$createTable = "CREATE TABLE IF NOT EXISTS software_packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    version VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    package_file VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
    die("ERROR: Could not create table. " . $conn->error);
}

$message = '';

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $version = $_POST['version'];
    $author = $_POST['author'];
    $fileName = $_FILES["package_file"]["name"];
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . basename($fileName);
    
    // Check if file is uploaded successfully
    if(move_uploaded_file($_FILES["package_file"]["tmp_name"], $targetFilePath)){
        $sql = "INSERT INTO software_packages (name, version, author, package_file) VALUES (?, ?, ?, ?)";

        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("ssss", $param_name, $param_version, $param_author, $param_file);
            
            $param_name = $name;
            $param_version = $version;
            $param_author = $author;
            $param_file = $targetFilePath;
            
            if($stmt->execute()){
                $message = "Package uploaded successfully.";
            } else{
                $message = "Error while uploading package.";
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Software Package</title>
    <style>
        body{ font: 1.2em solid; text-align: center; padding-top: 50px;}
        form{ display: inline-block; margin: auto; }
        .container{ padding: 20px; }
        .form-group { margin-bottom: 20px; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload Your Software Package</h2>

    <p><?php echo $message; ?></p>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>    
        <div class="form-group">
            <label>Version:</label>
            <input type="text" name="version" required>
        </div>
        <div class="form-group">
            <label>Author:</label>
            <input type="text" name="author" required>
        </div>
        <div class="form-group">
            <label>Package File:</label>
            <input type="file" name="package_file" required>
        </div>
        <input type="submit" value="Upload Package">
    </form>
</div>

</body>
</html>