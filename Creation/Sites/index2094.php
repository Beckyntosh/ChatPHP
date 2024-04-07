<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
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
    
    // Check if file was uploaded without errors
    if(isset($_FILES["document"]) && $_FILES["document"]["error"] == 0){
        $allowed = ["pdf" => "application/pdf", "jpg" => "image/jpg", "jpeg" => "image/jpeg"];
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
                echo $filename . " already exists.";
            } else{
                move_uploaded_file($_FILES["document"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";
                
                // Insert file info into the database
                $stmt = $conn->prepare("INSERT INTO documents (filename, file_type, file_size) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $filename, $filetype, $filesize);
                $stmt->execute();
                $stmt->close();
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["document"]["error"];
    }
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload Scanned Document</h2>
<form action="" method="post" enctype="multipart/form-data">
    Select document to upload:
    <input type="file" name="document" id="document">
    <input type="submit" value="Upload Document" name="submit">
</form>

</body>
</html>

**Note:** This code assumes you have already created a MySQL database named "my_database" and a table named "documents" with columns for storing the filename, file type, and file size. You might need to adjust the database details and query to match your actual database schema. Remember to handle file uploads cautiously and validate them appropriately for your context to prevent security vulnerabilities.