<?php
// Connect to MySQL database
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE, 
    MYSQL_USER, 
    MYSQL_PASSWORD,
    $pdoOptions
);

// Create table for storing uploaded files info if not exists
$sqlCreate = "CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$pdo->exec($sqlCreate);

$message = '';
if(isset($_POST['uploadBtn']) && $_FILES['userFile']['size'] > 0) {
    $fileName = $_FILES['userFile']['name'];
    $fileTmpPath = $_FILES['userFile']['tmp_name'];
    $fileType = $_FILES['userFile']['type'];
    $fileSize = $_FILES['userFile']['size'];
    $fileExtension = strtolower(end(explode('.', $fileName)));
    
    $uploadFileDir = './uploaded_files/';
    $dest_path = $uploadFileDir . $fileName;
    
    if(move_uploaded_file($fileTmpPath, $dest_path)) {
        $sqlInsert = "INSERT INTO uploaded_documents (file_name, file_path) VALUES (?, ?)";
        $stmt = $pdo->prepare($sqlInsert);
        $stmt->execute([$fileName, $dest_path]);
        $message ='File is successfully uploaded.';
    } else {
        $message = 'There was some error uploading the file.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="fileUpload">Upload Driver's License:</label>
        <input type="file" name="userFile" id="fileUpload">
        <input type="submit" name="uploadBtn" value="Upload">
    </form>

    <?php if($message != '') : ?>
        <p><?= $message; ?></p>
    <?php endif; ?>
</body>
</html>
