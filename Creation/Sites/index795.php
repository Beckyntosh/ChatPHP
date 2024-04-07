<?php
session_start();
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $conn = new PDO("mysql:host=$servername;dbname=my_database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec('CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    );');

    $conn->exec('CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    );');

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

function checkLogin($username, $password, $conn) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=? LIMIT 1");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();
    return $user ? true : false;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // For demonstration purposes only, use password hashing in real applications
    if (checkLogin($username, $password, $conn)) {
        $_SESSION['user'] = $username;
        header("Location: welcome.php");
        exit;
    } else {
        echo "<p style='color:red;'>Incorrect Username or Password!</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Herbal Supplements Political Campaign Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f5e9; /* Lush Landscape theme */
            color: #1b5e20; /* Green text for the lush landscape theme */
        }
        .login {
            margin: 100px auto;
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f1f8e9; /* Light green background */
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .button {
            background-color: #4CAF50; /* Green Button */
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="login">
        <h2>Login to Your Account</h2>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button class="button" type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>