<?php
// set variables for database connection
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL Database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if upload file is not empty
    if (!empty($_FILES["configFile"]["name"])) {
        // Path to save the uploaded file
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["configFile"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

        // Allow certain file formats
        if($fileType != "txt" && $fileType != "json") {
            echo "Sorry, only TXT & JSON files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["configFile"]["tmp_name"], $targetFile)) {
                echo "The file ". htmlspecialchars(basename($_FILES["configFile"]["name"])). " has been uploaded.";
                // Process the uploaded file
                $configData = file_get_contents($targetFile);
                // Assume JSON for simplicity, adjust based on actual use case
                $configArray = json_decode($configData, true);
                // Here you would process configuration and potentially update the database
                // For simplicity, let's assume $configArray["setting_name"] == "site_theme"
                $sql = "INSERT INTO SiteSettings (setting_name, setting_value) VALUES ('site_theme', ?)";
                $stmt = $conn->prepare($sql);
                if($stmt) {
                    $stmt->bind_param("s", $configArray["site_theme"]);
                    $stmt->execute();
                    $stmt->close();
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

// HTML and PHP mixed for simplicity
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Configuration File</title>
</head>
<body>
    <h2>Upload Configuration for Makeup Website</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="configFile" id="configFile">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>
<?php
// Close connection
$conn->close();
?>