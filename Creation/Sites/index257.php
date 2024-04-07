<?php
// Database configurations
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a table for storing file upload details if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS configuration_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handling file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["configFile"])) {
    $target_directory = "uploads/";
    $target_file = $target_directory . basename($_FILES["configFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file is a "config" file
    if($fileType != "config") {
        echo "Sorry, only CONFIG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["configFile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["configFile"]["name"])). " has been uploaded.";
            $sql = "INSERT INTO configuration_files (file_name) VALUES ('" . mysqli_real_escape_string($conn, $_FILES["configFile"]["name"]) . "')";
            
            if ($conn->query($sql) === TRUE) {
                echo "File successfully recorded in database";
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
<html>
<body>

<h2>Upload Configuration File</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  Select config file to upload:
  <input type="file" name="configFile" id="configFile">
  <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>