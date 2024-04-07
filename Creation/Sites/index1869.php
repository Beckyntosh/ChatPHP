<?php
// Simple script for an e-commerce account creation with instant coupon reward

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

// Create users table if not exists
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$pdo->exec($createUsersTable);

// Create coupons table if not exists
$createCouponsTable = "CREATE TABLE IF NOT EXISTS coupons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    coupon_code VARCHAR(50) NOT NULL UNIQUE,
    user_id INT NOT NULL,
    discount_percentage INT NOT NULL,
    is_used BOOLEAN NOT NULL DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$pdo->exec($createCouponsTable);

// Handling user registration
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Inserting the user
    $insertUser = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    if($statement = $pdo->prepare($insertUser)){
        if($statement->execute([$username, $email, $password])){
            $userId = $pdo->lastInsertId();
            
            // Generate a unique coupon code for the user
            $couponCode = 'WELCOME' . strtoupper(substr(md5(time()), 0, 6));
            $insertCoupon = "INSERT INTO coupons (coupon_code, user_id, discount_percentage) VALUES (?, ?, 20)";
            if($couponStmt = $pdo->prepare($insertCoupon)){
                if($couponStmt->execute([$couponCode, $userId])){
                    echo "Account Created Successfully. Your Coupon Code: " . $couponCode;
                }
            }
        }
        $statement = null;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup - Organic Food E-commerce</title>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; margin: auto; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Signup</h2>
        <p>Create your account to get a welcome coupon.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username" required>
            </div>    
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <input type="submit" name="register" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>
