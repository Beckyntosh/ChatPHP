<?php
// Establish database connection
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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS game_saves (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filesize INT(11) NOT NULL,
    uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

$message = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('sav','save');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert file information into database
            $insert = $conn->query("INSERT into game_saves (filename, filesize) VALUES ('".$fileName."', '".filesize($targetFilePath)."')");
            if($insert){
                $message = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $message = "File upload failed, please try again.";
            }
        }else{
            $message = "Sorry, there was an error uploading your file.";
        }
    }else{
        $message = 'Sorry, only SAVE files are allowed to upload.';
    }
}else{
    $message = 'Please select a file to upload.';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Save File Upload for Cloud Storage</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; padding-top: 50px; }
        form { display: flex; flex-direction: column; width: 300px; }
        input[type="file"] { margin-bottom: 10px; }
        input[type="submit"] { padding: 10px; }
    </style>
</head>
<body>
<div>
    <?php if(!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Upload Game Save File</h2>
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">
    </form>
</div>
</body>
</html>
<?php $conn->close(); ?>
