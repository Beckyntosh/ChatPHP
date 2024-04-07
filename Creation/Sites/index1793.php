<?php
// Database Connection
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
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
avatar VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$message = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');
    // Check if file type is valid and within 5MB
    if(in_array($fileType, $allowTypes) && $_FILES["file"]["size"] < 5 * 1024 * 1024){
        // Upload file to the server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $conn->query("INSERT into users (avatar) VALUES ('".$fileName."')");
            if($insert){
                $message = "The file ".$fileName. " has been uploaded successfully.";
            } else {
                $message = "File upload failed, please try again.";
            } 
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    } else {
        $message = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload & file size should not exceed 5MB.';
    }
} else {
    $message = 'Please select a file to upload.';
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload Avatar</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <h2>Upload Avatar</h2>
    <label for="file">Choose File:</label>
    <input type="file" name="file" id="file">
    <br><br>
    <input type="submit" name="submit" value="Upload">
    <p><?php echo $message; ?></p>
</form>
</body>
</html>
