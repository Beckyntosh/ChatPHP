<?php
// Setup connection variables
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

// Create table for storing encrypted file paths if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS encrypted_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// Close the connection
$conn->close();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Path where the files will be uploaded
    $target_dir = "uploads/";
    // Ensures unique name for the uploaded file using timestamp and original name
    $target_file = $target_dir . time() . basename($_FILES["fileToUpload"]["name"]);
    // Variable for checking the upload status
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file after encryption
        $fileContent = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
        $encryptedContent = openssl_encrypt($fileContent, 'AES-128-CBC', 'secretkey', 0, '1234567812345678');

        // Write the encrypted content to the file
        if (file_put_contents($target_file, $encryptedContent) !== false) {
            echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been encrypted and uploaded.";

            // Add the file information into the database
            $conn = new mysqli($servername, $username, $password, $dbname);
            $stmt = $conn->prepare("INSERT INTO encrypted_files (filename) VALUES (?)");
            $stmt->bind_param("s", $target_file);
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
<head>
    <title>Secure File Upload</title>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>