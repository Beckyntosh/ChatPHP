<?php
// Set up a simple PHP script for uploading driver's licenses for a skateboard website

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

// Create table if it does not exist
$table = "CREATE TABLE IF NOT EXISTS driver_license_uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if file was uploaded without errors
  if (isset($_FILES["document"]) && $_FILES["document"]["error"] == 0) {
    $allowed = ["pdf" => "application/pdf"];
    $filename = $_FILES["document"]["name"];
    $filetype = $_FILES["document"]["type"];
    $filesize = $_FILES["document"]["size"];

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
        move_uploaded_file($_FILES["document"]["tmp_name"], "upload/" . $filename);
        echo "Your file was uploaded successfully.";

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO driver_license_uploads (filename) VALUES (?)");
        $stmt->bind_param("s", $filename);
        $stmt->execute();
        $stmt->close();
      }
    } else {
      echo "Error: There was a problem uploading your file. Please try again.";
    }
  } else {
    echo "Error: " . $_FILES["document"]["error"];
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload Scanned Driver's License</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
  Select Image File to Upload:
  <input type="file" name="document">
  <input type="submit" value="Upload">
</form>

</body>
</html>
