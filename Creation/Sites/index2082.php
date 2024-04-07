<?php
// Define variables for database connection
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

// SQL to create table if not exists
$table_sql = "CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($table_sql) === TRUE) {
    //echo "Table uploaded_documents created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["document"]["size"] > 5000000) {
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
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["document"]["name"]). " has been uploaded.";

            // Save filename to database
            $stmt = $conn->prepare("INSERT INTO uploaded_documents (filename) VALUES (?)");
            $stmt->bind_param("s", $filename);

            $filename = basename($_FILES["document"]["name"]);

            if ($stmt->execute()) {
                echo "The file's name was stored successfully.";
            } else {
                echo "Error: " . $stmt . "<br>" . $conn->error;
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
  Select document to upload:
  <input type="file" name="document" id="document">
  <input type="submit" value="Upload Document" name="submit">
</form>

</body>
</html>
