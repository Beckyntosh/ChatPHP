<?php
// Connect to the database
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

// Create table for storing archive information if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS archive_info (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if file has been uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["zipFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($_FILES["zipFile"]["name"]) && $fileType == 'zip') {
        // Upload file to the server
        if (move_uploaded_file($_FILES["zipFile"]["tmp_name"], $targetFilePath)) {
            // Insert file information into the database
            $sql = $conn->prepare("INSERT INTO archive_info (name) VALUES (?)");
            $sql->bind_param("s", $fileName);

            if ($sql->execute()) {
                echo "The file " . htmlspecialchars(basename($_FILES["zipFile"]["name"])) . " has been uploaded successfully.";
            } else {
                echo "There was an error uploading your file.";
            }
            $sql->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only ZIP files are allowed.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload ZIP File for Archiving</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="zipFile">Upload a ZIP file for archiving:</label>
        <input type="file" name="zipFile" id="zipFile">
        <input type="submit" value="Upload ZIP File" name="submit">
    </form>
</body>
</html>
