<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["driver_license"]) && $_FILES["driver_license"]["error"] == 0) {
        // Allowed file types
        $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png"];
        $filename = $_FILES["driver_license"]["name"];
        $filetype = $_FILES["driver_license"]["type"];
        $filesize = $_FILES["driver_license"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please upload a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Check whether file exists before uploading it
        if (file_exists("upload/" . $filename)) {
            echo $filename . " already exists.";
        } else {
            move_uploaded_file($_FILES["driver_license"]["tmp_name"], "uploads/" . $filename);
            echo "Your file was uploaded successfully.";
        } 
    } else {
        echo "Error: " . $_FILES["driver_license"]["error"];
    }
}

//Connect to the database
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

// Create table if not exists for uploaded documents
$sql = "CREATE TABLE IF NOT EXISTS documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert file into table
if(isset($filename)){
    $sql = "INSERT INTO documents (filename) VALUES ('$filename')";
    
    if ($conn->query($sql) === TRUE) {
        echo "File recorded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload Driver's License for Verification</h2>

<form action="" method="post" enctype="multipart/form-data">
  Select File to Upload:
  <input type="file" name="driver_license">
  <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>
