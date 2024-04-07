<?php
// Initialize session
session_start();

$host = 'db'; 
$user = 'root'; 
$password = 'root'; 
$dbname = 'my_database';
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

// Connect to the Database
try{
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

// Create Users Table If It Doesn't Exist
$userTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
)";

$pdo->exec($userTable);

// Check If Form Is Submitted
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";

    try{
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$username, $email, $password]);
        $_SESSION['username'] = $username;
        header('Location: welcome.php');
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Event Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0ebe3;
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register for an Event</h2>
        <form action="index.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" name="register" value="Register">
        </form>
    </div>
</body>
</html>
