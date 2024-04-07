<?php
// Define database parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Establish database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for drivers license uploads if it doesn't exist
$query = "CREATE TABLE IF NOT EXISTS driver_licenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$result = $conn->query($query);
if (!$result) {
    die("Error creating table: " . $conn->error);
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["license"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["license"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["license"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["license"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["license"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO driver_licenses (user_id, file_path) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $userID = 1; // This should be dynamic based on the logged-in user
            $stmt->bind_param("is", $userID, $target_file);

            if ($stmt->execute()) {
                echo "The file " . htmlspecialchars(basename($_FILES["license"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Driver's License</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
    <label for="license">Upload your Driver's License:</label>
    <input type="file" name="license" id="license" required>
    <button type="submit">Upload</button>
</form>

</body>
</html>
