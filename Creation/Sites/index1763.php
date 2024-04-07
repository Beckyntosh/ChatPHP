<?php
// Initialise and handle file uploads, connection to database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["scannedDocument"])) {
    // Save uploaded file
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["scannedDocument"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
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

    // Check file size
    if ($_FILES["scannedDocument"]["size"] > 500000) {
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
        if (move_uploaded_file($_FILES["scannedDocument"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["scannedDocument"]["name"])). " has been uploaded.";
            // Upon successful upload, save file information in the database
            $conn = new mysqli('db', 'root', 'root', 'my_database');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("INSERT INTO scanned_docs (filename) VALUES (?)");
            $stmt->bind_param("s", $targetFile);
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document Upload</title>
</head>
<body>
    <h2>Upload Scanned Document</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="scannedDocument" id="scannedDocument">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>

<?php
// MySQL part - Create the table for storing file references
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

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS scanned_docs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table scanned_docs created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
