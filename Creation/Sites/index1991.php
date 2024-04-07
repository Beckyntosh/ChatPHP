<?php
// Connect to the database
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
$sql = "CREATE TABLE IF NOT EXISTS uploaded_images (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// File upload processing
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photoshopFile"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photoshopFile"]["tmp_name"]);
        if($check !== false) {
            if (move_uploaded_file($_FILES["photoshopFile"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO uploaded_images (filename) VALUES ('" . htmlspecialchars(basename($_FILES["photoshopFile"]["name"])) . "')";

                if ($conn->query($sql) === TRUE) {
                    $message = "The file ". htmlspecialchars( basename( $_FILES["photoshopFile"]["name"])). " has been uploaded.";
                } else {
                    $message = "Sorry, there was an error uploading your file.";
                }
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        } else {
            $message = "File is not an image.";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Photoshop File uploader for Watches Website</title>
</head>
<body>
<h2>Upload a Landscape Photo for Enhancements</h2>
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="photoshopFile" id="photoshopFile">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php echo $message; ?>
</body>
</html>
