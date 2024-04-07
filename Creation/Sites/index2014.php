<?php
// Define connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$tableCheck = "CREATE TABLE IF NOT EXISTS designs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($tableCheck) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// File upload logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["vectorFile"])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["vectorFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('ai', 'eps', 'svg', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["vectorFile"]["tmp_name"], $targetFilePath)) {
            // Insert file name into database
            $insert = $conn->query("INSERT into designs (filename) VALUES ('" . $fileName . "')");
            if ($insert) {
                $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'Sorry, only AI, EPS, SVG & PDF files are allowed to upload.';
    }
} else {
    $statusMsg = '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vector File Upload for Design Sharing</title>
</head>
<body>
    <h2>Upload a Vector File - Company Logo</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Select a Vector File:</label>
        <input type="file" name="vectorFile" id="vectorFile">
        <input type="submit" value="Upload" name="submit">
    </form>

    <?php if (!empty($statusMsg)) { ?>
        <p><?php echo $statusMsg; ?></p>
    <?php } ?>

    <h3>Uploaded Designs:</h3>
    <?php
    $query = $conn->query("SELECT * FROM designs ORDER BY upload_time DESC");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $filePath = 'uploads/' . $row["filename"];
            echo "<p><a href='".$filePath."' target='_blank'>".$row["filename"]."</a></p>";
        }
    } else {
        echo "<p>No designs found...</p>";
    }
    ?>
</body>
</html>
<?php
$conn->close();
?>

Please note, for security reasons, the handling of file uploads here is very basic. In a real-world scenario, always ensure proper security measures are in place, such as validation of MIME types, prevention of overwriting existing files, implementing proper user authentication, and using prepared statements for database interactions. Additionally, having PHP code generate directly deployable and compliable solutions without a thorough context or requirements understanding could lead to security vulnerabilities and should be used with caution in a production environment.