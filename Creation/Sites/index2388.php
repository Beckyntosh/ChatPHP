<?php
// Database Configuration
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_HOST", "db");
define("MYSQL_DATABASE", "my_database");

// Establishing connection with the database
function getDB() {
    $dsn = 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DATABASE . ';charset=utf8';
    try {
        $db = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
}

// Creating necessary tables if they don't exist
function setupDatabase(PDO $db) {
    $queries = [
        "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            UNIQUE(username)
        )",
        "CREATE TABLE IF NOT EXISTS browsing_history (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            product_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )",
        "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            category VARCHAR(255)
        )"
    ];
    
    foreach ($queries as $query) {
        $db->exec($query);
    }
}

// Handle User Registration
function registerUser($db, $username, $password) {
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, password_hash($password, PASSWORD_DEFAULT)]);
    return $db->lastInsertId();
}

// Login Verification
function verifyLogin($db, $username, $password) {
    $stmt = $db->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        return $user['id'];
    }
    return false;
}

// Record Browsing History
function recordBrowsingHistory($db, $userId, $productId) {
    $stmt = $db->prepare("INSERT INTO browsing_history (user_id, product_id) VALUES (?, ?)");
    $stmt->execute([$userId, $productId]);
}

// Fetch Recommendations based on Browsing History
function getRecommendations($db, $userId) {
    $stmt = $db->prepare("SELECT p.* FROM products p INNER JOIN browsing_history bh ON p.id = bh.product_id WHERE bh.user_id = ? GROUP BY p.id ORDER BY COUNT(p.id) DESC LIMIT 10");
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$db = getDB();
setupDatabase($db);

// Example of handling a request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    session_start();
    if ($_POST['action'] == 'register') {
        $userId = registerUser($db, $_POST['username'], $_POST['password']);
        echo "User registered with ID: $userId";
    } elseif ($_POST['action'] == 'login') {
        $userId = verifyLogin($db, $_POST['username'], $_POST['password']);
        if ($userId) {
            $_SESSION['user_id'] = $userId;
            echo "Login successful";
        } else {
            echo "Login failed";
        }
    } elseif ($_POST['action'] == 'record_browsing' && isset($_SESSION['user_id'])) {
        recordBrowsingHistory($db, $_SESSION['user_id'], $_POST['product_id']);
        echo "Browsing history recorded";
    }
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'recommendations' && isset($_SESSION['user_id'])) {
    $recommendations = getRecommendations($db, $_SESSION['user_id']);
    foreach ($recommendations as $product) {
        echo htmlspecialchars($product['name']) . "<br>";
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fitness Equipment Recommendations</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="post">
        <input type="hidden" name="action" value="register">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>

    <h2>User Login</h2>
    <form method="post">
        <input type="hidden" name="action" value="login">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <h2>Recommendations</h2>
    <form method="get">
        <input type="hidden" name="action" value="recommendations">
        <button type="submit">Show My Recommendations</button>
    </form>
</body>
</html>
