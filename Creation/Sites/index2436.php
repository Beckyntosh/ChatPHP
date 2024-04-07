<?php

$serverName = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table if not exists
$userTableSql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
)";

$newsPrefTableSql = "CREATE TABLE IF NOT EXISTS news_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    preference VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";


if ($conn->query($userTableSql) === TRUE && $conn->query($newsPrefTableSql) === TRUE) {
    // Tables created successfully
} else {
    echo "Error creating tables: " . $conn->error;
}

// PHP code to handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $preferences = $_POST['preferences']; // This should be an array of strings

    // insert user into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();

    $last_user_id = $stmt->insert_id;

    // insert user preferences
    foreach ($preferences as $preference) {
        $stmt = $conn->prepare("INSERT INTO news_preferences (user_id, preference) VALUES (?, ?)");
        $stmt->bind_param("is", $last_user_id, $preference);
        $stmt->execute();
    }

    echo "Registration Successful!";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Furniture News Feed Registration</title>
</head>
<body>

<h2>User Registration - Customize News Feed</h2>
<form method="post">
    Username:<br>
    <input type="text" name="username" required>
    <br>
    Email:<br>
    <input type="email" name="email" required>
    <br>
    Password:<br>
    <input type="password" name="password" required>
    <br>
    News Feed Preferences (Ctrl+click to select multiple):<br>
    <select multiple name="preferences[]">
        <option value="Latest Arrivals">Latest Arrivals</option>
        <option value="Sale Notifications">Sale Notifications</option>
        <option value="Design Tips">Design Tips</option>
        <option value="Events">Events</option>
    </select>
    <br><br>
    <input type="submit" value="Register">
</form>

</body>
</html>
