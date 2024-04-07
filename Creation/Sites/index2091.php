<?php

// Only process POST reqeusts.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
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
    $sql = "CREATE TABLE IF NOT EXISTS document_uploads (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // echo "Table document_uploads created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
        // Get details of the uploaded file
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // sanitize file-name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Check if the file is a PDF or Image
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'pdf');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // directory in which the uploaded file will be moved
            $uploadFileDir = './uploaded_files/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $sql = "INSERT INTO document_uploads (file_name)
                VALUES ('$newFileName')";

                if ($conn->query($sql) === TRUE) {
                    $message ='File is successfully uploaded.';
                } else {
                    $message = 'Error uploading database record.';
                }
            } else {
                $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        } else {
            $message = 'Upload failed. Allowed file types: jpg, gif, png, pdf.';
        }
    } else {
        $message = 'There is some error in the file upload. Please check the following error.<br>';
        $message .= 'Error:' . $_FILES['uploadedFile']['error'];
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload your document</title>
</head>
<body>
    <h2>Welcome to Health and Wellness Document Upload!</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="fileSelect">Filename:</label>
        <input type="file" name="uploadedFile" id="fileSelect">
        <input type="submit" name="submit" value="Upload">
    </form>
    <?php if(!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</body>
</html>

<?php $conn->close(); ?>
