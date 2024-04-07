
<?php
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Create table if not exists
$pdo->exec("CREATE TABLE IF NOT EXISTS uploaded_archives (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_FILES['archive'])) {
    if ($_FILES['archive']['error'] === UPLOAD_ERR_OK && strpos($_FILES['archive']['name'], '.zip') !== false) {
        $targetDirectory = "uploads/";
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0777, true);
        }
        $filePath = $targetDirectory . basename($_FILES['archive']['name']);
        if (move_uploaded_file($_FILES['archive']['tmp_name'], $filePath)) {
            $stmt = $pdo->prepare("INSERT INTO uploaded_archives (filename) VALUES (?)");
            $stmt->execute([$_FILES['archive']['name']]);
            echo "The file " . htmlspecialchars(basename($_FILES['archive']['name'])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Only ZIP files are allowed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Archive Upload</title>
</head>
<body>
    <h2>Project Alpha Document Archive Upload</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        Select ZIP File to upload:
        <input type="file" name="archive" id="fileToUpload">
        <input type="submit" value="Upload Archive" name="submit">
    </form>
</body>
</html>

- Ensure you have a server running PHP and MySQL.
- Configure your database connection appropriately.
- Create a directory named `uploads` in the same location as this script to store uploaded files.
- For security, remember to adjust the database credentials and connection configurations as per your actual environment setup.