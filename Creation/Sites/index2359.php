<?php
// Define MySQL connection
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Connect to MySQL database.
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE,
    MYSQL_USER,
    MYSQL_PASSWORD,
    $pdoOptions
);

// Create user table if it does not exist.
$tableQuery = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    registration_date DATETIME DEFAULT CURRENT_TIMESTAMP
)";

$pdo->exec($tableQuery);

// Handle Signup
$message = '';
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insert new user
    $sql = 'INSERT INTO users (email, password) VALUES (:email, :password)';
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([':email' => $email, ':password' => $password])) {
        $message = 'Account successfully created!';
    } else {
        $message = 'Sorry, there was an issue creating your account.';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup for Exclusive Content</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        form { width: 300px; margin: 100px auto; padding: 20px; background: white; border-radius: 10px; }
        input, button { width: 100%; padding: 10px; margin: 5px 0; }
    </style>
</head>
<body>
    <form action="signup.php" method="post">
        <h2>Signup</h2>
        <?php if ($message): ?>
        <p><?= $message ?></p>
        <?php endif; ?>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Signup</button>
    </form>
</body>
</html>
