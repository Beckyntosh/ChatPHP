<?php
// Handles database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create tables if they do not exist
    $pdo->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL UNIQUE,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    );");
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

function createUser($pdo, $username, $name, $email, $password) {
    $sql = "INSERT INTO users (username, name, email, password) VALUES (?, ?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $stmt->execute([$username, $name, $email, $passwordHash]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    createUser($pdo, $_POST['username'], $_POST['name'], $_POST['email'], $_POST['password']);
    // Redirect or notify user after signup
    echo "<p>Signup successful!</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sunglasses Language Learning Site: Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e4d7;
            color: #333;
        }
        .signup-form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-input {
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #5c6bc0;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="signup-form">
    <form action="" method="post">
        <div class="form-input">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-input">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-input">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-input">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-input">
            <input type="submit" name="signup" value="Sign Up">
        </div>
    </form>
</div>

</body>
</html>