<?php
// DB connection setup
define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
define('DB_SERVER', 'db');
define('DB_USER', 'root');

$dsn = "mysql:host=" . DB_SERVER . ";dbname=" . MYSQL_DB;
try {
    $pdo = new PDO($dsn, DB_USER, MYSQL_ROOT_PSWD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Check and create table if not exists
$query = "CREATE TABLE IF NOT EXISTS `print_orders` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `file_name` VARCHAR(255) NOT NULL,
            `upload_time` DATETIME DEFAULT CURRENT_TIMESTAMP
          )";
$pdo->exec($query);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['print_file'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["print_file"]["name"]);
    if (move_uploaded_file($_FILES["print_file"]["tmp_name"], $target_file)) {
        $stmt = $pdo->prepare("INSERT INTO print_orders (file_name) VALUES (?)");
        if ($stmt->execute([$_FILES["print_file"]["name"]])) {
            echo "<div>File has been uploaded and queued for printing.</div>";
        }
    } else {
        echo "<div>Sorry, there was an error uploading your file.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Your Design for Printing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #ddd;
            text-align: center;
            padding: 50px;
        }
        input, button {
            padding: 10px;
            margin: 10px;
        }
        .container {
            background-color: #222;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Your Wedding Invitation Design</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="print_file" required>
            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>
