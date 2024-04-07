<?php
// Connect to database
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

// Create table for uploaded driver's licenses if doesn't exist
$table_creation_query = "CREATE TABLE IF NOT EXISTS uploaded_docs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time DATETIME DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($table_creation_query)) {
  die("Error creating table: " . $conn->error);
}

// Handle the file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["driversLicense"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["driversLicense"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["driversLicense"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["driversLicense"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["driversLicense"]["tmp_name"], $target_file)) {
            // Insert file information into database
            $stmt = $conn->prepare("INSERT INTO uploaded_docs (file_name) VALUES (?)");
            $stmt->bind_param("s", $target_file);
            if ($stmt->execute()) {
                echo "The file ". htmlspecialchars(basename($_FILES["driversLicense"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Driver's License</title>
</head>
<body>
    <h2>Upload your Driver's License for Verification</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        Select Driver's License to upload:
        <input type="file" name="driversLicense" id="driversLicense">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>
