<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Configure database connection
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

    // Create the table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS print_orders (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        filepath VARCHAR(255) NOT NULL,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if (!$conn->query($sql) === TRUE) {
        echo "Error creating table: " . $conn->error;
    }

    // Check if file was uploaded without errors
    if(isset($_FILES["wedding_invitation"]) && $_FILES["wedding_invitation"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["wedding_invitation"]["name"];
        $filetype = $_FILES["wedding_invitation"]["type"];
        $filesize = $_FILES["wedding_invitation"]["size"];
    
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
                move_uploaded_file($_FILES["wedding_invitation"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";

                // Insert file info into the database
                $filepath = "upload/" . $filename;
                $sql = "INSERT INTO print_orders (filename, filepath) VALUES ('$filename', '$filepath')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["wedding_invitation"]["error"];
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Upload your Wedding Invitation Design for printing:
  <input type="file" name="wedding_invitation" id="wedding_invitation">
  <input type="submit" value="Upload">
</form>

</body>
</html>
