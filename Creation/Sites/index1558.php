<?php
// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database configuration
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";
    $uploadDir = "uploads/";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if file was uploaded
    if (isset($_FILES['document']) && $_FILES['document']['error'] === UPLOAD_ERR_OK) {
        // File information
        $fileTmpPath = $_FILES['document']['tmp_name'];
        $fileName = $_FILES['document']['name'];
        $fileSize = $_FILES['document']['size'];
        $fileType = $_FILES['document']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Sanitize file name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Check if file type is allowed
        $allowedfileExtensions = ['pdf', 'jpg', 'jpeg', 'png'];
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Directory where the file will be stored
            $dest_path = $uploadDir . $newFileName;

            // Move the file to the destination directory
            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                // Prepare the SQL statement
                $stmt = $conn->prepare("INSERT INTO scanned_documents (file_name, file_path, file_type, file_size) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("sssi", $fileName, $dest_path, $fileType, $fileSize);

                // Execute the statement and check if it was successful
                if ($stmt->execute()) {
                    echo "File is successfully uploaded.";
                } else {
                    echo "Error uploading the file.";
                }
                $stmt->close();
            } else {
                echo "There was some error moving the file to upload directory.";
            }
        } else {
            echo "Upload failed. Only PDF, JPG, JPEG, and PNG files are allowed.";
        }
    }
    $conn->close();
}

// Initialize the database and create a table if it doesn't exist
function init_database($servername, $username, $password, $dbname) {
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        // Select the database
        $conn->select_db($dbname);

        // Create table
        $sql = "CREATE TABLE IF NOT EXISTS scanned_documents (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            file_name VARCHAR(256) NOT NULL,
            file_path VARCHAR(256) NOT NULL,
            file_type VARCHAR(50) NOT NULL,
            file_size INT UNSIGNED,
            upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

        if ($conn->query($sql) !== TRUE) {
            echo "Error creating table: " . $conn->error;
        }
    } else {
        echo "Error creating database: " . $conn->error;
    }
    $conn->close();
}

// Initialize database and table
init_database($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Driver's License Upload</title>
</head>
<body>
    <h2>Upload Scanned Document</h2>
    <form action="document_upload.php" method="post" enctype="multipart/form-data">
        Select document to upload:
        <input type="file" name="document" id="document">
        <input type="submit" value="Upload Document" name="submit">
    </form>
</body>
</html>
