<?php

* Simple script to register user and opt them into loyalty program */

// Define MySQL connection parameters
define("MYSQL_USER", "root");
define("MYSQL_PASSWORD", "root");
define("MYSQL_DATABASE", "my_database");
define("MYSQL_SERVER", "db");

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=".MYSQL_SERVER.";dbname=".MYSQL_DATABASE, MYSQL_USER, MYSQL_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create users table if it doesn't exist
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
                  id INT AUTO_INCREMENT PRIMARY KEY,
                  username VARCHAR(255) NOT NULL,
                  email VARCHAR(255) NOT NULL,
                  password VARCHAR(255) NOT NULL,
                  opt_in_loyalty_program BOOLEAN NOT NULL DEFAULT FALSE,
                  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP) ENGINE=INNODB;");
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {

    try {
        // Insert new user into users table
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, opt_in_loyalty_program) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $_POST["username"],
            $_POST["email"],
            password_hash($_POST["password"], PASSWORD_DEFAULT),
            isset($_POST["loyalty"]) ? 1 : 0
        ]);

        echo "Registration Successful!";
    } catch (PDOException $e) {
        echo "Registration Failed: " . $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup & Opt-In Loyalty Program</title>
</head>
<body>
    <h2>Signup for Makeup Website & Opt-In to Loyalty Program</h2>
    <form method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <input type="checkbox" id="loyalty" name="loyalty">
        <label for="loyalty">Opt-in to Loyalty Program</label><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
