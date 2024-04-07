<!DOCTYPE html>
<html>
<head>
    <title>Secure File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        input[type=file], button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<h2>Upload Medical Records</h2>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <button type="submit" name="submit">Upload File</button>
</form>
</body>
</html>

<?php
// upload.php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $encKey = 's3cr3tkey'; // Should ideally be a more secure, generated key, and stored outside of the code

    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";

    } else {

        // Encrypt file before uploading
        $data = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
        $encryptedData = openssl_encrypt($data, 'AES-128-CBC', $encKey, 0, '1234567812345678');

        if (file_put_contents($target_file, $encryptedData)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            
            // Connect to database
            $servername = "db";
            $username = "root";
            $password = "root";
            $dbname = "my_database";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Create table if not exists
            $sql = "CREATE TABLE IF NOT EXISTS uploads (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                filename VARCHAR(255) NOT NULL,
                upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

            if ($conn->query($sql) === TRUE) {
                // Insert record
                $stmt = $conn->prepare("INSERT INTO uploads (filename) VALUES (?)");
                $stmt->bind_param("s", $target_file);
                $stmt->execute();

                echo " and saved to the database.";
                $stmt->close();
                $conn->close();
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
