<?php
// Check if a file has been uploaded
if(isset($_FILES['zip_file'])) {
    // Database configuration
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    // Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create table if doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS archive (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            filename VARCHAR(255) NOT NULL,
            upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

    if (!$conn->query($sql) === TRUE) {
        die("Error creating table: " . $conn->error);
    }

    $targetDir = "uploads/";
    $file = $_FILES['zip_file']['tmp_name'];
    $fileName = basename($_FILES['zip_file']['name']);

    // Check if the file is a ZIP file
    $zip = new ZipArchive;
    if ($zip->open($file) === TRUE) {
        $zip->close();
        $targetFilePath = $targetDir . $fileName;

        // Check if file already exists
        if(file_exists($targetFilePath)){
            echo "Sorry, file already exists.";
            exit;
        }

        // Move the uploaded file to the server
        if(move_uploaded_file($file, $targetFilePath)) {
            // Insert file info into the database
            $sql = $conn->prepare("INSERT INTO archive (filename) VALUES (?)");
            $sql->bind_param("s", $fileName);
            if($sql->execute()){
                echo "The file has been uploaded successfully.";
            } else {
                echo "File upload failed, please try again.";
            }
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "Please upload a valid ZIP file.";
    }

    $conn->close();
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Archive Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0a0f0d;
            color: #f39c12;
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        .upload-btn-wrapper {
            background-color: #1abc9c;
            display: inline-block;
            cursor: pointer;
            color: white;
            padding: 12px 50px;
            border-radius: 10px;
        }
        input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Project Alpha Document Archive</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="upload-btn-wrapper">
                <button class="btn">Upload a file</button>
                <input type="file" name="zip_file" />
            </div>
            <input type="submit" value="Upload" name="submit">
        </form>
    </div>
</body>
</html>
<?php
}
?>
