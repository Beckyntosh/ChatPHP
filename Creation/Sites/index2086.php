<?php
// Define connection parameters
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

// Create table for uploaded documents if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS uploaded_documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  document_name VARCHAR(50) NOT NULL,
  document_path VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table 'uploaded_documents' created successfully.";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if file was uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
    $target_directory = "uploads/";
    $target_file = $target_directory . basename($_FILES["document"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["document"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["document"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["document"]["name"])). " has been uploaded.";
            $sql = "INSERT INTO uploaded_documents (document_name, document_path) VALUES ('".basename($_FILES["document"]["name"])."', '$target_file')";
            if ($conn->query($sql) === TRUE) {
                echo "Document uploaded successfully.";
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

<h2>Upload Scanned Document</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select document to upload:
  <input type="file" name="document" id="document">
  <input type="submit" value="Upload Document" name="submit">
</form>

</body>
</html>
