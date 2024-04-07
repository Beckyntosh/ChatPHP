<?php

// Database connection
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);

$pdo = new PDO(
    "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE,
    MYSQL_USER, MYSQL_PASSWORD, $pdoOptions);

// Create the table if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified TINYINT NOT NULL DEFAULT 0,
    verification_code VARCHAR(255) NOT NULL
)";
$pdo->exec($createTableQuery);

function randomString($length = 50) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $verification_code = randomString();
    
    $query = $pdo->prepare("INSERT INTO users (name, email, verification_code) VALUES (?, ?, ?)");
    $result = $query->execute([$name, $email, $verification_code]);
    
    if ($result) {
        $verificationLink = "http://yourwebsite.com/verify.php?code=" . $verification_code;
        // Here, you should actually send the email containing $verificationLink to $email
        // mail($email, "Verify your email", "Please click on this link to verify your email: " . $verificationLink);
        echo "A verification email has been sent. Please check your inbox.";
    } else {
        echo "Error: " . $query->errorInfo()[2];
    }
} else if(isset($_GET['code'])) {
    $code = $_GET['code'];
    $query = $pdo->prepare("SELECT * FROM users WHERE verification_code = ?");
    $query->execute([$code]);
    $user = $query->fetch();
    if ($user) {
        $updateQuery = $pdo->prepare("UPDATE users SET email_verified = 1 WHERE id = ?");
        if ($updateQuery->execute([$user['id']])) {
            echo "Email verified successfully!";
        }
    } else {
        echo "Invalid verification code.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification System</title>
</head>
<body>
    <?php if ($_SERVER["REQUEST_METHOD"] != "POST") : ?>
    <form action="" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit">Signup</button>
    </form>
    <?php endif; ?>
</body>
</html>
