<?php 
// Note: For simplicity and demonstration purposes, security practices such as input validation,
// database sanitization, and secure file handling are not fully implemented or are simplified. 
// This example should not be directly deployed into a production environment.

// Create connection to the database
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

// Check if table exists, if not create one
$checkTable = "CREATE TABLE IF NOT EXISTS ScannedDocuments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($checkTable) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['document'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file is a actual image or fake image
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
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["document"]["name"])). " has been uploaded.";
            
            // Insert into database
            $stmt = $conn->prepare("INSERT INTO ScannedDocuments (filename) VALUES (?)");
            $stmt->bind_param("s", $filename);

            $filename = htmlspecialchars(basename($_FILES["document"]["name"]));
            $stmt->execute();

            $stmt->close();
            $conn->close();

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
  Upload a scanned copy of your Driver's License for verification:
  <input type="file" name="document" id="document">
  <input type="submit" value="Upload Document" name="submit">
</form>

</body>
</html>
