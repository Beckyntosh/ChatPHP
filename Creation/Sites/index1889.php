<?php
// Connect to the database
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["zipFile"]) && $_FILES["zipFile"]["error"] == 0) {
        $allowed = array("zip" => "application/zip");
        $filename = $_FILES["zipFile"]["name"];
        $filetype = $_FILES["zipFile"]["type"];
        $filesize = $_FILES["zipFile"]["size"];
    
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
                echo $filename . " has already been uploaded.";
            } else{
                move_uploaded_file($_FILES["zipFile"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["zipFile"]["error"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload ZIP File</title>
<style>
    body {font-family: Arial, sans-serif; background-color: #f0f8ff; color: #333;}
    .container {padding: 20px;}
    form {margin-top: 20px;}
    input, button {padding: 10px;}
    button {background-color: #8fbc8f; border: none; cursor: pointer; color: #fff;}
</style>
</head>
<body>
<div class="container">
    <h2>Archive Project Documents</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="zipFile">Select file to upload:</label>
        <input type="file" name="zipFile" id="zipFile" required>
        <button type="submit">Upload File</button>
    </form>
</div>
</body>
</html>
