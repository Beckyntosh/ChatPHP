<?php
// Define your MySQL connection parameters
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_HOST', 'db');
define('MYSQL_DATABASE', 'my_database');

// Create connection to the database
$connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create table if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    language_preference VARCHAR(5) NOT NULL,
    reg_date TIMESTAMP
)";
if (!$connection->query($createTable)) {
    echo "Error creating table: " . $connection->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $language_preference = $_POST['language_preference'];

    $stmt = $connection->prepare("INSERT INTO users (username, email, language_preference) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $language_preference);
    
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - Home Decor</title>
</head>
<body>
    <h2>Sign Up For Home Decor Updates</h2>
    <form method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="language_preference">Preferred Language:</label><br>
        <select id="language_preference" name="language_preference" required>
            <option value="en">English</option>
            <option value="fr">French</option>
            <option value="es">Spanish</option>
            <option value="de">German</option>
        </select><br><br>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
