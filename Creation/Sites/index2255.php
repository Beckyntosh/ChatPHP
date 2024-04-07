<?php
// Define MYSQL Constants
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Connect to MySQL database
$pdo = new PDO(
    'mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

// Create the table if it doesn't exist
$query = "CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$pdo->exec($query);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $pdo->prepare("INSERT INTO subscribers (email) VALUES (?)");
        $stmt->execute([$email]);
        $signupSuccess = "Thank you for signing up for product update notifications!";
    } else {
        $signupError = "Please enter a valid email address.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up for Product Updates</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        form { margin-top: 20px; }
        input[type="email"], button[type="submit"] { padding: 10px; width: calc(100% - 24px); margin-bottom: 10px; }
        .message { margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Sign Up for Board Games Product Update Notifications</h2>
    <p>Enter your email address to receive notifications about new product releases:</p>
    <form method="post" action="">
        <input type="email" name="email" required placeholder="Your email address"/>
        <button type="submit">Sign Up</button>
    </form>
    <?php if (isset($signupSuccess)): ?>
        <div class="message" style="color: green;">
            <?= htmlspecialchars($signupSuccess) ?>
        </div>
    <?php endif; ?>
    <?php if (isset($signupError)): ?>
        <div class="message" style="color: red;">
            <?= htmlspecialchars($signupError) ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
