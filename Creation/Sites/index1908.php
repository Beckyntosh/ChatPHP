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

// Create table for storing ZIP file info if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_zips (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_FILES['zipfile'])) {
        $errors= array();
        $file_name = $_FILES['zipfile']['name'];
        $file_size = $_FILES['zipfile']['size'];
        $file_tmp = $_FILES['zipfile']['tmp_name'];
        $file_type = $_FILES['zipfile']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['zipfile']['name'])));

        // Allowed extensions
        $extensions= array("zip");

        if(in_array($file_ext,$extensions) === false){
            $errors[]="Extension not allowed, please choose a ZIP file.";
        }

        if($file_size > 2097152) {
            $errors[]='File size must be less than 2 MB';
        }

        if(empty($errors)==true) {
            move_uploaded_file($file_tmp,"uploads/".$file_name);
            echo "Success";

            // Insert file info into database
            $sql = "INSERT INTO uploaded_zips (filename) VALUES ('$file_name')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            print_r($errors);
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload ZIP Archive</title>
</head>
<body>
    <h2>Upload ZIP File for Project Alpha</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="zipfile" />
        <input type="submit"/>
    </form>
</body>
</html>
