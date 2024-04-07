<?php
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // An Upload button is clicked
    if (isset($_FILES['podcast_file']) && $_FILES['podcast_file']['error'] === UPLOAD_ERR_OK) {
        $file_tmp_path = $_FILES['podcast_file']['tmp_name'];
        $file_name = $_FILES['podcast_file']['name'];
        $file_size = $_FILES['podcast_file']['size'];
        $file_type = $_FILES['podcast_file']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['podcast_file']['name'])));
        
        // Check if valid podcast files
        if($file_ext === 'mp3' || $file_ext === 'aac'  || $file_ext === 'wav') {
            // Upload folder - make sure to create it in correct path
            $upload_dir_path = 'uploads/';
            if (!file_exists($upload_dir_path)) {
                mkdir($upload_dir_path, 0777, true);
            }

            if (move_uploaded_file($file_tmp_path, $upload_dir_path . $file_name)) {
                // Insert into the database
                $stmt = $pdo->prepare('INSERT INTO products (product_file, product_name, product_size) VALUES (?, ?, ?)');
                $stmt->execute([$upload_dir_path . $file_name, $file_name, $file_size]);

                echo 'File Uploaded and Saved Successfully';
            } else {
                echo 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        } 
        else {
            echo 'Invalid File Extension - Please Upload MP3, AAC or WAV Files';
        }    
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <style>
        body {
            background: #f9f9f9;
        }
        form {
            text-align: center;
            padding: 40px;
        }
    </style>
    <title>Upload Podcast</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label for="podcast_file">Upload Podcast File:</label>
        <input type="file" name="podcast_file" id="podcast_file">
        <input type="submit" value="Upload File" name="submit">
    </form> 
</body>
</html>