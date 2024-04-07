<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photoshop File Upload</title>
</head>
<body>
    <h2>Upload your Photoshop File for Editing</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="photoshopFile" required>
        <button type="submit" name="uploadBtn">Upload</button>
    </form>

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
    $sql = "CREATE TABLE IF NOT EXISTS photoshop_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
      echo "Table photoshop_files created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }

    if(isset($_POST['uploadBtn']) && $_FILES['photoshopFile']){
        $fileName = $_FILES['photoshopFile']['name'];
        $fileTmpName = $_FILES['photoshopFile']['tmp_name'];
        $folder = "uploads/";
        
        // Move the uploaded file to the uploads folder
        if(move_uploaded_file($fileTmpName, $folder.$fileName)){
            $sql = "INSERT INTO photoshop_files (filename) VALUES ('$fileName')";
            
            if($conn->query($sql) === TRUE){
                echo "File uploaded and saved to database successfully";
            }else{
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "Failed to upload file.";
        }
    }
    $conn->close();
    ?>
</body>
</html>
