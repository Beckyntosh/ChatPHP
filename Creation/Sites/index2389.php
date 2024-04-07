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
                password VARCHAR(255) NOT NULL,
                UNIQUE(email)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            
            CREATE TABLE IF NOT EXISTS browsing_history (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                product_id INT NOT NULL,
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            
            CREATE TABLE IF NOT EXISTS products (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                description TEXT NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            
    $pdo->exec($sql);
} catch(PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// User registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    try {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        echo "<p>Registration successful. Please log in to view recommendations.</p>";
    } catch(PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}

// User login
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    try {
        $sql = "SELECT id, password FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount() == 1) {
            if($row = $stmt->fetch()) {
                $hashed_password = $row["password"];
                if(password_verify($password, $hashed_password)) {
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $row["id"];
                    header("location: index.php");
                } else {
                    echo "<p>Invalid password.</p>";
                }
            }
        } else {
            echo "<p>No account found with that email.</p>";
        }
    } catch(PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}

// Recommendation logic
function getRecommendations($userId, $pdo) {
    try {
        $sql = "SELECT p.id, p.name, p.description FROM products p 
                INNER JOIN browsing_history bh ON p.id = bh.product_id 
                WHERE bh.user_id = :userId GROUP BY p.id ORDER BY COUNT(bh.product_id) DESC LIMIT 5";
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
    <title>Prescription Medication Recommendations</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="register" value="Register">
    </form>

    <h2>User Login</h2>
    <form method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="login" value="Login">
    </form>

    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
        <h2>Recommended Products</h2>
        <?php $recommendations = getRecommendations($_SESSION["id"], $pdo); ?>
        <ul>
            <?php foreach ($recommendations as $product): ?>
                <li><?php echo htmlspecialchars($product["name"]) . ": " . htmlspecialchars($product["description"]); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
