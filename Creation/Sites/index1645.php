<?php
// Define MySQL connection details
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

// Create connection to MySQL database
$conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for uploaded Photoshop files if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["photoshopFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photoshopFile"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a Photoshop file
    if ($imageFileType != "psd") {
        echo "Sorry, only PSD files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["photoshopFile"]["tmp_name"], $target_file)) {
            // Insert file info into database
            $stmt = $conn->prepare("INSERT INTO uploaded_files (filename) VALUES (?)");
            $stmt->bind_param("s", $target_file);
            $stmt->execute();

            echo "The file " . htmlspecialchars(basename($_FILES["photoshopFile"]["name"])) . " has been uploaded.";
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
    <title>Image Upload</title>
</head>
<body>
    <h2>Upload Photoshop File for Editing</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="photoshopFile">Upload Landscape Photo:</label>
        <input type="file" name="photoshopFile" id="photoshopFile">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>
