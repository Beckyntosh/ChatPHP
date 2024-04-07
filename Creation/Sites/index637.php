<?php
// Set up connection variables
$host = 'db';
$db   = 'my_database';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

// Set up DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Create a PDO instance (connect to the database)
    $pdo = new PDO($dsn, $user, $pass, $options);
    
    // Check and create necessary tables
    $tablesSql = <<<EOT
    CREATE TABLE IF NOT EXISTS subscribers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) UNIQUE NOT NULL
    );
EOT;

    $pdo->exec($tablesSql);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Logic to handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];
    $sql = "INSERT INTO subscribers (email) VALUES (?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$email]);

    echo '<p>Thank you for subscribing to Books News!</p>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books News Subscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0e6f6;
            color: #333;
            text-align: center;
        }
        
        .container {
            margin-top: 50px;
        }
        
        .subscription-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        
        input[type=email] {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            width: 250px;
        }
        
        input[type=submit] {
            padding: 10px 20px;
            background-color: #605b7a;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        input[type=submit]:hover {
            background-color: #514964;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Celestial Charm</h2>
        <h3>Subscribe to Books News</h3>
        <form class="subscription-form" action="" method="POST">
            <input type="email" name="email" placeholder="Enter your email address" required>
            <input type="submit" value="Subscribe">
        </form>
    </div>
</body>
</html>