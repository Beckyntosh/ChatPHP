<?php
// Database Configurations 
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'my_database');
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Create database tables if not exists
$createUsersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    security_question INT NOT NULL,
    security_answer VARCHAR(100) NOT NULL)";

$createProductsTable = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    product_price DECIMAL(10, 2) NOT NULL)";

mysqli_query($conn, $createUsersTable);
mysqli_query($conn, $createProductsTable);

// Checking for POST request
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $security_question = mysqli_real_escape_string($conn, $_POST['security_question']);
    $security_answer = mysqli_real_escape_string($conn, $_POST['security_answer']);

    $query = "INSERT INTO users (name, email, password, security_question, security_answer) 
              VALUES ('$name', '$email', '$hashed_password', '$security_question', '$security_answer')";

    if (mysqli_query($conn, $query)) {
        header("Location: success.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Abstract Artistry - User Registration</title>
    <style>
      body {
          background-color: #F0F0F0;
          font-family: Arial, sans-serif;
      }
      .container {
          margin: 2rem auto;
          width: 50%;
          border: 1px solid #000;
          padding: 2rem;
      }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label>Name:</label><br>
            <input type="text" name="name" required><br>
            <label>Email:</label><br>
            <input type="email" name="email" required><br>
            <label>Password:</label><br>
            <input type="password" name="password" required><br>
            <label>Security Question (Enter number from 1-5):</label><br>
            <input type="number" name="security_question" required><br>
            <label>Security Answer:</label><br>
            <input type="text" name="security_answer" required><br>
            <br>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>