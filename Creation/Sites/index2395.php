<?php
// Define database connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Create tables if not exist
try {
    $sql = "CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                UNIQUE(email)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            
            CREATE TABLE IF NOT EXISTS browsing_history (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                product_id INT NOT NULL,
                timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            
            CREATE TABLE IF NOT EXISTS products (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                type VARCHAR(255) NOT NULL,
                description TEXT NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            
    $pdo->exec($sql);
} catch(PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Handle user registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $email = trim($_POST["email"]);
    
    try {
        $sql = "INSERT INTO users (email) VALUES (:email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        echo "<div>Registration successful. Please log in to view recommendations.</div>";
    } catch(PDOException $e) {
        echo "<div>ERROR: Could not execute $sql. " . $e->getMessage() . "</div>";
    }
}

// Handle user login
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = trim($_POST["email"]);
    
    try {
        $sql = "SELECT id FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $user["id"];
            header("location: index.php");
        } else {
            echo "<div>No account found with that email.</div>";
        }
    } catch(PDOException $e) {
        echo "<div>ERROR: Could not able to execute $sql. " . $e->getMessage() . "</div>";
    }
}

// Get recommendations based on user browsing history
function getRecommendations($userId, $pdo) {
    try {
        $sql = "SELECT products.id, products.name, products.type, products.description FROM products 
                JOIN browsing_history ON products.id = browsing_history.product_id 
                WHERE browsing_history.user_id = :userId GROUP BY products.id 
                ORDER BY COUNT(browsing_history.product_id) DESC LIMIT 5";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hair Care Product Recommendations</title>
</head>
<body>
    <h2>Register</h2>
    <form action="index.php" method="post">
        <input type="email" name="email" placeholder="Your email" required>
        <input type="submit" name="register" value="Register">
    </form>

    <h2>Login</h2>
    <form action="index.php" method="post">
        <input type="email" name="email" placeholder="Your email" required>
        <input type="submit" name="login" value="Login">
    </form>

    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
    <h2>Recommended Hair Care Products</h2>
    <?php
    $recommendations = getRecommendations($_SESSION["id"], $pdo);
    if (count($recommendations) > 0): ?>
        <ul>
            <?php foreach ($recommendations as $product): ?>
            <li>
                <strong><?php echo htmlspecialchars($product["name"]); ?></strong><br>
                Type: <?php echo htmlspecialchars($product["type"]); ?><br>
                Description: <?php echo htmlspecialchars($product["description"]); ?>
            </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No recommendations available. Start browsing our products to get recommendations.</p>
    <?php endif; ?>
    <?php endif; ?>
</body>
</html>
