<?php
// Firmware Upload System for IoT Devices - Smart Thermostat Example

// Define database connection constants
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Establish database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for firmware data if it doesn't exist
$tableQuery = "CREATE TABLE IF NOT EXISTS firmware_updates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    device_type VARCHAR(255) NOT NULL,
    firmware_version VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_date DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($tableQuery)) {
    die("Error creating table: " . $conn->error);
}

// Handle upload
$message = ''; // To display messages to the user

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deviceType = 'Smart Thermostat'; // static for this example
    $firmwareVersion = $_POST['firmware_version'];
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($_FILES["file"]["name"])) {
        // Allow certain file formats
        $allowTypes = array('zip', 'bin', 'tar');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // Insert into database
                $insert = $conn->query("INSERT INTO firmware_updates (device_type, firmware_version, file_path) VALUES ('$deviceType', '$firmwareVersion', '$targetFilePath')");

                if ($insert) {
                    $message = "The firmware has been uploaded successfully.";
                } else {
                    $message = "File upload failed, please try again.";
                }
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        } else {
            $message = 'Sorry, only ZIP, BIN, & TAR files are allowed to upload.';
        }
    } else {
        $message = 'Please select a file to upload.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta viewport="content=width=device-width, initial-scale=1">
    <title>Smart Thermostat Firmware Upload</title>
</head>
<body>
    <h2>Upload Firmware for Smart Thermostat</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="firmware_version">Firmware Version:</label>
        <input type="text" name="firmware_version" required>
        <label for="file">Select firmware file to upload (ZIP, BIN, TAR):</label>
        <input type="file" name="file" required>
        <input type="submit" value="Upload Firmware">
    </form>

    <?php echo $message; ?>
</body>
</html>
<?php
$conn->close();
?>
