<?php
// Set up connection parameters
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

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS software_packages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    package_name VARCHAR(30) NOT NULL,
    version VARCHAR(10) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["softwarePackage"])) {
    $packageName = $_POST['packageName'];
    $version = $_POST['version'];
    $fileName = $_FILES["softwarePackage"]["name"];
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . $fileName;
    
    if (move_uploaded_file($_FILES["softwarePackage"]["tmp_name"], $targetFilePath)) {
        $sql = $conn->prepare("INSERT INTO software_packages (package_name, version) VALUES (?, ?)");
        $sql->bind_param("ss", $packageName, $version);
        
        if ($sql->execute()) {
            echo "Package uploaded and database updated successfully.";
        } else {
            echo "Error: " . $sql->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Software Package Upload</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { width: 80%; margin: 0 auto; background-color: #fff; padding: 20px; }
        .upload-form { display: flex; flex-direction: column; width: 50%; }
        label, input, button { margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Software Package</h2>
        <form class="upload-form" action="" method="post" enctype="multipart/form-data">
            <label for="packageName">Package Name:</label>
            <input type="text" id="packageName" name="packageName" required>
            
            <label for="version">Version:</label>
            <input type="text" id="version" name="version" required>
            
            <label for="softwarePackage">Select package to upload:</label>
            <input type="file" id="softwarePackage" name="softwarePackage" required>
            
            <button type="submit">Upload Package</button>
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>
