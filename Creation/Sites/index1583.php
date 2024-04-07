<?php
// PHP error displaying should be turned off on a production server
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Process artwork upload
$message = ''; // To store status messages
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["artwork"]["name"])){
    // Artwork file information
    $fileName = basename($_FILES["artwork"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        $image = $_FILES['artwork']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    
        // Store the artwork in the database
        $sql = "INSERT INTO artworks (title, artist, image, created) VALUES (:title, :artist, '$imgContent', NOW())";
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':title', $_REQUEST['title'], PDO::PARAM_STR);
            $stmt->bindParam(':artist', $_REQUEST['artist'], PDO::PARAM_STR);
            
            if($stmt->execute()){
                $message = 'Artwork uploaded successfully.';
            } else{
                $message = 'Artwork upload failed, please try again.';
            }
        } else {
            $message = 'Artwork upload failed, please try again.';
        }
    } else{
        $message = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Artwork | Online Art Gallery</title>
</head>
<body style="background-color: #fff6f5; font-family: Arial, sans-serif; color: #334e68;">
    <h2>Upload Your Artwork</h2>
    <p><?php echo $message; ?></p>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>
        
        <label>Artist:</label><br>
        <input type="text" name="artist" required><br><br>
        
        <label>Artwork:</label><br>
        <input type="file" name="artwork" required><br><br>
        
        <input type="submit" value="Upload">
    </form>
</body>
</html>
<?php
// Creating the artworks table if it doesn't exist
$createArtworksTable = "CREATE TABLE IF NOT EXISTS artworks (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    image LONGBLOB NOT NULL,
    created DATETIME DEFAULT CURRENT_TIMESTAMP
)";
$pdo->exec($createArtworksTable);
?>
