<?php
// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Create table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS vector_designs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
)";
$mysqli->query($createTable);

// File upload logic
$uploadStatus = '';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_FILES["vectorFile"]["name"]) && $_FILES["vectorFile"]["error"] == 0){
        $allowedExtensions = array("svg", "ai", "eps");
        $fileName = $_FILES["vectorFile"]["name"];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        if(in_array($fileType, $allowedExtensions)){
            $uploadPath = "uploads/" . basename($fileName);
            if(move_uploaded_file($_FILES["vectorFile"]["tmp_name"], $uploadPath)){
                $sql = "INSERT INTO vector_designs (file_name) VALUES ('$fileName')";
                if($mysqli->query($sql)){
                    $uploadStatus = "The file ". htmlspecialchars( basename($fileName)). " has been uploaded.";
                } else {
                    $uploadStatus = "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            $uploadStatus = "Sorry, only SVG, AI, & EPS files are allowed.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vector File Upload for Design Sharing</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; padding: 20px; }
        .upload-form { margin-top: 20px; }
        .status { margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload a Vector Design</h2>
    <form action="" method="post" enctype="multipart/form-data" class="upload-form">
        Select vector file to upload (SVG, AI, EPS):
        <input type="file" name="vectorFile">
        <input type="submit" value="Upload File" name="submit">
    </form>
    <div class="status">
        <?php echo $uploadStatus; ?>
    </div>
    <h3>Uploaded Designs</h3>
    <ul>
        <?php
        $sql = "SELECT * FROM vector_designs ORDER BY uploaded_on DESC";
        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){
                while($row = $result->fetch_array()){
                    echo "<li><a href='uploads/" . $row['file_name'] . "'>" . $row['file_name'] . "</a> - " . $row['uploaded_on'] . "</li>";
                }
            } else {
                echo "<li>No designs uploaded yet.</li>";
            }
        }
        ?>
    </ul>
</div>
</body>
</html>
<?php
$mysqli->close();
?>
