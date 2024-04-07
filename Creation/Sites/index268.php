<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["attachment"]) && $_FILES["attachment"]["error"] == 0){
        // Database credentials
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
        
        // Clean the file name
        $filename = $conn->real_escape_string($_FILES["attachment"]["name"]);
        $filetype = $_FILES["attachment"]["type"];
        $filesize = $_FILES["attachment"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = array("jpg", "jpeg", "gif", "png", "zip", "txt", "xls", "pdf");
        if (!in_array($ext, $allowed)) {
            echo "Error: Please select a valid file format.";
        } else {
            // Check file size
            if($filesize > 5000000){
                echo "Error: File size is too large.";
            } else {
                // Read binary content
                $binaryContent = addslashes(file_get_contents($_FILES["attachment"]["tmp_name"]));
                
                // SQL query to insert file into the attachments table
                $sql = "INSERT INTO attachments (name, type, size, content ) VALUES ('$filename', '$filetype', $filesize, '$binaryContent')";
                
                if($conn->query($sql) === true){
                    echo "Your file was uploaded successfully.";
                } else{
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        
        // Close the connection
        $conn->close();
    } else{
        echo "Error: " . $_FILES["attachment"]["error"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Email Attachment</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <h2>Upload Email Attachment for Skin Care Communication</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="attachment">Upload Attachment:</label>
        <input type="file" name="attachment" id="attachment">
        <input type="submit" value="Upload Attachment" name="submit">
    </form>
</body>
</html>