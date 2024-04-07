<?php
// Connection variables
$servername = "db"; // Server name
$database = "my_database"; // Database name
$username = "root"; // Database username
$password = "root"; // Database password

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for uploaded documents if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    uploaded_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}

$message = '';

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["document"]) && $_FILES["document"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        $filename = $_FILES["document"]["name"];
        $filetype = $_FILES["document"]["type"];
        $filesize = $_FILES["document"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MIME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["document"]["tmp_name"], "upload/" . $filename);
                $sql = "INSERT INTO uploaded_documents (file_name) VALUES ('$filename')";

                if ($conn->query($sql) === TRUE) {
                    $message = "Your file was uploaded successfully.";
                } else {
                    $message = "Error: " . $sql . "<br>" . $conn->error;
                }
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["document"]["error"];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Scanned Document</title>
</head>
<body>
    <h2>Upload Scanned Driver's License for Verification</h2>
    <p><?php echo $message; ?></p>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="document">Upload Document:</label>
        <input type="file" name="document" id="document">
        <input type="submit" value="Upload">
    </form>
</body>
</html>
