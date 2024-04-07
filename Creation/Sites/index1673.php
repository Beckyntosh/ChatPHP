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

// Attempt to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_configs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(100) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table uploaded_configs created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["configurationFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["configurationFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if file is an actual configuration file or fake
    // Allow only 'conf' files for this example
    if($imageFileType != "conf") {
        echo "Sorry, only CONF files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["configurationFile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["configurationFile"]["name"])). " has been uploaded.";
            // Record the file in the database
            $stmt = $conn->prepare("INSERT INTO uploaded_configs (filename) VALUES (?)");
            $stmt->bind_param("s", $_FILES["configurationFile"]["name"]);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload Configuration File for Server Setup</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select configuration file to upload:
  <input type="file" name="configurationFile" id="configurationFile">
  <input type="submit" value="Upload Configuration" name="submit">
</form>

</body>
</html>
