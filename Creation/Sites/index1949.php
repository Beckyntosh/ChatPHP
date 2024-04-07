<?php
// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Database configurations
    $dbHost = "db"; // As per requirement, using 'db' for distributed style approach
    $dbUsername = "root";
    $dbPassword = "root";
    $dbName = "my_database";
    
    // Create database connection
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    // Check connection
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Create table if it doesn't exist
    $createQuery = "CREATE TABLE IF NOT EXISTS print_orders (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        file_name VARCHAR(255) NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if (!$conn->query($createQuery)) {
        die("Error creating table: " . $conn->error);
    }
    
    // File upload path
    $targetDir = "uploads/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    if(!empty($_FILES["file"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert file information into the database
                $insert = $conn->query("INSERT INTO print_orders (file_name, file_path) VALUES ('".$fileName."', '".$targetFilePath."')");
                if($insert){
                    $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                }else{
                    $statusMsg = "File upload failed, please try again.";
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    }else{
        $statusMsg = 'Please select a file to upload.';
    }

    // Close database connection
    $conn->close();
    
    // Show upload status
    echo $statusMsg;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Your Wedding Invitation Design</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Select File to Upload:</label>
        <input type="file" name="file" id="file">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>
