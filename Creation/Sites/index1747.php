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

// Create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    filename VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle File Upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["scannerFile"])) {
    $target_dir = "uploads/";
    $filename = basename($_FILES["scannerFile"]["name"]);
    $target_file = $target_dir . $filename;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["scannerFile"]["tmp_name"]);
    if ($check !== false) {
        // Check file size
        if ($_FILES["scannerFile"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, PNG files are allowed.";
        } else {
            if (move_uploaded_file($_FILES["scannerFile"]["tmp_name"], $target_file)) {
                // Insert into documents table
                $sql = "INSERT INTO documents (user_id, filename) VALUES (1, '$filename')"; // Assuming user_id = 1 for this example

                if ($conn->query($sql) !== TRUE) {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "File is not an image.";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Skateboards - Upload Scanned Document</title>
</head>
<body>

<h2>Upload Scanned Driver's License for Verification</h2>
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="scannerFile" id="scannerFile">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

<?php
$conn->close();
?>
