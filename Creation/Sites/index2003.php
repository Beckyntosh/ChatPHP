<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
        $allowed = ["psd" => "application/photoshop"];
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MIME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $filename)) {
                echo $filename . " is already exists.";
            } else {
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";
                // Insert into database
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
                
                $sql = "INSERT INTO uploads (filename, filesize, filetype) VALUES ('$filename', '$filesize', '$filetype')";
                
                if ($conn->query($sql) === TRUE) {
                    echo " New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            } 
        } else {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else {
        echo "Error: " . $_FILES["photo"]["error"];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload your Photoshop file</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h2>Upload File</h2>
        <label for="fileSelect">Filename:</label>
        <input type="file" name="photo" id="fileSelect">
        <input type="submit" name="submit" value="Upload">
        <p><strong>Note:</strong> Only .psd formats allowed to a max size of 10 MB.</p>
    </form>
</body>
</html>

Please note that the provided PHP code example is a simple and basic file upload mechanism that does not implement advanced security measures, which are crucial for a production environment, especially when handling file uploads and interactions with a database. It's highly recommended to include validations, sanitizations, and checks that match the specific requirements of your project to prevent security vulnerabilities.