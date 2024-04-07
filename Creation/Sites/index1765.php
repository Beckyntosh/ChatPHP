<?php
// Handle Database Connection
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

// Create table for scanned documents if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS scanned_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table creation successful
} else {
  echo "Error creating table: " . $conn->error;
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["scannedDocument"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["scannedDocument"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["scannedDocument"]["tmp_name"], $target_file)) {
            // File is uploaded successfully. Save the filename to the database.
            $sql = $conn->prepare("INSERT INTO scanned_documents (filename) VALUES (?)");
            $sql->bind_param("s", $filename);
            $filename = basename($_FILES["scannedDocument"]["name"]);

            if ($sql->execute() === TRUE) {
                echo "The file ". htmlspecialchars(basename($_FILES["scannedDocument"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Scanned Document</title>
</head>
<body>
    <h2>Upload Your Scanned Driver's License for Verification</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="scannedDocument" id="scannedDocument">
        <input type="submit" value="Upload Document" name="submit">
    </form>
</body>
</html>
