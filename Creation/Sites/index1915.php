<?php
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

// Create table for storing uploaded zip files info
$sql = "CREATE TABLE IF NOT EXISTS zip_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table creation success
} else {
  echo "Error creating table: " . $conn->error;
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["zipFile"]["name"]);
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file is a actual zip file or fake zip
    if($fileType != "zip") {
        $message = "Sorry, only ZIP files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["zipFile"]["tmp_name"], $target_file)) {
            $message = "The file ". htmlspecialchars( basename( $_FILES["zipFile"]["name"])). " has been uploaded.";

            // Store file info in database
            $stmt = $conn->prepare("INSERT INTO zip_files (filename) VALUES (?)");
            $stmt->bind_param("s", $filename);

            $filename = basename($_FILES["zipFile"]["name"]);
            $stmt->execute();

            $stmt->close();
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Beauty Product ZIP Archive</title>
</head>
<body>
    <h2>Upload ZIP File for Project Alpha</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        Select ZIP file to upload:
        <input type="file" name="zipFile" id="zipFile">
        <input type="submit" value="Upload ZIP" name="submit">
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>
