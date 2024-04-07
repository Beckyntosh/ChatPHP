<?php
// Firmware Upload for IoT Devices
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
$sql = "CREATE TABLE IF NOT EXISTS firmware_updates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    device_type VARCHAR(30) NOT NULL,
    firmware_version VARCHAR(30) NOT NULL,
    file_name VARCHAR(100),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deviceType = $_POST["deviceType"];
    $firmwareVersion = $_POST["firmwareVersion"];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    // Check if file is a actual firmware or fake
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if ($fileType != "bin") {
        echo "Sorry, only BIN files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
            
            $sql = "INSERT INTO firmware_updates (device_type, firmware_version, file_name)
            VALUES ('".$deviceType."', '".$firmwareVersion."', '".$targetFile."')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Firmware Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgray;
        }
        .container {
            background-color: white;
            margin: 20px auto;
            padding: 20px;
            width: 50%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Firmware Upload for IoT Devices</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="deviceType">Device Type:</label><br>
        <input type="text" id="deviceType" name="deviceType" required><br><br>
        
        <label for="firmwareVersion">Firmware Version:</label><br>
        <input type="text" id="firmwareVersion" name="firmwareVersion" required><br><br>
        
        <label for="fileToUpload">Select firmware to upload:</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload" required><br><br>
        
        <button type="submit">Upload Firmware</button>
    </form>
</div>

</body>
</html>