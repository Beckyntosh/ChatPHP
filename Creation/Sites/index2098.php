<?php
// Define MySQL connection data
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for uploaded files if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filetype VARCHAR(50) NOT NULL,
    filesize INT(10) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload on POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["document"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
            $filename = basename($_FILES["document"]["name"]);
            $filesize = $_FILES["document"]["size"];
            $stmt = $conn->prepare("INSERT INTO uploaded_documents (filename, filetype, filesize) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $filename, $fileType, $filesize);
            if ($stmt->execute()) {
                echo "The file " . htmlspecialchars(basename($_FILES["document"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $stmt->close();
        }
    } else {
        echo "File is not a valid document.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Scanned Document</title>
</head>
<body>
    <h2>Upload Scanned Document</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select document to upload:
        <input type="file" name="document" id="document">
        <input type="submit" value="Upload Document" name="submit">
    </form>
</body>
</html>
