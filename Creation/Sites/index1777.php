<?php
// Define database parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Create table for game save files if not exists
$table_query = "CREATE TABLE IF NOT EXISTS game_saves (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($table_query)) {
    die("ERROR: Could not able to execute $table_query. " . $conn->error);
}

// Handle file upload
$uploadStatus = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["gameSaveFile"])) {
    $filename = basename($_FILES["gameSaveFile"]["name"]);
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . $filename;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    if(move_uploaded_file($_FILES["gameSaveFile"]["tmp_name"], $targetFilePath)){
        $insertFile = $conn->query("INSERT INTO game_saves (filename, file_path) VALUES ('".$filename."', '".$targetFilePath."')");
        if($insertFile){
            $uploadStatus = "The file has been uploaded successfully.";
        } else {
            $uploadStatus = "File upload failed, please try again.";
        } 
    } else {
        $uploadStatus = "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Upload Game Save File</title>
</head>
<body>
    <h2>Upload Skyrim Save File for Backup</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="gameSaveFile">Select file to upload:</label>
        <input type="file" name="gameSaveFile" id="gameSaveFile">
        <input type="submit" value="Upload File" name="submit">
    </form>
    <?php if($uploadStatus != "") { echo "<p>$uploadStatus</p>"; } ?>
</body>
</html>
<?php
$conn->close();
?>
