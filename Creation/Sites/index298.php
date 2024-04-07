<?php
session_start();

$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$servername = 'db';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$MYSQL_DB", 'root', $MYSQL_ROOT_PSWD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create users table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL,
        reg_date TIMESTAMP
        )";
    $conn->exec($sql);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $secretKey = "YOUR_SECRET_KEY";
    $captcha = $_POST['g-recaptcha-response'];

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        echo '<h2>You are a robot</h2>';
    } else {
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Insert into database
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $password]);

        echo '<h2>Registration successful!</h2>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Supplies Registration</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<h2>Register</h2>

<form action="" method="post">
    <div>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
    <button type="submit">Register</button>
</form>

</body>
</html>