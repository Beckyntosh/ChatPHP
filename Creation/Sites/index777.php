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

// Create products table if does not exists
$pdo->exec("
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
);
");

// Create users table if does not exists
$pdo->exec("
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);
");

// Create uploads table if does not exists
$pdo->exec("
CREATE TABLE IF NOT EXISTS uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    filename VARCHAR(255),
    time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
");

// Handle PDF upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_FILES['pdf']['type'] == 'application/pdf') {
        $filename = $_POST['username'] . time() . '.pdf';
        if (move_uploaded_file($_FILES['pdf']['tmp_name'], 'uploads/' . $filename)) {
            $stmt = $pdo->prepare('INSERT INTO uploads (user_id, filename) VALUES (?, ?)');
            $stmt->execute([$_POST['user_id'], $filename]);
            echo "Successful upload";
        } else {
            echo "Upload failed";
        }
    } else {
        echo "Only PDF files allowed";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Electronics Freelancer Services Marketplace</title>
    <style>
    /* Put Dynamic Deco style here */
    </style>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="pdf">Upload PDF:</label><br>
        <input type="file" id="pdf" name="pdf" required><br>
        <input type="hidden" name="user_id" value="1"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>