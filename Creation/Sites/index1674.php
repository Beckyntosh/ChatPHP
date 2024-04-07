<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Establish database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["database_backup"]) && $_FILES["database_backup"]["error"] == 0){
        $filename = $_FILES["database_backup"]["name"];
        $filetype = $_FILES["database_backup"]["type"];
        $filesize = $_FILES["database_backup"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if($ext != "sql" && $ext != "SQL"){
            die("Error: Please upload a valid SQL file");
        } else {
            // Attempt to upload file
            if(move_uploaded_file($_FILES["database_backup"]["tmp_name"], $filename)){
                echo "<p>Your file was uploaded successfully.</p>";

                // Attempt to restore database from the uploaded file
                $command = "mysql -u ".DB_USERNAME." -p".DB_PASSWORD." ".DB_NAME." < $filename";
                
                system($command, $output);

                if($output == 0){
                    echo "<p>Database restoration successful.</p>";
                } else {
                    echo "<p>Error occurred during restoration.</p>";
                }
            } else{
                echo "<p>File is not uploaded.</p>";
            }
        }
    } else{
        echo "<p>Error: " . $_FILES["database_backup"]["error"] . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Database Backup Upload</title>
</head>
<body>
    <h2>Upload Database Backup</h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="fileSelect">Filename:</label>
        <input type="file" name="database_backup" id="fileSelect">
        <input type="submit" value="Upload">
        <p><strong>Note:</strong> Only .sql files are allowed up to 50MB.</p>
    </form>
</body>
</html>
