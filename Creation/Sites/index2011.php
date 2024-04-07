<?php
// Basic error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
define("DB_SERVERNAME", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "my_database");

// Connect to the database
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS vector_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$connection->query($sql)) {
    die("Error creating table: " . $connection->error);
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["vectorFile"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["vectorFile"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a vector
    if ($fileType != "svg" && $fileType != "ai" && $fileType != "eps") {
        echo "Sorry, only SVG, AI & EPS files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["vectorFile"]["tmp_name"], $targetFile)) {
            $sql = $connection->prepare("INSERT INTO vector_files (filename) VALUES (?)");
            $sql->bind_param("s", $targetFile);
            if ($sql->execute()) {
                echo "File has been uploaded and saved to the database.";
            } else {
                echo "Error saving file info to database.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vector File Upload</title>
</head>
<body>
    <h2>Upload a Vector Design</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="vectorFile">Select vector file to upload:</label>
        <input type="file" name="vectorFile" id="vectorFile">
        <input type="submit" value="Upload Vector" name="submit">
    </form>
</body>
</html>

<?php
$connection->close();
?>
