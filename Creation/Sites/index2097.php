<?php

// Setting the database connection
$servername = "db";
$username   = "root";
$password   = "root";
$dbname     = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for uploaded documents if not exists
$sql = "CREATE TABLE IF NOT EXISTS uploaded_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
path VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  die("Error creating table: " . $conn->error);
}

$message = '';
// Check if the form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Check if file was uploaded without errors
    if(isset($_FILES["document"]) && $_FILES["document"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png", "pdf" => "application/pdf");
        $filename = $_FILES["document"]["name"];
        $filetype = $_FILES["document"]["type"];
        $filesize = $_FILES["document"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                $path = "upload/" . $filename;
                move_uploaded_file($_FILES["document"]["tmp_name"], $path);
                // Save file info into the database
                $stmt = $conn->prepare("INSERT INTO uploaded_documents (filename, path) VALUES (?, ?)");
                $stmt->bind_param("ss", $filename, $path);
                $stmt->execute();
                
                $message = "Your file was uploaded successfully.";
            } 
        } else{
            $message = "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        $message = "Error: " . $_FILES["document"]["error"];
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Scanned Document</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h2>Upload Scanned Document</h2>
        <label for="document">File Upload:</label>
        <input type="file" name="document" id="document" required>
        <input type="submit" value="Upload">
        <p><strong><?php echo $message; ?></strong></p>
    </form>
</body>
</html>
