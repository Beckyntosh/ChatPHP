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

// Create tables if not exists
$pdo->exec("CREATE TABLE IF NOT EXISTS wishlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    user_id INT,
    INDEX(user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

$pdo->exec("CREATE TABLE IF NOT EXISTS wishlist_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    wishlist_id INT,
    wine_name VARCHAR(255) NOT NULL,
    INDEX(wishlist_id),
    FOREIGN KEY (wishlist_id) REFERENCES wishlist(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// Handle Add to Wishlist POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wine_name'])) {
    $wineName = $_POST['wine_name'];
    $wishlistId = $_POST['wishlist_id'] ?? 1; // Default to 1 for simplicity
    
    // Insert item into wishlist_items table
    $stmt = $pdo->prepare("INSERT INTO wishlist_items (wishlist_id, wine_name) VALUES (?, ?)");
    $stmt->execute([$wishlistId, $wineName]);

    echo "<div>Wine successfully added to wishlist!</div>";
}

// Fetch wishlist items
$wishlistItems = [];
$stmt = $pdo->prepare("SELECT wine_name FROM wishlist_items WHERE wishlist_id = ?");
$stmt->execute([1]); // Default wishlist ID is 1 for this example
$wishlistItems = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wishlist Management</title>
</head>
<body>
    <h2>Add Wine to Wishlist</h2>
    <form action="" method="post">
        <label for="wine_name">Wine Name:</label>
        <input type="text" id="wine_name" name="wine_name" required>
        <input type="submit" value="Add to Wishlist">
    </form>

    <h2>My Wishlist</h2>
    <ul>
        <?php foreach ($wishlistItems as $item): ?>
            <li><?= htmlspecialchars($item['wine_name']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
