<?php
// Define MYSQL details
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Connect to MySQL database
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE,
    MYSQL_USER,
    MYSQL_PASSWORD,
    $pdoOptions
);

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS product_updates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$pdo->exec($sql);

$message = '';

// Check if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = strip_tags($_POST['email']);

    // Insert the new email
    $sql = "INSERT INTO product_updates (email) VALUES (:email)";
    $stmt = $pdo->prepare($sql);
    
    // Bind and execute
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    if($stmt->execute()) {
        $message = 'Thank you for signing up for product updates!';
    } else {
        $message = 'An error occurred. Please try again later.';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up for Product Updates</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 50px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        form { margin-top: 20px; }
        input[type="email"], button { width: 100%; padding: 10px; margin: 5px 0; border: 1px solid #ddd; border-radius: 5px; box-sizing: border-box; }
        button { background-color: #5cb85c; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
        .message { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Sign Up for Health and Wellness Product Updates</h2>
    <p>Enter your email address to receive notifications about new product releases:</p>
    <form action="" method="post">
        <input type="email" name="email" required placeholder="Enter your email address">
        <button type="submit">Sign Up</button>
    </form>
    <?php if($message): ?>
    <div class="message">
        <?php echo $message; ?>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
