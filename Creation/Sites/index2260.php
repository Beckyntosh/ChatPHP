<?php
// This script is to provide a sample php single-file code for a post-signup user profile customization in a magazine website context.
// DISCLAIMER: This code lacks security measures such as input validation, sanitization, and SQL injection prevention for simplicity. Ensure to implement these before production use.

// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )";
    
if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    preference_type VARCHAR(50),
    preference_value VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES users(id)
    )";
    
if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insert user data into the database
    $stmt = $conn->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $_POST['username'], $_POST['email']);
    $stmt->execute();
    $last_id = $stmt->insert_id;

    // Insert preferences
    $stmt = $conn->prepare("INSERT INTO preferences (user_id, preference_type, preference_value) VALUES (?, ?, ?)");
    foreach ($_POST['preferences'] as $type => $value) {
        $stmt->bind_param("iss", $last_id, $type, $value);
        $stmt->execute();
    }

    echo "Profile set up successfully!";
    
    $stmt->close();
    $conn->close();
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Setup</title>
</head>
<body>
    <h2>User Profile Setup</h2>
    <form method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <h3>Preferences</h3>
        <label for="fav_genre">Favorite Genre:</label><br>
        <select name="preferences[fav_genre]" id="fav_genre">
            <option value="fiction">Fiction</option>
            <option value="non-fiction">Non-Fiction</option>
            <option value="fantasy">Fantasy</option>
            <option value="mystery">Mystery</option>
        </select><br>
        <label for="newsletter">Subscribe to Newsletter:</label><br>
        <select name="preferences[newsletter]" id="newsletter">
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
