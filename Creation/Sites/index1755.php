<?php
// Check if form was submitted:
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["scannedDocument"])) {
    $target_directory = "uploads/";
    $file = $_FILES["scannedDocument"]["name"];
    $path = pathinfo($file);
    $filename = $path['filename'];
    $ext = $path['extension'];
    $temp_name = $_FILES["scannedDocument"]["tmp_name"];
    $path_filename_ext = $target_directory.$filename.".". $ext;
    
    // Check if file already exists
    if (file_exists($path_filename_ext)) {
        echo "Sorry, file already exists.";
    } else{
        // Connect to the database
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "my_database";

        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Try to create table if not exists
        $sql = "CREATE TABLE IF NOT EXISTS scanned_documents (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            filename VARCHAR(255) NOT NULL,
            file_type VARCHAR(50) NOT NULL,
            uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

        if ($conn->query($sql) === TRUE) {
            move_uploaded_file($temp_name, $path_filename_ext);
            $sql = "INSERT INTO scanned_documents (filename, file_type)
            VALUES ('".$filename.".".$ext."', 'DriverLicense')";

            if ($conn->query($sql) === TRUE) {
                echo "The file was uploaded successfully.";
            } else {
                echo "There was an error uploading the file: " . $conn->error;
            }
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Scanned Document</title>
</head>
<body>
    <h2>Upload Scanned Document of Driver's License</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input type="file" name="scannedDocument">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>
