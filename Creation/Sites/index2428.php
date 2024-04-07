<?php
// Connect to database
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

// Create tables if they do not exist
$sqlUser = "CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(50) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

$sqlPreferences = "CREATE TABLE IF NOT EXISTS Preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
news_type VARCHAR(50) NOT NULL,
FOREIGN KEY (user_id) REFERENCES Users(id)
)";

$conn->query($sqlUser);
$conn->query($sqlPreferences);

// Handle Registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $preferences = isset($_POST['preferences']) ? $_POST['preferences'] : [];

    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO Users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $email);
    $stmt->execute();
    $user_id = $stmt->insert_id;
    
    // Insert preferences into the database
    foreach ($preferences as $preference) {
        $stmt = $conn->prepare("INSERT INTO Preferences (user_id, news_type) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $preference);
        $stmt->execute();
    }

    echo "Registration successful!";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup for Customized News Feed</title>
</head>
<body>
    <h2>Signup Form</h2>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label>Select your news preferences:</label><br>
        <input type="checkbox" id="wineNews" name="preferences[]" value="Wine News">
        <label for="wineNews">Wine News</label><br>
        <input type="checkbox" id="vineyardUpdates" name="preferences[]" value="Vineyard Updates">
        <label for="vineyardUpdates">Vineyard Updates</label><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
