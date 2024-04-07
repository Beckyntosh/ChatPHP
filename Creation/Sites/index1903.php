<?php
// Database connection
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

// Check if the table exists, if not create one
$checkTable = "SHOW TABLES LIKE 'archive_uploads'";
$result = $conn->query($checkTable);

if ($result->num_rows == 0) {
    $createTable = "CREATE TABLE archive_uploads (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTable) === TRUE) {
        echo "Table archive_uploads created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["zipFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["zipFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a actual zip or fake zip
    if($fileType != "zip") {
        echo "Sorry, only ZIP files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["zipFile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["zipFile"]["name"])). " has been uploaded.";
            $sql = "INSERT INTO archive_uploads (filename) VALUES ('".basename($_FILES["zipFile"]["name"])."')";

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload ZIP Archive</title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  Select ZIP file to upload:
  <input type="file" name="zipFile" id="zipFile">
  <input type="submit" value="Upload ZIP" name="submit">
</form>

</body>
</html>
