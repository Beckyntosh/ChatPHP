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

// Create table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
  die("Error creating table: " . $conn->error);
}

$message = '';
if (isset($_FILES['document']['name'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["document"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $message =  "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["document"]["size"] > 500000) {
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        $message = "Sorry, only JPG, JPEG, & PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO documents (filename) VALUES ('" . basename($_FILES["document"]["name"]) . "')";

            if ($conn->query($sql) === TRUE) {
                $message = "The file ". htmlspecialchars( basename( $_FILES["document"]["name"])). " has been uploaded.";
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Document</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 500px; margin: auto; padding: 20px; }
        .alert { color: red; }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload a Document</h2>
    <?php if ($message) echo '<p class="alert">' . $message . '</p>'; ?>
    <form action="" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input type="file" name="document">
        <input type="submit" name="submit" value="Upload">
    </form>
</div>
</body>
</html>

<?php $conn->close(); ?>