<?php
// DB Configuration
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create products table and user_history table if not exists
$initScript = "
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    description TEXT,
    image_url TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS user_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    view_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);
";
$pdo->exec($initScript);

// Simple User Login (Username & Password based without proper security for simplification)
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT id, username FROM users WHERE username = ? AND password = ?"; // Simplified: Password should be hashed and verified properly
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username, $password]);
    if ($user = $stmt->fetch()) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
    } else {
        // User not found or password incorrect. Register the user for simplicity
        $insertUser = "INSERT INTO users (username, password) VALUES (?, ?)";
        $pdo->prepare($insertUser)->execute([$username, $password]);
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['username'] = $username;
    }
}

// Recommendations based on browsing history (most viewed categories)
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $recommendationsQuery = "
    SELECT p.*, COUNT(uh.id) as views
    FROM products p
    INNER JOIN user_history uh ON p.id = uh.product_id
    WHERE uh.user_id = ?
    GROUP BY p.category
    ORDER BY views DESC
    LIMIT 5;
    ";
    $stmt = $pdo->prepare($recommendationsQuery);
    $stmt->execute([$userId]);
    $recommendations = $stmt->fetchAll();
} else {
    // Default recommendations for not logged in user
    $defaultRecommendationsQuery = "SELECT * FROM products ORDER BY created_at DESC LIMIT 5";
    $recommendations = $pdo->query($defaultRecommendationsQuery)->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personalized Recommendations</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .product { margin-bottom: 20px; padding: 10px; border: 1px solid #ddd; }
        .product img { max-width: 100px; }
    </style>
</head>
<body>
    <h1>Personalized Recommendations</h1>
    <?php if (isset($_SESSION['username'])): ?>
        <p>Welcome, <?= htmlspecialchars($_SESSION['username']); ?>! Here are your personalized recommendations:</p>
    <?php else: ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login / Register</button>
        </form>
    <?php endif; ?>
    <div class="recommendations">
        <?php foreach ($recommendations as $product): ?>
            <div class="product">
                <h2><?= htmlspecialchars($product['name']); ?></h2>
                <img src="<?= htmlspecialchars($product['image_url']); ?>" alt="<?= htmlspecialchars($product['name']); ?>">
                <p><?= nl2br(htmlspecialchars($product['description'])); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
