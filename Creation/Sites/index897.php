
<?php
// Database connection settings
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

// Check and Create Required Tables if they don’t exist
$pdo->exec("CREATE TABLE IF NOT EXISTS polls (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL
);");

$pdo->exec("CREATE TABLE IF NOT EXISTS poll_options (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poll_id INT NOT NULL,
    option_text VARCHAR(255) NOT NULL,
    votes INT NOT NULL DEFAULT 0,
    FOREIGN KEY(poll_id) REFERENCES polls(id) ON DELETE CASCADE
);");

$pdo->exec("CREATE TABLE IF NOT EXISTS downloads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    file_path VARCHAR(255)
);");

$pdo->exec("CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10,2),
    stock_quantity INT
);");

$pdo->exec("CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255),
    2FA_code VARCHAR(10)
);");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mixed Theme Collection</title>
    <style>
        body { font-family: Arial; }
        .container { width: 80%; margin: auto; overflow: hidden; }
        .content { padding: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <header>
Dynamic Header Placeholder
        </header>
        <nav>
Dynamic Navigation Placeholder
        </nav>
        <div class="content">

PHP Dynamic Content Placeholder
            <?php
            // Dynamic PHP content can be placed here to switch between features such as polls, downloads, user authentication, etc.
            ?>
            
        </div>
    </div>
</body>
</html>