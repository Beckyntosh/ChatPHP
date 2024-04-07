<?php
// DB Connection Setup
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  upload_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["scanned_document"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["scanned_document"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["scanned_document"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $message = "File is not an image.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message .= " Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["scanned_document"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO uploaded_documents (filename) VALUES ('$target_file')";

            if ($conn->query($sql) === TRUE) {
                $message = "The file ". htmlspecialchars( basename( $_FILES["scanned_document"]["name"])). " has been uploaded.";
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Scanned Document</title>
</head>
<body>

<h2>Upload Scanned Driver's License for Verification</h2>
<p><?php echo $message; ?></p>
<form action="" method="post" enctype="multipart/form-data">
  <label for="scanned_document">Select file to upload:</label>
  <input type="file" name="scanned_document" id="scanned_document">
  <input type="submit" value="Upload Document" name="submit">
</form>

</body>
</html>
