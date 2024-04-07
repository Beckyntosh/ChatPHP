<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Setup connection variables
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
    
    // Process uploaded file
    if (isset($_FILES["driverLicense"]) && $_FILES["driverLicense"]["error"] == 0) {
        $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png"];
        $filename = $_FILES["driverLicense"]["name"];
        $filetype = $_FILES["driverLicense"]["type"];
        $filesize = $_FILES["driverLicense"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $filename)) {
                echo $filename . " already exists.";
            } else {
                move_uploaded_file($_FILES["driverLicense"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";
                
                // Insert into database
                $sql = "INSERT INTO documents (filename, filetype, filesize) VALUES ('".$filename."', '".$filetype."', ".$filesize.")";
                
                if ($conn->query($sql) === TRUE) {
                    echo "File uploaded and saved in the Database";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else {
        echo "Error: " . $_FILES["driverLicense"]["error"];
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
  Upload a File:
  <input type="file" name="driverLicense" id="driverLicense">
  <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>

<?php
// Create database schema if not exist
$connection = new mysqli($servername, $username, $password);
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS my_database";
if ($connection->query($sql) === TRUE) {
  echo "Database created successfully or already exists";
} else {
  echo "Error creating database: " . $connection->error;
}

// Connect to the database and create table
$connection->select_db($dbname);
$sql = "CREATE TABLE IF NOT EXISTS documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(30) NOT NULL,
  filetype VARCHAR(30) NOT NULL,
  filesize INT NOT NULL,
  reg_date TIMESTAMP
)";

if ($connection->query($sql) === TRUE) {
  echo "Table documents created successfully or already exists";
} else {
  echo "Error creating table: " . $connection->error;
}

$connection->close();
?>
