<?php
*
 * IMPORTANT NOTICE:
 * This code is provided for educational/research purposes. 
 * Make sure to comply with data protection laws and secure user data adequately, especially when handling sensitive information.
 */

// Database connection
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

// Table creation for uploaded files
$sql = "CREATE TABLE IF NOT EXISTS uploaded_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

$message = ""; // To display status message

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["document"]) && $_FILES["document"]["error"] == 0) {
        $allowed = array("pdf" => "application/pdf", "jpg" => "image/jpeg", "jpeg" => "image/jpeg");
        $filename = $_FILES["document"]["name"];
        $filetype = $_FILES["document"]["type"];
        $filesize = $_FILES["document"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $filename)) {
                $message = $filename . " already exists.";
            } else {
                move_uploaded_file($_FILES["document"]["tmp_name"], "upload/" . $filename);
                $message = "Your file was uploaded successfully.";

                // Insert into database
                $stmt = $conn->prepare("INSERT INTO uploaded_documents (filename) VALUES (?)");
                $stmt->bind_param("s", $filename);
                $stmt->execute();
                $stmt->close();
            } 
        } else {
            $message = "Error: There was a problem uploading your file. Please try again."; 
        }
    } else {
        $message = "Error: " . $_FILES["document"]["error"];
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Scanned Document</title>
</head>
<body>
<h2>Upload Your Driver's License</h2>
<p><?php echo $message; ?></p>
<form action="index.php" method="post" enctype="multipart/form-data">
    <label for="document">File:</label>
    <input type="file" name="document" id="document">
    <input type="submit" value="Upload">
</form>
</body>
</html>
